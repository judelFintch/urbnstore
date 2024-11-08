<?php

namespace App\Livewire\Partials\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{

    public $cartItems = [];
    public $totalPrice = 0;

    
    public function mount()
    {
        // Vérifier si le panier existe dans la session
        $this->cartItems = session()->get('cart', []);
        $this->calculateTotal();
    }
    // Ajouter un produit au panier
    public function addToCart($productId, $quantity = 1)
    {
        $product = \App\Models\Product::find($productId);
        if ($product) {
            $cart = session()->get('cart', []);

            // Si l'article est déjà dans le panier, on met à jour la quantité
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                // Sinon on l'ajoute au panier
                $cart[$productId] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                ];
            }

            // Mettre à jour la session avec le panier modifié
            session()->put('cart', $cart);
            $this->cartItems = $cart;

            // Recalculer le total
            $this->calculateTotal();
        }
    }

    // Supprimer un produit du panier
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->cartItems = $cart;
            $this->calculateTotal();
        }
    }

    // Calculer le prix total
    public function calculateTotal()
    {
        $this->totalPrice = array_reduce($this->cartItems, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function render()
    {
        return view('livewire.partials.cart.cart');
    }
}
