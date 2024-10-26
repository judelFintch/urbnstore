<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;

class ProductDetails extends Component
{
   public $product;
   public $selectedSize;
   #[Layout('layouts.guest')]
    public function mount($id){
        $this->product = Product::with('details')->findOrFail($id);
        $this->selectedSize = null;
    }
    public function updatedSelectedSize($value)
    {
        
        $this->selectedSize = $value;
    }
    public function render()
    {
        return view('livewire.products.product-details');
    }
}
