<?php

namespace App\Livewire\Admin\Stock;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Stock extends Component
{

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.stock.stock');
    }
}
