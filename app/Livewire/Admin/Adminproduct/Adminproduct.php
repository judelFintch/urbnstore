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
use Illuminate\Support\Str;

class Adminproduct extends Component
{
    use WithPagination, WithFileUploads;

    #[Layout('layouts.app')]

    public $title, $price, $stock, $category_id, $color, $material, $sleeve_type, $collar_type, $fit;
    public $size_available, $care_instructions = 'Machine washable at 30°C', $tags, $rating, $sales_count, $discount;
    public $discount_end_date, $long_description, $description, $currency = 'USD', $is_active = 1, $productId;
    public $isEdit = false, $isList = true, $isCreate = false, $categories = [], $images = [];
    public $uploadedFiles = [];

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

    public function generateUniqueSlug($slug)
    {
        $count = Product::where('slug', $slug)->count();
        return $count > 0 ? $slug . '-' . time() : $slug;
    }

    public function mount()
    {
        $this->categories = CategoryArticles::all();
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
        $this->isList = false;
        $this->isCreate = true;
    }

    public function showList()
    {
        $this->isList = true;
        $this->isCreate = false;
    }

    public function uploadImages($files)
    {

    
        foreach ($files as $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $path = $file->store('products', 'public');
                $this->images[] = Storage::url($path); // Ajoute seulement les URLs
            }
        }
    }

    public function save()
    {
        $this->validate();
        if (!empty($this->uploadedFiles)) {
            $this->uploadImages($this->uploadedFiles); // Traite les nouveaux fichiers
        }
    

        $slug = $this->generateUniqueSlug(Str::slug($this->title));
        
        // Upload files if there are any new uploads
       

        $data = [
            'title' => $this->title,
            'slug' => $slug,
            'description' => $this->long_description,
            'price' => $this->price,
            'stock' => $this->stock,
            'currency' => $this->currency,
            'is_active' => $this->is_active,
            'category_id' => $this->category_id,
        ];

        $product = $this->isEdit
            ? tap(Product::findOrFail($this->productId))->update($data)
            : Product::create($data);

            
           
        $product->details()->updateOrCreate(
            ['product_id' => $product->id],
            [
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
            ]

            
        );

        $this->dispatchBrowserEvent('notification', [
            'type' => 'success',
            'message' => $this->isEdit ? 'Product updated successfully!' : 'Product created successfully!'
        ]);

        $this->resetFields();
        $this->showList();
    }

    private function resetFields()
    {
        $this->fill([
            'title' => '', 'price' => '', 'stock' => '', 'category_id' => null, 'color' => '',
            'material' => '', 'sleeve_type' => '', 'collar_type' => '', 'fit' => '',
            'size_available' => '', 'care_instructions' => 'Machine washable at 30°C',
            'tags' => '', 'rating' => 4.5, 'sales_count' => 0, 'discount' => 0.0,
            'discount_end_date' => '2024-12-31', 'long_description' => '', 'currency' => 'USD',
            'images' => []
        ]);
    }
}
