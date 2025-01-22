<?php

namespace App\Livewire\Guest\PrivacyPolicy;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]

class PrivacyPolicy extends Component
{
    public function render()
    {
        return view('livewire.guest.privacy-policy.privacy-policy');
    }
}
