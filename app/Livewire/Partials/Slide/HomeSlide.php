<?php

namespace App\Livewire\Partials\Slide;

use App\Models\Slider;
use Livewire\Component;

/**
 * HomeSlide Component
 *
 * Ce composant Livewire récupère et affiche les sliders pour la page d'accueil.
 *
 * Informations sur l'auteur :
 * Auteur : judel fintch
 * Email : judfintch@gmail.com
 * Date : 2025-03-07
 * Description : Composant pour afficher jusqu'à 3 sliders, triés par ordre décroissant d'ID.
 */
class HomeSlide extends Component
{
    public $sliders;

    public function mount()
    {
        $this->sliders = Slider::orderByDesc('id')->take(3)->get();
    }

    public function render()
    {
        return view('livewire.partials.slide.home-slide');
    }
}
