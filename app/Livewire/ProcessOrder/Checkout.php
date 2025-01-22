<?php

namespace App\Livewire\ProcessOrder;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Checkout extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.process-order.checkout');
    }
}
