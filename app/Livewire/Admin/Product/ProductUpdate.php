<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\CategoryArticles as Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ProductUpdate extends Component
{
    use WithFileUploads;

    public $product;
    public $categories = [];
    public $uploadedFiles = [];
    public $images = [];
    public $form = [];

    protected $rules = [
        'form.title' => 'required|string|max:255',
        'form.price' => 'required|numeric|min:0',
        'form.stock' => 'required|integer|min:0',
        'form.category_id' => 'required|exists:categories,id',
        'form.color' => 'required|string',
        'form.material' => 'required|string',
        'form.sleeve_type' => 'required|string',
        'form.collar_type' => 'required|string',
        'form.fit' => 'required|string',
        'form.size_available' => 'required|string',
        'form.care_instructions' => 'required|string',
        'form.tags' => 'required|string',
        'form.rating' => 'required|numeric|min:0|max:5',
        'form.sales_count' => 'required|integer|min:0',
        'form.discount' => 'required|numeric|min:0',
        'form.discount_end_date' => 'required|date',
        'uploadedFiles.*' => 'image|mimes:jpg,png,jpeg|max:2048',
    ];

    public function mount($id)
    {
        $this->product = Product::with('details')->findOrFail($id);
        $this->categories = Category::all();

        $this->form = array_merge(
            $this->product->toArray(),
            $this->product->details->toArray() ?? []
        );
        $this->images = json_decode($this->product->details->image_url ?? '[]', true);
    }

    public function save()
    {
        $this->validate();

        $this->product->update($this->prepareProductData());
        $this->product->details()->update($this->prepareProductDetails());

        session()->flash('message', 'Product updated successfully!');
        return redirect()->route('admin.products.view');
    }

    public function deleteImage($imageKey)
    {
        $imagePath = $this->images[$imageKey] ?? null;

        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        unset($this->images[$imageKey]);
        $this->updateProductImages();
        session()->flash('message', 'Image deleted successfully!');
    }

    private function updateProductImages()
    {
        $this->product->details()->update([
            'image_url' => json_encode(array_values($this->images)),
        ]);
    }

    private function prepareProductData()
    {
        return [
            'title' => $this->form['title'],
            'price' => $this->form['price'],
            'stock' => $this->form['stock'],
            'currency' => $this->form['currency'] ?? 'USD',
            'is_active' => $this->form['is_active'] ?? true,
            'category_id' => $this->form['category_id'],
        ];
    }

    private function prepareProductDetails()
    {
        return array_merge($this->form, [
            'image_url' => json_encode(array_merge($this->images, $this->uploadImages($this->uploadedFiles))),
        ]);
    }

    private function uploadImages($files)
    {
        return collect($files)->map(fn($file) => $file->store('products', 'public'))->toArray();
    }

    public function render()
    {
        return view('livewire.admin.product.product-update', [
            'categories' => $this->categories,
        ]);
    }
}
