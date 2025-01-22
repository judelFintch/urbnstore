<?php

namespace App\Livewire\Guest\Error\Page;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Denied extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.error.page.denied');
    }
}
