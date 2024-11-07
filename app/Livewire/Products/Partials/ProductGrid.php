<?php

namespace App\Livewire\Products\Partials;

use Livewire\Component;
use App\Models\Product;
use App\Models\CategoryArticles;
class ProductGrid extends Component
{

  
    public $products;
    public $categories;
    public $selectedCategory = 'all';
    public $category = 'all';
    public $priceRange = 'all';
    public $color = 'all';
    public $product;
    public $showModal = false; 
    public $isHomePage;


    public function mount($isHomePage)
    {
        $this->products = Product::with('category')->get();
        $this->categories = CategoryArticles::all();
        //this active the title for the homepage product is true
         $this->isHomePage = $isHomePage ;
    }

    public function showProduct($productId)
    {
    
        $this->product = Product::find($productId);
        $this->dispatch('open-modal');
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
    }
    public function render()
    {

        $filteredProducts = $this->selectedCategory === 'all'
            ? $this->products
            : array_filter($this->products, fn($product) => $product['category'] === $this->selectedCategory);

        return view('livewire.products.partials.product-grid', ['filteredProducts' => $filteredProducts]);
       
    }
}
