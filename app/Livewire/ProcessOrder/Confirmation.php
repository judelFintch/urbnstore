<?php

namespace App\Livewire\ProcessOrder;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Confirmation extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.process-order.confirmation');
    }
}
