<?php

namespace App\Livewire\Admin\Product;

use App\Models\CategoryArticles as Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

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
        'form.category_id' => 'required|exists:category_articles,id',
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

        // Mise à jour du produit
        $this->product->update($this->prepareProductData());

        // Mise à jour des détails du produit
        $details = $this->prepareProductDetails();
        $this->product->details()->update($details);

        session()->flash('message', 'Produit mis à jour avec succès.');
        // return redirect()->route('admin.products.view');
    }

    public function deleteImage($imageKey)
    {
        $imagePath = $this->images[$imageKey] ?? null;

        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        unset($this->images[$imageKey]);
        $this->updateProductImages();
        session()->flash('message', 'Image supprimée avec succès.');
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
        return collect($this->form)
            ->only([
                'color',
                'material',
                'sleeve_type',
                'collar_type',
                'fit',
                'size_available',
                'care_instructions',
                'tags',
                'rating',
                'sales_count',
                'discount',
                'discount_end_date',
                'long_description',
            ])
            ->merge([
                'image_url' => json_encode(array_merge($this->images, $this->uploadImages($this->uploadedFiles))),
            ])
            ->toArray();
    }

    private function uploadImages($files)
    {
        return collect($files)
            ->filter(fn ($file) => $file->isValid())
            ->map(fn ($file) => $file->store('products', 'public'))
            ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.product.product-update', [
            'categories' => $this->categories,
        ]);
    }
}
