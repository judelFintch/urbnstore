<?php

namespace App\Livewire\Guest\Contact;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.contact.index');
    }
}
