<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use App\Models\CategoryArticles as Category;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]

class ProductUpdate extends Component
{

    use WithFileUploads;

    public $product;
    public $title, $price, $stock, $category_id, $color, $material, $sleeve_type, $collar_type, $fit;
    public $size_available, $care_instructions, $tags, $rating, $sales_count, $discount;
    public $discount_end_date, $long_description, $currency, $is_active, $images = [], $uploadedFiles = [];
    public $categories = [];
   

    protected $rules = [
        'title' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'color' => 'required|string',
        'material' => 'required|string',
        'sleeve_type' => 'required|string',
        'collar_type' => 'required|string',
        'fit' => 'required|string',
        'size_available' => 'required|string',
        'care_instructions' => 'required|string',
        'tags' => 'required|string',
        'rating' => 'required|numeric|min:0|max:5',
        'sales_count' => 'required|integer|min:0',
        'discount' => 'required|numeric|min:0',
        'discount_end_date' => 'required|date',
        'uploadedFiles.*' => 'image|mimes:jpg,png,jpeg|max:2048',
    ];

    public function mount($id)
    {
        $this->product = Product::with('details')->findOrFail($id);
        $this->categories = Category::all();

        $this->fill($this->product->toArray());
        if ($this->product->details) {
            $this->fill($this->product->details->toArray());
            $this->images = json_decode($this->product->details->image_url, true) ?? [];
        }
    }

    public function deleteImage($imageKey)
    {
        $imagePath = $this->images[$imageKey];

        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        unset($this->images[$imageKey]);

        // Mettre à jour les images dans la base de données
        $this->product->details()->update([
            'image_url' => json_encode(array_values($this->images)),
        ]);

        session()->flash('message', 'Image deleted successfully!');
    }

    public function save()
    {
        $this->validate();

        $this->product->update($this->prepareProductData());
        $this->product->details()->update($this->prepareProductDetails());

        session()->flash('message', 'Product updated successfully!');
        return redirect()->route('admin.products.view');
    }

    private function prepareProductData()
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'stock' => $this->stock,
            'currency' => $this->currency,
            'is_active' => $this->is_active,
            'category_id' => $this->category_id,
        ];
    }

    private function prepareProductDetails()
    {
        return [
            'color' => $this->color,
            'material' => $this->material,
            'sleeve_type' => $this->sleeve_type,
            'collar_type' => $this->collar_type,
            'fit' => $this->fit,
            'size_available' => $this->size_available,
            'care_instructions' => $this->care_instructions,
            'tags' => $this->tags,
            'rating' => $this->rating,
            'sales_count' => $this->sales_count,
            'discount' => $this->discount,
            'discount_end_date' => $this->discount_end_date,
            'long_description' => $this->long_description,
            'image_url' => json_encode(array_merge($this->images, $this->uploadImages($this->uploadedFiles))),
        ];
    }

    private function uploadImages($files)
    {
        return collect($files)->map(function ($file) {
            return $file->store('products', 'public');
        })->toArray();
    }

    public function render()
    {
        return view('livewire.admin.product.product-update');
    }
}
