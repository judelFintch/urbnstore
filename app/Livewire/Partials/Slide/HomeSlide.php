<?php

namespace App\Livewire\Partials\Slide;

use Livewire\Component;
use App\Models\Slider;

class HomeSlide extends Component
{


    public $sliders;


    public function mount()
    {

        $this->sliders = Slider::all();


    }
    public function render()
    {
        return view('livewire.partials.slide.home-slide');
    }
}
