<?php

namespace App\Livewire\Cart;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Cartshow extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        
        return view('livewire.cart.cartshow');
    }
}
