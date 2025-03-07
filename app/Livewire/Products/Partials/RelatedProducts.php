<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;

class RelatedProducts extends Component
{
    public $products;

    public function mount($categoyProductSelectId,$activeProduct)
    {

       
        $this->products = Product::where('category_id', $categoyProductSelectId)
            ->inRandomOrder()
            ->where('id', '!=', $activeProduct)
            ->take(10)
            ->get();

    }

    public function render()
    {
        return view('livewire.products.partials.related-products');
    }
}
