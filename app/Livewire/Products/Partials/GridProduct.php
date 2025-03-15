<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * GridProduct Component
 *
 * Affichage paginé des produits spécifiques, fluide avec Bootstrap.
 */
class GridProduct extends Component
{
    use WithPagination;

    public $specificProductCategory = '4';
    protected $paginationTheme = 'bootstrap'; // Utilisation de pagination Bootstrap

    // Permet d'ajouter page=2 dans l'URL et rester fluide
    protected $updatesQueryString = ['page'];

    /**
     * Rendu du composant avec pagination.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $specificProducts = Product::where('category_id', $this->specificProductCategory)
            ->orderBy('id', 'desc')
            ->paginate(8); // 8 produits par page

        return view('livewire.products.partials.grid-product', compact('specificProducts'));
    }
}
