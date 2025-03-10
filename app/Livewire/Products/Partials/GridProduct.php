<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;

/**
 * GridProduct Component
 *
 * Ce composant Livewire récupère et affiche une grille de produits spécifiques 
 * appartenant à une catégorie précise.
 *
 * Informations sur l'auteur :
 * Auteur : judel fintch judfintch@gmail.com
 * Date : 2025-03-07
 * Description : Composant pour afficher une grille dynamique de produits triés par ID décroissant.
 */
class GridProduct extends Component
{
    /**
     * Catégorie spécifique des produits à afficher.
     *
     * @var string
     */
    public $specificProductCategory = '4';

    /**
     * Rendu du composant.
     *
     * Récupère les 16 derniers produits appartenant à la catégorie spécifiée,
     * triés par identifiant décroissant.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $specificProducts = Product::where('category_id', $this->specificProductCategory)
            ->orderBy('id', 'desc')
            ->take(16)
            ->get();

        return view('livewire.products.partials.grid-product', compact('specificProducts'));
    }
}
