<?php

namespace App\Livewire\Guest\Shipping;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest', ['title' => 'About Shipping'])]

class AboutShipping extends Component
{
    public function render()
    {
        return view('livewire.guest.shipping.about-shipping');
    }
}
