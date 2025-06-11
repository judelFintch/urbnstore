<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * ProductList Component
 *
 * Ce composant Livewire permet d'afficher la liste complète des produits
 * avec leurs détails et la catégorie associée.
 *
 * Informations sur l'auteur :
 * Auteur : judel fintch
 * Email : judfintch@gmail.com
 * Date : 2025-03-07
 * Description : Composant pour gérer l'affichage de la liste des produits dans l'administration.
 */
#[Layout('layouts.app')]
class ProductList extends Component
{
    /**
     * Rendu du composant.
     *
     * Récupère tous les produits avec leurs détails et la catégorie associée,
     * puis passe ces données à la vue correspondante.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $products = Product::with('details', 'category')->latest()->get();

        return view('livewire.admin.product.product-list', compact('products'));
    }
}
