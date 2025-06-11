<?php

/**
 * RelatedProducts Component
 *
 * Ce composant Livewire récupère et affiche une liste de produits liés
 * appartenant à la même catégorie que le produit actif, en excluant
 * ce dernier de la liste.
 *
 * Informations sur l'auteur :
 * Auteur : judfintch@gmail.com
 * Date : 2025-03-07
 * Description : Composant pour afficher les produits liés.
 */

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;

class RelatedProducts extends Component
{
    /**
     * Collection de produits liés.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $products;

    /**
     * Initialisation du composant.
     *
     * @param int $categoyProductSelectId ID de la catégorie de produits sélectionnée.
     * @param int $activeProduct ID du produit actif à exclure.
     * @return void
     */
    public function mount($categoyProductSelectId, $activeProduct)
    {
        // Récupérer aléatoirement jusqu'à 10 produits de la même catégorie
        // en excluant le produit actif pour éviter la redondance.
        $this->products = Product::where('category_id', $categoyProductSelectId)
            ->inRandomOrder()
            ->where('id', '!=', $activeProduct)
            ->take(10)
            ->get();
    }

    /**
     * Rendu du composant.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.products.partials.related-products');
    }
}
