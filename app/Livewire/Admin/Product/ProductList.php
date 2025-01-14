<?php

namespace App\Livewire\Admin\Product;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CategoryArticles;
use App\Services\ProductService;
use App\Traits\HandlesProductImages;
use App\Models\Product;

#[Layout('layouts.app')]
class ProductList extends Component
{

    
    public function render()
    {
        $products = Product::with('details', 'category')->paginate(10);
        return view('livewire.admin.product.product-list', compact('products'));
    }
}
