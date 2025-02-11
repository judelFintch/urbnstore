<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Users extends Component
{
    public User $user;

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.user.users');
    }
}
