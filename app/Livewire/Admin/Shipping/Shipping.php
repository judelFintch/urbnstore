<?php

namespace App\Livewire\Admin\Shipping;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class Shipping extends Component
{
    public function render()
    {
        return view('livewire.admin.shipping.shipping');
    }
}
