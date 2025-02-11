<?php

namespace App\Livewire\Admin\Product;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class ProductDetail extends Component
{
    public function render()
    {
        return view('livewire.admin.product.product-detail');
    }
}
