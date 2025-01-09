<?php

namespace App\Livewire\Admin\Message;

use Livewire\Component;
use App\Models\ContactMessage as Message;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class ContactMessage extends Component
{
    public $messages;

    public function mount()
    {
        $this->messages = Message::all();
    }

    public function render()
    {
        return view('livewire.admin.message.contact-message', ['messages' => $this->messages]);
    }
}
