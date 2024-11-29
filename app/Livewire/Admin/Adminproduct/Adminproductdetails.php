<?php

namespace App\Livewire\Admin\Adminproduct;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;

class Adminproductdetails extends Component
{


    #[Layout('layouts.app')]

    public $product;

    public function mount($id): void
    {

        // Fetch product details based on ID here.
            $this->product = Product::with('details','category')->findOrFail($id);

    }
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('livewire.admin.adminproduct.adminproductdetails');
    }


}
