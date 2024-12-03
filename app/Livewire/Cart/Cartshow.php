<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Cartshow extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.cart.cartshow');
    }
}
