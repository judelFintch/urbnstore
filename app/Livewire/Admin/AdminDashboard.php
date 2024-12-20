<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminDashboard extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
