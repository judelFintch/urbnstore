<?php

namespace App\Livewire\Admin\Adminproduct;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CategoryArticles;
use App\Services\ProductService;
use App\Traits\HandlesProductImages;
use App\Models\Product;

class Adminproduct extends Component
{
    use WithPagination, WithFileUploads, HandlesProductImages;

    #[Layout('layouts.app')]

    public $title, $price, $stock, $category_id, $color, $material, $sleeve_type, $collar_type, $fit;
    public $size_available, $care_instructions = 'Machine washable at 30°C', $tags, $rating, $sales_count, $discount;
    public $discount_end_date, $long_description, $description, $currency = 'USD', $is_active = 1, $productId;
    public $isEdit = false, $isCreate = false, $categories = [], $images = [];
    public bool $isList = true;
    public $uploadedFiles = [];
    public $showSuccessModal = false;
    public $productToDelete = null;


    protected $rules = [
        'title' => 'required|string|max:255', 'price' => 'required|numeric|min:0', 'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:category_articles,id', 'color' => 'required|string', 'material' => 'required|string',
        'sleeve_type' => 'required|string', 'collar_type' => 'required|string', 'fit' => 'required|string',
        'size_available' => 'required|string', 'care_instructions' => 'required|string', 'tags' => 'required|string',
        'rating' => 'required|numeric|min:0|max:5', 'sales_count' => 'required|integer|min:0', 'discount' => 'required|numeric|min:0',
        'discount_end_date' => 'required|date', 'images.*' => 'image|mimes:jpg,png,jpeg|max:2048'
    ];

    public function mount()
    {
        $this->categories = CategoryArticles::all();
    }

    public function render()
    {
        $products = Product::with('details', 'category')->paginate(10);
        return view('livewire.admin.adminproduct.adminproduct', compact('products'));
    }

    public function save(ProductService $productService)
    {
        $this->validate();
        if (!empty($this->uploadedFiles)) {
            $this->images = $this->uploadImages($this->uploadedFiles);
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
            session()->flash('notification', [
                'type' => 'error',
                'message' => 'Error: ' . $e->getMessage(),
            ]);
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
        ]);
    }

    public function create(string $options)
    {
        $this->isCreate = true;
        $this->isList = false;
    }

    public function confirmDeleteProduct($productId){
        $this->productToDelete = $productId;
    $this->dispatch('show-delete-confirmation'); //

    }

    public function edit($productId)
    {

    }

    public function deleteProduct(ProductService $productService, $productId)
    {
        $delete = $productService->DeleteProduct($productId);

        dd($delete);

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
