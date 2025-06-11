<?php

namespace Tests\Unit;

use App\Models\CategoryArticles;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    private ProductService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new ProductService();
    }

    public function test_create_product(): void
    {
        $category = CategoryArticles::create([
            'name' => 'Category',
            'slug' => 'category',
        ]);

        $data = [
            'title' => 'My Product',
            'description' => 'A simple description',
            'price' => 9.99,
            'stock' => 10,
            'category_id' => $category->id,
        ];

        $details = [
            'color' => 'Red',
        ];

        $product = $this->service->createOrUpdateProduct($data, $details);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'title' => 'My Product',
            'slug' => Str::slug('My Product'),
        ]);

        $this->assertDatabaseHas('product_details', [
            'product_id' => $product->id,
            'color' => 'Red',
        ]);
    }

    public function test_update_product(): void
    {
        $category = CategoryArticles::create([
            'name' => 'Category',
            'slug' => 'category',
        ]);

        $data = [
            'title' => 'Original Product',
            'description' => 'A description',
            'price' => 9.99,
            'stock' => 10,
            'category_id' => $category->id,
        ];

        $details = ['color' => 'Red'];

        $product = $this->service->createOrUpdateProduct($data, $details);

        $updateData = [
            'title' => 'Updated Product',
            'description' => 'Updated description',
            'price' => 19.99,
            'stock' => 5,
            'category_id' => $category->id,
        ];

        $updateDetails = ['color' => 'Blue'];

        $updated = $this->service->createOrUpdateProduct($updateData, $updateDetails, true, $product->id);

        $this->assertEquals($product->id, $updated->id);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'title' => 'Updated Product',
            'slug' => Str::slug('Updated Product'),
        ]);

        $this->assertDatabaseHas('product_details', [
            'product_id' => $product->id,
            'color' => 'Blue',
        ]);
    }

    public function test_delete_product(): void
    {
        $category = CategoryArticles::create([
            'name' => 'Category',
            'slug' => 'category',
        ]);

        $data = [
            'title' => 'Product to Delete',
            'description' => 'A description',
            'price' => 9.99,
            'stock' => 10,
            'category_id' => $category->id,
        ];

        $details = ['color' => 'Green'];

        $product = $this->service->createOrUpdateProduct($data, $details);

        $result = $this->service->deleteProduct($product->id);

        $this->assertTrue($result);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        $this->assertDatabaseMissing('product_details', ['product_id' => $product->id]);
    }
}
