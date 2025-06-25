<?php

namespace Tests\Feature\Store;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentProcessTest extends TestCase
{
    use RefreshDatabase;

    public function test_payment_route_redirects()
    {
        $product = Product::factory()->create();

        $cart = [
            [
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
            ],
        ];

        $response = $this->post('/process/process/payment', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'address' => '123 street',
            'country' => 'CM',
            'cart_json' => json_encode($cart),
        ]);

        $response->assertStatus(302);
    }
}
