<?php

namespace App\Livewire\ProcessOrder;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Checkout extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.process-order.checkout');
    }
}
