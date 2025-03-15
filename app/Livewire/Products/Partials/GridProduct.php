<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class GridProduct extends Component
{
    use WithPagination;

    public $specificProductCategory = '4'; // Catégorie filtrée
    protected $paginationTheme = 'tailwind'; // Ou bootstrap selon ton design

    /**
     * Rechargement de la page quand on change de catégorie (utile si dynamique)
     */
    protected $updatesQueryString = ['page'];

    public function render()
    {
        $specificProducts = Product::where('category_id', $this->specificProductCategory)
            ->orderBy('id', 'desc')
            ->paginate(8); // 8 produits par page

        return view('livewire.products.partials.grid-product', compact('specificProducts'));
    }
}
