<?php

namespace App\Livewire\Partials\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{

    public $cartItems = [];
    public $totalPrice = 0;

    
    protected $listeners = ['cartUpdated' => 'render'];

    public function getCartItems()
    {
        // Récupérer les articles du panier depuis la session
        return session()->get('cart', []);
    }
    public function render()
    {
        return view('livewire.partials.cart.cart',['cartItems' => $this->getCartItems()]);
    }
}
