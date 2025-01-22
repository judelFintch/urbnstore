<?php

namespace App\Livewire\Admin\Promotion;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Promotion extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.promotion.promotion');
    }
}
