<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Order;
use App\Models\DetailsOrder;
use Devscast\Maxicash\Client as Maxicash;
use Devscast\Maxicash\Credential;
use Devscast\Maxicash\Environment;
use Devscast\Maxicash\PaymentEntry;

class Payement extends Controller
{
    public function handlePayment(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $fullName = $firstName . ' ' . $lastName;
        $email = Auth::check() ? Auth::user()->email : null;
        $address = $request->input('address');
        $country = $request->input('country');
        $company = $request->input('company');

        $cart = json_decode($request->input('cart_json'), true);

        if (!is_array($cart) || empty($cart)) {
            return redirect()->back()->with('error', 'Le panier est vide.');
        }

        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);


        $priceInCents = intval($total * 100);

        $randomNumber = rand(1, 100);
        $latestOrder = Order::latest()->first();
        $orderId = $latestOrder ? $latestOrder->id : 1;
        $reference = sprintf("ORD/URBN/%s/%d/%d", date('Y-m-d'), $orderId, $randomNumber);

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

        $order = Order::create([
            'name' => $fullName,
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'email' => $email,
            'address' => $address,
            'status' => 'pending',
            'reference' => $reference,
        ]);

        foreach ($cart as $item) {
            DetailsOrder::create([
                'order_id' => $order->id,
                'quantity' => $item['quantity'],
                'product_description' => $item['id'],
                'product_title' => $item['name'],
                'product_price' => $item['price'],
            ]);
        }

        $paymentUrl = $maxicash->queryStringURLPayment($paymentEntry);
        return redirect()->to($paymentUrl);
    }
}