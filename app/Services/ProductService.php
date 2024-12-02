<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
        try {
            $product = Product::findOrFail($productId);

            DB::transaction(function () use ($product) {
                $product->details()->delete();
                $product->delete();
            });

            return true;
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du produit : ' . $e->getMessage());
            throw new \RuntimeException('Impossible de supprimer le produit.');
        }
    }

    public function getLatestProduct()
    {

        return Product::with('details')->get();
    }

    public function getPaginateProduct(int $paginate )
    {
        $paginator = Product::with('details')->paginate($paginate);

        return $paginator->items();

    }


    public function getImagesUrl($productId){
        $product = Product::findOrFail($productId);
        return $images = json_decode($product->details->image_url, true); // Decode JSON into an array
       
    }

}
