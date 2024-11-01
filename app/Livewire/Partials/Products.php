<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Product;
use App\Models\CategoryArticles;

class Products extends Component
{

    public $products;
    public $categories;
    public $selectedCategory = 'all';
    public $category = 'all';
    public $priceRange = 'all';
    public $color = 'all';


    public function mount()
    {
        $this->products = Product::with('category')->get();
        $this->categories = CategoryArticles::all();
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

        return view('livewire.partials.products', ['filteredProducts' => $filteredProducts]);

    }
}
