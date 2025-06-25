<?php

namespace Tests\Feature\Store;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created_and_updated()
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
        ]);

        $product->update(['title' => 'Updated Title']);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'title' => 'Updated Title',
        ]);
    }
}
