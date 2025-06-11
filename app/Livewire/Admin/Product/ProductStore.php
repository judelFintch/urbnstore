<?php

namespace App\Livewire\Admin\Product;

use App\Models\CategoryArticles;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\HandlesProductImages;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductStore extends Component
{
    use HandlesProductImages, WithFileUploads, WithPagination;

    #[Layout('layouts.app')]
    public $title;

    public $price;

    public $stock;

    public $category_id;

    public $color;

    public $material;

    public $sleeve_type;

    public $collar_type;

    public $fit;

    public $size_available;

    public $care_instructions = 'Machine washable at 30°C';

    public $tags;

    public $rating;

    public $sales_count;

    public $discount;

    public $discount_end_date;

    public $long_description;

    public $description;

    public $currency = 'USD';

    public $is_active = 1;

    public $productId;

    public $isEdit = false;

    public $isCreate = false;

    public $categories = [];

    public $images = [];

    public bool $isList = true;

    public $uploadedFiles = [];

    public $showSuccessModal = false;

    public $productToDelete = null;

    protected $rules = [
        'title' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:category_articles,id',
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
        'images.*' => 'image|mimes:jpg,png,jpeg|max:2048',
        'uploadedFiles' => 'array|min:1',
    ];

    public function mount()
    {
        $this->categories = CategoryArticles::all();
    }

    public function render()
    {
        $products = Product::with('details', 'category')->paginate(10);

        return view('livewire.admin.product.product-store', compact('products'));
    }

    public function save(ProductService $productService)
    {
        $this->validate();

        // Upload des images
        if (! empty($this->uploadedFiles)) {
            $uploadedImages = $this->uploadImages($this->uploadedFiles);
            $this->images = array_merge($this->images, $uploadedImages);
        }

        $data = $this->prepareProductData();
        $dataDetails = $this->prepareProductDetails();

        try {
            $productService->createOrUpdateProduct($data, $dataDetails, $this->isEdit, $this->productId);

            session()->flash('notification', [
                'type' => 'success',
                'message' => $this->isEdit ? 'Product updated!' : 'Product created!',
            ]);

            $this->resetFields();
            $this->isList = true;
            $this->isCreate = false;
            $this->showSuccessModal = true;

        } catch (\Exception $e) {
            \Log::error('Error saving product: '.$e->getMessage());
            session()->flash('notification', [
                'type' => 'error',
                'message' => 'Error: '.$e->getMessage(),
            ]);
        }
    }

    private function uploadImages($files)
    {
        $uploadedPaths = [];
        foreach ($files as $file) {
            if ($file->isValid()) {
                try {
                    $path = $file->store('products', 'public');
                    $uploadedPaths[] = $path;
                } catch (\Exception $e) {
                    \Log::error('Image upload failed: '.$e->getMessage());
                }
            }
        }

        return $uploadedPaths;
    }

    public function removeImage($index)
    {
        if (isset($this->images[$index])) {
            Storage::disk('public')->delete($this->images[$index]);
            unset($this->images[$index]);
            $this->images = array_values($this->images);
        }
    }

    private function resetFields()
    {
        $this->fill([
            'title' => '',
            'price' => '',
            'stock' => '',
            'category_id' => null,
            'images' => [],
            'uploadedFiles' => [],
        ]);
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
            'image_url' => json_encode($this->images),
            'rating' => $this->rating,
            'sales_count' => $this->sales_count,
            'discount' => $this->discount,
            'discount_end_date' => $this->discount_end_date,
            'long_description' => $this->long_description,
        ];
    }

    public function removeUploadedFile($index)
    {
        unset($this->uploadedFiles[$index]);
        $this->uploadedFiles = array_values($this->uploadedFiles); // Réindexation
    }

    private function prepareProductData()
    {
        return [
            'title' => $this->title,
            'description' => $this->long_description,
            'price' => $this->price,
            'stock' => $this->stock,
            'currency' => $this->currency,
            'is_active' => $this->is_active,
            'category_id' => $this->category_id,
        ];
    }
}
