<?php

namespace App\Livewire\Partials\Newsletter;

use App\Models\Newsletter as NewsletterModel;
use Livewire\Component;

/**
 * Newsletter Component
 *
 * Ce composant Livewire permet à un utilisateur de s'abonner à la newsletter.
 * Il valide l'adresse email et la stocke dans la base de données en assurant
 * qu'elle est unique.
 *
 * Informations sur l'auteur :
 * Auteur : judel fintch
 * Email : judfintch@gmail.com
 * Date : 2025-03-07
 * Description : Composant pour gérer l'inscription à la newsletter.
 */
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
