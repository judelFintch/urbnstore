<?php

namespace App\Livewire\Guest\About;

use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.about.about');
    }
}
