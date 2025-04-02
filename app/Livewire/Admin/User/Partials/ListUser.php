<?php

namespace App\Livewire\Admin\User\Partials;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\Users\UserService;
use Lavewire\WithPagination;
#[Layout('layouts.app')]

class ListUser extends Component
{
 
    public function render()
    {
        return view('livewire.admin.user.partials.list-user', [
            'users' => UserService::paginated(10)
        ]);
    }
}
