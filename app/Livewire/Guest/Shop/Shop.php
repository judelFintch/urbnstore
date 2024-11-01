<?php

namespace App\Livewire\Guest\Shop;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Shop extends Component
{
    #[Layout("layouts.guest")]
    public function render()
    {
        return view('livewire.guest.shop.shop');
    }
}
