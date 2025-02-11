<?php

namespace App\Livewire\Guest\Contact;

use App\Models\ContactMessage;
use Livewire\Attributes\Layout; // Modèle pour insérer les messages
use Livewire\Component;

class Contact extends Component
{
    public $email;

    public $msg;

    #[Layout('layouts.guest')]
    public function render()
    {
        $contact = config('contact');

        return view('livewire.guest.contact.contact', compact('contact'));
    }

    public function submit()
    {
        // Validation des données
        $this->validate([
            'email' => 'required|email',
            'msg' => 'required|min:5',
        ]);

        // Insertion dans la base de données
        ContactMessage::create([
            'email' => $this->email,
            'message' => $this->msg,
        ]);

        // Réinitialisation des champs et message de confirmation
        $this->reset(['email', 'msg']);
        session()->flash('success', 'Your message has been sent successfully.');
    }
}
