<?php

namespace App\Livewire\Homepages;
use Livewire\Attributes\Layout;

use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.homepages.index');
    }
}
