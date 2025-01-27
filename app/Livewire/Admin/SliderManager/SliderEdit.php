<?php

namespace App\Livewire\Admin\SliderManager;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Slider;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class SliderEdit extends Component
{
    public function render()
    {
        return view('livewire.admin.slider-manager.slider-edit');
    }
}
