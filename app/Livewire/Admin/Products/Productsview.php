<?php

namespace App\Livewire\Admin\Products;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Productsview extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.products.productsview');
    }
}
