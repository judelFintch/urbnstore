<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * ProductDetails Component
 *
 * Ce composant Livewire gère l'affichage des détails d'un produit.
 * Il récupère les informations complètes du produit, ses détails et ses images,
 * ainsi que la gestion de l'ajout au panier et la sélection de la taille.
 *
 * Informations sur l'auteur :
 * Auteur : judel fintch
 * Email : judfintch@gmail.com
 * Date : 2025-03-07
 * Description : Composant pour gérer l'affichage détaillé d'un produit, incluant l'ajout au panier.
 */
class ProductDetails extends Component
{
    /**
     * Le produit actuellement affiché.
     *
     * @var \App\Models\Product
     */
    public $product;

    /**
     * Taille sélectionnée pour le produit.
     *
     * @var mixed
     */
    public $selectedSize;

    #[Layout('layouts.guest')]
    public function mount($id)
    {
        // Vérifier que l'ID est constitué uniquement de chiffres, sinon renvoyer une erreur 404.
        if (! ctype_digit($id)) {
            abort(404);
        }
        // Récupérer le produit avec ses détails et ses images.
        $this->product = Product::with(['details', 'productPicture'])->findOrFail($id);

        // Initialiser la taille sélectionnée à null.
        $this->selectedSize = null;
    }

    /**
     * Met à jour la taille sélectionnée.
     *
     * @param mixed $value La taille sélectionnée.
     * @return void
     */
    public function updatedSelectedSize($value)
    {
        $this->selectedSize = $value;
    }

    /**
     * Ajoute le produit au panier.
     *
     * Récupère le panier de la session, ajoute le produit (ou incrémente la quantité)
     * et met à jour la session. Émet également un événement pour notifier la mise à jour.
     *
     * @return void
     */
    public function addToCart()
    {
        // Récupérer le panier depuis la session ou en créer un nouveau.
        $cart = session()->get('cart', []);

        // Ajouter le produit au panier ou incrémenter la quantité s'il existe déjà.
        $cart[$this->product->id] = [
            'name' => $this->product->name,
            'price' => $this->product->price,
            'quantity' => ($cart[$this->product->id]['quantity'] ?? 0) + 1,
        ];

        // Mettre à jour le panier dans la session.
        session()->put('cart', $cart);

        // Émettre un événement pour mettre à jour éventuellement d'autres composants liés au panier.
        $this->emit('cartUpdated');
    }

    /**
     * Rendu du composant.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.products.product-details');
    }

    /**
     * Récupère un produit avec tous ses détails, avis et produits liés.
     *
     * @param int $id L'identifiant du produit.
     * @param string $category La catégorie à laquelle appartient le produit.
     * @param string $slug Le slug du produit.
     * @return \App\Models\Product
     */
    public function show($id, $category, $slug)
    {
        $product = Product::with(['details', 'reviews', 'category.relatedProducts'])
            ->findOrFail($id);

        // Logique additionnelle (par exemple, mise en forme ou préparation d'autres données) peut être ajoutée ici.
        return $product;
    }
}
