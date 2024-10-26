<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;

class ProductDetails extends Component
{
   public $product;
   #[Layout('layouts.guest')]
    public function mount($id){
        $this->product = Product::findOrFail($id);

    }
    public function render()
    {
        return view('livewire.products.product-details');
    }
}
