<?php

namespace App\Livewire\Guest\Shop;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Shop extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.shop.shop');
    }
}
