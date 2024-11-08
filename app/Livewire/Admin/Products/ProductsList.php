<?php

namespace App\Livewire\Admin\Products;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ProductsList extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.products.products-list');
    }
}
