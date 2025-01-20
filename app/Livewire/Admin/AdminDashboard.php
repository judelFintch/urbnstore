<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\ProductService;

class AdminDashboard extends Component
{


    public $products;
    public const PAGINATE_NUMBER = 5;
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }


    public function mount(ProductService $productService)
    {

        $this->products = $productService->getPaginateProduct(5);

    }
}
