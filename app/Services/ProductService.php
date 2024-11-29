<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Str;

class ProductService
{
    /**
     * Create or update a product with its details.
     *
     * @param array $data Main product data.
     * @param array $dataDetails Product details data.
     * @param bool $isEdit Whether it's an update operation.
     * @param int|null $productId ID of the product to update (null for creation).
     * @return Product
     */
    public function createOrUpdateProduct(array $data, array $dataDetails, bool $isEdit = false, $productId = null)
    {
        // Generate a unique slug
        $data['slug'] = $this->generateUniqueSlug(Str::slug($data['title']));

        // Update or create the main product
        $product = $isEdit
            ? tap(Product::findOrFail($productId))->update($data)
            : Product::create($data);

        // Update or create the product details
        $product->details()->updateOrCreate(
            ['product_id' => $product->id],
            $dataDetails
        );

        return $product;
    }

    /**
     * Generate a unique slug for a product.
     *
     * @param string $slug
     * @return string
     */
    private function generateUniqueSlug(string $slug): string
    {
        $originalSlug = $slug;
        $counter = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }

    /**
     * Delete a product and its details.
     *
     * @param int $productId
     * @return bool
     * @throws \Exception If the product cannot be deleted.
     */
    public function deleteProduct(int $productId): bool
    {
        $product = Product::findOrFail($productId);

        // Delete associated details first
        $product->details()->delete();

        // Delete the product itself
        return $product->delete();
    }
}
