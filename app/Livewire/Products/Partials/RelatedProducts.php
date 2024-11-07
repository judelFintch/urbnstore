<?php

namespace App\Livewire\Products\Partials;

use Livewire\Component;
use App\Models\Product;

class RelatedProducts extends Component
{

    public $products;

    public function mount($categoyProductSelectId)
    {

        $this->products = Product::where('category_id', $categoyProductSelectId)
            ->inRandomOrder()
            ->take(10)
            ->get();


    }
    public function render()
    {
        return view('livewire.products.partials.related-products');
    }
}
