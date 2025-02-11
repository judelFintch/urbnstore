<?php

namespace App\Livewire\Partials\Newsletter;

use App\Models\Newsletter as NewsletterModel;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        NewsletterModel::create([
            'email' => $this->email,
        ]);

        $this->reset('email');

        session()->flash('success', 'You have successfully subscribed to our newsletter.');
    }

    public function render()
    {
        return view('livewire.partials.newsletter.newsletter');
    }
}
