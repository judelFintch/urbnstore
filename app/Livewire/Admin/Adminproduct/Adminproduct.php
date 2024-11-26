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

class Adminproduct extends Component
{

    use WithPagination;
    use WithFileUploads;

    #[Layout('layouts.app')]

    public $title = 'Test Product';
    public $price = 99.99;
    public $stock = 100;
    public $category_id = 1; // Assuming category with ID 1 exists
    public $color = 'Red';
    public $material = 'Cotton';
    public $sleeve_type = 'Short Sleeve';
    public $collar_type = 'V-neck';
    public $fit = 'Regular';
    public $size_available = 'M, L, XL';
    public $care_instructions = 'Machine Washable';
    public $tags = 'Summer, Casual';
    public $image_url = 'https://example.com/product-image.jpg';
    public $rating = 4.5;
    public $sales_count = 200;
    public $discount = 10;
    public $discount_end_date = '2024-12-31';
    public $long_description = 'This is a sample long description for the test product.';
    public  $isEdit =false;
    public $currency = 'USD';
    public $is_active = 1;
    public $categories = []; // Add categories here if necessary.
    public $image; // Image property


    public function mount()
    {
        $this->categories = CategoryArticles::all(); // Récupérer toutes les catégories
    }

    public function render()
    {
        $products = Product::with('details', 'category')->paginate(10);
        return view('livewire.admin.adminproduct.adminproduct', compact('products'));
    }
 // Afficher le formulaire pour ajouter un produit
 public function create()
 {
     $this->resetFields();
     $this->isEdit = false;
 }

 // Sauvegarder un produit et ses détails (ajout ou modification)
 public function save()
 {

    
     /* $this->validate([
         'title' => 'required|string|max:255',
         'slug' => 'required|string|unique:products,slug,' . $this->productId,
         'description' => 'required|string',
         'price' => 'required|numeric|min:0',
         'stock' => 'required|integer|min:0',
         'currency' => 'required|string|max:5',
         'is_active' => 'required|boolean',
         'category_id' => 'required|exists:category_articles,id', // Relation avec la table des catégories
         // Validation des détails
         'color' => 'required|string',
         'material' => 'required|string',
         'sleeve_type' => 'required|string',
         'collar_type' => 'required|string',
         'fit' => 'required|string',
         'size_available' => 'required|string',
         'care_instructions' => 'required|string',
         'rating' => 'required|numeric|min:0|max:5',
         'sales_count' => 'required|integer|min:0',
         'discount' => 'required|numeric|min:0',
         'discount_end_date' => 'required|date',
         'long_description' => 'nullable|string',
     ]);*/

     // Créer ou mettre à jour le produit
    // $imagePath = $this->image->store('products', 'public');
    // $img = Image::make(Storage::disk('public')->get($imagePath));
    // $img->encode('jpg')->save(Storage::disk('public')->path('products/' . pathinfo($imagePath, PATHINFO_FILENAME) . '.jpg'));
     if ($this->isEdit) {
         $product = Product::find($this->productId);
         $product->update([
             'title' => $this->title,
             'slug' => $this->title,
             'description' => $this->long_description,
             'price' => $this->price,
             'stock' => $this->stock,
             'currency' => $this->currency,
             'is_active' => 1,
             'category_id' => $this->category_id,
         ]);
     } else {

         
         $product = Product::create([
             'title' => $this->title,
             'slug' => $this->title,
             'description' => $this->long_description,
             'price' => $this->price,
             'stock' => $this->stock,
             'currency' => $this->currency,
             'is_active' => 1,
             'category_id' => $this->category_id,
         ]);
     }

     // Créer ou mettre à jour les détails du produit
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
             'image_url' => $this->image_url,
             'rating' => $this->rating,
             'sales_count' => $this->sales_count,
             'discount' => $this->discount,
             'discount_end_date' => $this->discount_end_date,
             'long_description' => $this->long_description,
         ]
     );

     session()->flash('message', $this->isEdit ? 'Product updated successfully!' : 'Product created successfully!');
     $this->resetFields();
 }

 // Réinitialiser les champs du formulaire
 private function resetFields()
 {
     $this->title = '';
     $this->slug = '';
     $this->description = '';
     $this->price = '';
     $this->stock = '';
     $this->currency = '$';
     $this->is_active = true;
     $this->category_id = null;
     
     // Réinitialisation des détails
     $this->isNew = false;
     $this->inSold = false;
     $this->isOnSale = false;
     $this->color = 'Blanc';
     $this->material = '100% coton';
     $this->sleeve_type = 'Manches courtes';
     $this->collar_type = 'Col rond';
     $this->fit = 'Coupe droite';
     $this->size_available = 'S, M, L, XL';
     $this->care_instructions = 'Lavable en machine à 30°C';
     $this->tags = '';
     $this->image_url = '/images/product-detail-01.jpg';
     $this->rating = 4.5;
     $this->sales_count = 0;
     $this->discount = 0.0;
     $this->discount_end_date = '2024-12-31';
     $this->long_description = '';
 }
}
