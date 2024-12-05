<?php

namespace App\Livewire\Admin\Promotion;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Promotion extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.promotion.promotion');
    }
}
