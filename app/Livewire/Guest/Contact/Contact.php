<?php

namespace App\Livewire\Guest\Contact;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Contact extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {

        $contact = config('contact');
        return view('livewire.guest.contact.contact', compact('contact'));
    }
}
