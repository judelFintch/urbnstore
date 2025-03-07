<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;

class GridProduct extends Component
{
    public $specificProductCategory = '4';

    public function render()
    {
        $specificProducts = Product::where('category_id', $this->specificProductCategory)
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.products.partials.grid-product', compact('specificProducts'));
    }
}
