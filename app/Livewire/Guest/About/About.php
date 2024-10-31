<?php

namespace App\Livewire\Guest\About;

use Livewire\Component;
use Livewire\Livewire;
use Livewire\Attributes\Layout;

class About extends Component
{
    #[Layout("layouts.guest")]
    public function render()
    {
        return view('livewire.guest.about.about');
    }
}
