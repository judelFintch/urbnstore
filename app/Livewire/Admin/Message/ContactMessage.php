<?php

namespace App\Livewire\Admin\Message;

use App\Models\ContactMessage as Message;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class ContactMessage extends Component
{
    public $messages;

    public function mount(Message $message)
    {
        $this->messages = $message->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.message.contact-message', ['messages' => $this->messages]);
    }
}
