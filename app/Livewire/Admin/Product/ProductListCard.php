<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class ProductListCard extends Component
{
    public function render()
    {

        $products = Product::all();

        return view('livewire.admin.product.product-list-card', compact('products'));
    }
}
