<?php

namespace App\Livewire\Admin\Stock;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Stock extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.stock.stock');
    }
}
