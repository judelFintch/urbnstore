<?php

namespace App\Livewire\Guest\TermsAndConditions;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]

class TermsAndConditions extends Component
{
    public function render()
    {
        return view('livewire.guest.terms-and-conditions.terms-and-conditions');
    }
}
