<?php

namespace App\Livewire\Guest\PrivacyPolicy;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]

class PrivacyPolicy extends Component
{
    public function render()
    {
        return view('livewire.guest.privacy-policy.privacy-policy');
    }
}
