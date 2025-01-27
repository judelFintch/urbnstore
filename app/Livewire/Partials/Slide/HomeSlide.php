<?php

namespace App\Livewire\Partials\Slide;

use App\Models\Slider;
use Livewire\Component;

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
