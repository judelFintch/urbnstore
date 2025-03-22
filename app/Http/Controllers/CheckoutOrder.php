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
        $validated = $this->validateRequest($request);
        $product = Product::findOrFail($validated['product_id']);

        $order = $this->createOrder($validated, $product);
        $this->createOrderDetails($order, $product, $validated);

        $paymentUrl = $this->initiateMaxicashPayment($order, $product->price * $validated['qte']);

        return Redirect::to($paymentUrl);
    }

    private function validateRequest(Request $request): array
    {
        return $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country' => 'required|string',
            'address' => 'required|string',
            'company' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'qte' => 'required|integer|min:1',
        ]);
    }

    private function createOrder(array $validated, Product $product): Order
    {
        $reference = $this->generateReference();

        return Order::create([
            'user_id' => Auth::id(),
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => Auth::check() ? Auth::user()->email : null,
            'address' => $validated['address'],
            'status' => 'pending',
            'reference' => $reference,
        ]);
    }

    private function createOrderDetails(Order $order, Product $product, array $validated): void
    {
        DetailsOrder::create([
            'order_id' => $order->id,
            'quantity' => $validated['qte'],
            'product_description' => $product->id,
            'product_title' => $product->title,
            'product_price' => $product->price,
        ]);
    }

    private function generateReference(): string
    {
        $lastId = Order::max('id') ?? 0;
        return sprintf('ORD/URBN/%s/%d/%d', now()->format('Y-m-d'), $lastId + 1, rand(1, 100));
    }

    private function initiateMaxicashPayment(Order $order, float $amount): string
    {
        try {
            $maxicash = new Maxicash(
                new Credential(
                    config('services.maxicash.merchant_id'),
                    config('services.maxicash.merchant_password')
                ),
                Environment::LIVE
            );

            $priceInCents = intval($amount * 100);

            $paymentEntry = new PaymentEntry(
                $maxicash->credential,
                $priceInCents,
                $order->reference,
                route('accepted.payment'),
                route('rejected.payment'),
                route('rejected.payment'),
                route('maxi-notify.payment')
            );

            dd($paymentEntry);

            return $maxicash->queryStringURLPayment($paymentEntry);
        } catch (\Exception $e) {
            abort(500, 'Erreur de paiement : ' . $e->getMessage());
        }
    }
}
