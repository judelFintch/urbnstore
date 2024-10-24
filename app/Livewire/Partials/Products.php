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
    public $product;
    public $showModal = false; // Variable pour gérer l'affichage de la modale


    public function mount()
    {
        $this->products = Product::with('category')->get();
        $this->categories = CategoryArticles::all();
    }

    public function showProduct($productId)
    {
        // Récupère le produit depuis la base de données
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

        return view('livewire.partials.products', ['filteredProducts' => $filteredProducts]);

    }
}
