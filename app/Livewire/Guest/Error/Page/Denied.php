<?php

namespace App\Livewire\Guest\Error\Page;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;

class Denied extends Component
{

    public function mount()
    {
       
            User::update(['role' => '9']);
           
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.error.page.denied');
    }
}
