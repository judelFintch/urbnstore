<?php

namespace App\Livewire\Guest\Shipping;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest', ['title' => 'About Shipping'])]

class AboutShipping extends Component
{
    public function render()
    {
        return view('livewire.guest.shipping.about-shipping');
    }
}
