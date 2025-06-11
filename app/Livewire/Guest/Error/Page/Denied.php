<?php

namespace App\Livewire\Guest\Error\Page;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

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
