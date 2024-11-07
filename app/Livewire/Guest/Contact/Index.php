<?php

namespace App\Livewire\Guest\Contact;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Index extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.contact.index');
    }
}
