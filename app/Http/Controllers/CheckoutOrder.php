<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Order;
use App\Models\DetailsOrder;
use Devscast\Maxicash\Client as Maxicash;
use Devscast\Maxicash\Credential;
use Devscast\Maxicash\Environment;
use Devscast\Maxicash\PaymentEntry;

class CheckoutOrder extends Controller
{
    public function handlePayment(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country' => 'required|string',
            'address' => 'required|string',
            'company' => 'nullable|string',
            'product_id' => 'required',
            'qte' => 'required|integer|min:1',

        ]);
        $product = Product::findOrFail($validated['product_id']);
        $total = $product->price * $validated['qte'];
        $priceInCents = intval($total * 100);
        $latestOrder = Order::latest()->first();
        $lastId = $latestOrder?->id ?? 1;
        $reference = sprintf('ORD/URBN/%s/%d/%d', now()->format('Y-m-d'), $lastId, rand(1, 100));
        $order = Order::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => Auth::check() ? Auth::user()->email : null,
            'address' => $validated['address'],
            'status' => 'pending',
            'reference' => $reference,
        ]);

        DetailsOrder::create([
            'order_id' => $order->id,
            'quantity' => $validated['qte'],
            'product_description' => $product->id,
            'product_title' => $product->title,
            'product_price' => $product->price,
        ]);

        $maxicash = new Maxicash(
            new Credential(
                config('services.maxicash.merchant_id'),
                config('services.maxicash.merchant_password')
            ),
            Environment::LIVE
        );

        $paymentEntry = new PaymentEntry(
            $maxicash->credential,
            $priceInCents,
            $reference,
            route('accepted.payment'),
            route('rejected.payment'),
            route('rejected.payment'),
            route('maxi-notify.payment')
        );

       // return Redirect::to($maxicash->queryStringURLPayment($paymentEntry));



        
        
    }
}