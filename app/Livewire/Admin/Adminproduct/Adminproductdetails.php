<?php

namespace App\Livewire\Admin\Adminproduct;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;

class Adminproductdetails extends Component
{


    #[Layout('layouts.app')]

    public $product;

    public function mount($id){
      
        // Fetch product details based on ID here.
            $this->product = Product::with('details','category')->findOrFail($id);

    }
    public function render()
    {
        return view('livewire.admin.adminproduct.adminproductdetails');
    }


}
