<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductList extends Component
{
    public function render()
    {
        $products = Product::with('details', 'category')->paginate(10);

        return view('livewire.admin.product.product-list', compact('products'));
    }
}

