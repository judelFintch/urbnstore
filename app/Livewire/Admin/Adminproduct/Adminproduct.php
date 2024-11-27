<?php
namespace App\Livewire\Admin\Adminproduct;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\CategoryArticles;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class Adminproduct extends Component
{
    use WithPagination, WithFileUploads;

    #[Layout('layouts.app')]

    public $title;
    public $price;
    public $stock;
    public $category_id;
    public $color = 'White';
    public $material = '100% Cotton';
    public $sleeve_type = 'Short Sleeve';
    public $collar_type = 'Round Neck';
    public $fit = 'Regular';
    public $size_available = 'S, M, L, XL';
    public $care_instructions = 'Machine washable at 30°C';
    public $tags = '';
    public $rating = 4.5;
    public $sales_count = 0;
    public $discount = 0.0;
    public $discount_end_date = '2024-12-31';
    public $long_description = '';
    public $description = '';
    public $isEdit = false;
    public $currency = 'USD';
    public $is_active = 1;
    public $categories = [];
    public $productId;
    public $images = []; // To store multiple images
    public $isList = false;
    public $isCreate = false;

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
    ];

    public function mount()
    {
        $this->categories = CategoryArticles::all();
        $this->isList = true;
    }

    public function render()
    {
        $products = Product::with('details', 'category')->paginate(10);
        return view('livewire.admin.adminproduct.adminproduct', compact('products'));
    }

    public function create()
    {
        $this->resetFields();
        $this->isEdit = false;
    }
    public function CreateOrListShow(){
        $this->isCreate = true;
        $this->isList = false;
    }

    public function uploadImages($files)
    {
        foreach ($files as $file) {
            $path = $file->store('products', 'public');
            $this->images[] = Storage::disk('public')->url($path);
        }
    }

    public function save()
    {
        //$this->validate();

        $data = [
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->long_description,
            'price' => $this->price,
            'stock' => $this->stock,
            'currency' => $this->currency,
            'is_active' => $this->is_active,
            'category_id' => $this->category_id,
        ];

        $product = $this->isEdit
            ? tap(Product::find($this->productId))->update($data)
            : Product::create($data);

        $product->details()->updateOrCreate(
            ['product_id' => $product->id],
            [
                'isNew' => 1,
                'inSold' => 1,
                'isOnSale' => 1,
                'color' => $this->color,
                'material' => $this->material,
                'sleeve_type' => $this->sleeve_type,
                'collar_type' => $this->collar_type,
                'fit' => $this->fit,
                'size_available' => $this->size_available,
                'care_instructions' => $this->care_instructions,
                'tags' => $this->tags,
                'images' => json_encode($this->images),
                'rating' => $this->rating,
                'sales_count' => $this->sales_count,
                'discount' => $this->discount,
                'discount_end_date' => $this->discount_end_date,
                'long_description' => $this->long_description,
            ]
        );

        $this->emit('showNotification', 'Product created successfully!');

        //$this->resetFields();
    }

    private function resetFields()
    {
        $this->title = '';
        $this->price = '';
        $this->stock = '';
        $this->currency = 'USD';
        $this->is_active = 1;
        $this->category_id = null;
        $this->images = [];
        $this->color = 'White';
        $this->material = '100% Cotton';
        $this->sleeve_type = 'Short Sleeve';
        $this->collar_type = 'Round Neck';
        $this->fit = 'Regular';
        $this->size_available = 'S, M, L, XL';
        $this->care_instructions = 'Machine washable at 30°C';
        $this->tags = '';
        $this->rating = 4.5;
        $this->sales_count = 0;
        $this->discount = 0.0;
        $this->discount_end_date = '2024-12-31';
        $this->long_description = '';
    }
}
