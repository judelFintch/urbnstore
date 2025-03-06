<?php

namespace App\Livewire\ProcessOrder;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Confirmation extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.process-order.confirmation');
    }
}
