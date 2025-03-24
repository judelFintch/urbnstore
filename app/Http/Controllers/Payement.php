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
        $email = auth()->check() ? auth()->user()->email : null;
        $address = $request->input('address');
        $country = $request->input('country');
        $company = $request->input('company');
        $productId = $request->input('product_id');
        $quantity = (int) $request->input('qte');
        
        $product = Product::find(19);
        if (!$product) {
            
            echo 'produit non trouver';
            //return redirect()->back()->with('error', 'Produit non trouvé.');
        }
        
        $randomNumber = rand(1, 100);
        $latestOrder = Order::latest()->first();
        $orderId = $latestOrder ? $latestOrder->id : 1;
        $reference = sprintf("ORD/URBN/%s/%d/%d", date('Y-m-d'), $orderId, $randomNumber);
        
        $totprice = $quantity * $product->price;
        $priceInCents = intval($totprice * 100);
        
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
        
         Order::create([
            'name' => $fullName,
            'email' => $email,
            'address' => $address,
            'status' => 'pending',
            'reference' => $reference,
        ]);
        
         DetailsOrder::create([
            'order_id' => Order::latest()->first()->id,
            'quantity' => $quantity,
            'product_description' => $product->id,
            'product_title' => $product->title,
            'product_price' => $product->price,
        ]);
        
        $paymentUrl = $maxicash->queryStringURLPayment($paymentEntry);
        return redirect()->to($paymentUrl);


    }
}
