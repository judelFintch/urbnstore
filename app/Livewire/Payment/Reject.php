<?php

namespace App\Livewire\Payment;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Reject extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.payment.reject');
    }
}
