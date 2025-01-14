<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;

#[Layout('layouts.app')]

class ProductListCard extends Component
{
    public function render()
    {

        $products = Product::all();
        return view('livewire.admin.product.product-list-card', compact('products'));
    }
}
