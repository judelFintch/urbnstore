<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * GridProduct Component
 *
 * Ce composant Livewire affiche une grille de produits spécifiques avec pagination dynamique.
 */
class GridProduct extends Component
{
    use WithPagination;

    public $specificProductCategory = '4';
    protected $paginationTheme = 'bootstrap'; // Pour utiliser le style Bootstrap (optionnel)

    // Permet de réinitialiser la page quand on change de catégorie si besoin (important dans d'autres cas)
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
            ->paginate(8); // Nombre de produits par page

        return view('livewire.products.partials.grid-product', [
            'specificProducts' => $specificProducts,
        ]);
    }
}
