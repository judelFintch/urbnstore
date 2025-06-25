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

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        $validated = $this->validateRequest($request);

        $firstName = $validated['first_name'];
        $lastName = $validated['last_name'];
        $fullName = $firstName . ' ' . $lastName;
        $email = Auth::check() ? Auth::user()->email : null;
        $address = $validated['address'];
        $country = $validated['country'];
        $company = $validated['company'] ?? null;

        $cart = json_decode($validated['cart_json'], true);

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

    /**
     * Validate the incoming payment request data.
     */
    private function validateRequest(Request $request): array
    {
        return $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'address'    => 'required|string',
            'country'    => 'required|string',
            'company'    => 'nullable|string|max:255',
            'cart_json'  => 'required|string',
        ]);
    }
}