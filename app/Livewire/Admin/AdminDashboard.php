<?php

namespace App\Livewire\Admin;

use App\Services\ProductService;
use Livewire\Attributes\Layout;
use Livewire\Component;

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
        $this->products = $productService->getPaginateProduct(self::PAGINATE_NUMBER);
    }
}
