<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class UserDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.user.user-dashboard');
    }
    
}
