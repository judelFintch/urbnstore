<?php

namespace App\Livewire\Guest\RefundPolicy;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]

class RefundPolicy extends Component
{
    public function render()
    {
        return view('livewire.guest.refund-policy.refund-policy');
    }
}
