<?php

namespace App\Livewire\Guest\Error\Page;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Denied extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.error.page.denied');
    }
}
