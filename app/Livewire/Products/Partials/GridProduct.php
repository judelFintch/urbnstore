<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * GridProduct Component
 *
 * Ce composant Livewire affiche une grille de produits spécifiques avec pagination.
 */
class GridProduct extends Component
{
    use WithPagination;

    public $specificProductCategory = '4';
    protected $paginationTheme = 'bootstrap'; // Pour utiliser la pagination Bootstrap

    /**
     * Rendu du composant avec pagination.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $specificProducts = Product::where('category_id', $this->specificProductCategory)
            ->orderBy('id', 'desc')
            ->paginate(8); // Afficher 8 produits par page

        return view('livewire.products.partials.grid-product', compact('specificProducts'));
    }
}
