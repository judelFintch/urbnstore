<?php

namespace App\Livewire\Admin\Message;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class ContactMessage extends Component
{
    public function render()
    {
        return view('livewire.admin.message.contact-message');
    }
}
