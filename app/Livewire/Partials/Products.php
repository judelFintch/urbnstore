<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Products extends Component
{

    public $products = [];
    public $categories = ['all', 'women', 'men', 'bag', 'shoes', 'watches'];
    public $selectedCategory = 'all';

    public function mount()
    {
        // Initialiser les produits. Ceci pourrait être récupéré depuis la base de données.
        $this->products = [
            [
                'name' => 'Esprit Ruffle Shirt',
                'price' => '$16.64',
                'image' => 'images/product-01.jpg',
                'category' => 'women',
                'link' => 'product-detail.html'
            ],
            [
                'name' => 'Herschel Supply Co 25L',
                'price' => '$75.00',
                'image' => 'images/product-02.jpg',
                'category' => 'bag',
                'link' => 'product-detail.html'
            ],
            // Ajouter d'autres produits ici
        ];
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
