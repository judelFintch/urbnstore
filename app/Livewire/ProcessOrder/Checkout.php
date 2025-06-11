<?php

namespace App\Livewire\ProcessOrder;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Order;
use App\Models\DetailsOrder;
use Devscast\Maxicash\Client as Maxicash;
use Devscast\Maxicash\Credential;
use Devscast\Maxicash\Environment;
use Devscast\Maxicash\PaymentEntry;

class Checkout extends Component
{
    #[Layout('layouts.guest')]
    public string $first_name = '';
    public string $last_name = '';
    public string $country = '';
    public string $company = '';
    public string $address = '';
    public int $product_id = 1;
    public int $qte = 1;

   
    public function submit()
    {
        $data = $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country' => 'required|string',
            'address' => 'required|string',
            'company' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'qte' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($this->product_id);
        $total = $product->price * $this->qte;
        $priceInCents = intval($total * 100);
        $latestOrder = Order::latest()->first();
        $lastId = $latestOrder ? $latestOrder->id : 1;
        $reference = sprintf('ORD/URBN/%s/%d/%d', now()->format('Y-m-d'), $lastId, rand(1, 100));
        $order = Order::create([
            'user_id' => \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::id() : null,
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->email : null,
            'address' => $this->address,
            'status' => 'pending',
            'reference' => $reference,
        ]);
        

        DetailsOrder::create([
            'order_id' => $order->id,
            'quantity' => $this->qte,
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

        dd($paymentEntry);

        return Redirect::to($maxicash->queryStringURLPayment($paymentEntry));
    }
    public function render()
    {

        return view('livewire.process-order.checkout');
    }
}
