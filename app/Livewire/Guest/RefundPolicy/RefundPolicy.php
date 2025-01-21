<?php

namespace App\Livewire\Guest\RefundPolicy;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]

class RefundPolicy extends Component
{
    public function render()
    {
        return view('livewire.guest.refund-policy.refund-policy');
    }
}
