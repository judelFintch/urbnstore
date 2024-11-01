<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Product;

class ProductFilter extends Component
{
    public $category = 'all'; // Pour stocker la catégorie sélectionnée
    public $priceRange = 'all'; // Pour stocker la plage de prix sélectionnée
    public $color = 'all'; // Pour stocker la couleur sélectionnée

    public function filterByCategory($category)
    {
        $this->category = $category;
    }

    public function filterByPrice($priceRange)
    {
        $this->priceRange = $priceRange;
    }

    public function filterByColor($color)
    {
        $this->color = $color;
    }

    public function render()
    {
        $products = Product::query();

        if ($this->category != 'all') {
            $products->where('category', $this->category);
        }

        if ($this->priceRange != 'all') {
            // Logique pour filtrer par plage de prix
        }

        if ($this->color != 'all') {
            $products->where('color', $this->color);
        }

        return view('livewire.partials.product-filter', [
            'products' => $products->get(),
        ]);
    }
   
}
