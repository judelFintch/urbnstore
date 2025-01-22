<?php

namespace App\Livewire\Admin\Shipping;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class Shipping extends Component
{
    public function render()
    {
        return view('livewire.admin.shipping.shipping');
    }
}
