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

class CheckoutOrder extends Controller
{
    public function handlePayment(Request $request)
    {
        Log::debug('handlePayment: start');

        $validated = $this->validateRequest($request);
        Log::debug('handlePayment: validated data', $validated);

        $product = Product::findOrFail($validated['product_id']);
        Log::debug('handlePayment: product found', ['product_id' => $product->id, 'title' => $product->title]);

        $order = $this->createOrder($validated, $product);
        Log::debug('handlePayment: order created', ['order_id' => $order->id, 'reference' => $order->reference]);

        $this->createOrderDetails($order, $product, $validated);
        Log::debug('handlePayment: order details created');

        $paymentUrl = $this->initiateMaxicashPayment($order, $product->price * $validated['qte']);
        Log::debug('handlePayment: redirecting to payment URL', ['url' => $paymentUrl]);

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
            Log::debug('initiateMaxicashPayment: start', ['amount' => $amount]);

            $maxicash = new Maxicash(
                new Credential(
                    config('services.maxicash.merchant_id'),
                    config('services.maxicash.merchant_password')
                ),
                Environment::LIVE
            );

            $priceInCents = intval($amount * 100);

            $acceptedUrl = url('/process/accepted/payment');
            $rejectedUrl = url('/process/rejected/payment');
            $notifyUrl = url('/process/maxi-notify/payment');

            Log::debug('initiateMaxicashPayment: URLs generated', [
                'accepted' => $acceptedUrl,
                'rejected' => $rejectedUrl,
                'notify' => $notifyUrl,
                'reference' => $order->reference,
            ]);

            $paymentEntry = new PaymentEntry(
                $maxicash->credential,
                $priceInCents,
                $order->reference,
                $acceptedUrl,
                $rejectedUrl,
                $rejectedUrl,
                $notifyUrl
            );

            $url = $maxicash->queryStringURLPayment($paymentEntry);

            Log::debug('initiateMaxicashPayment: payment URL generated', ['url' => $url]);

            return $url;
        } catch (\Exception $e) {
            Log::error('Maxicash payment failed', [
                'error' => $e->getMessage()
            ]);
            abort(500, 'Erreur de paiement : ' . $e->getMessage());
        }
    }
}