<?php

namespace App\Livewire\Guest\Home;


use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.guest')]
    public $isHomePage = true;


    public function render()
    {
        return view('livewire.guest.home.index');
    }
}
