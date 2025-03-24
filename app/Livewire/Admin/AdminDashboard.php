<?php

namespace App\Livewire\Admin;

use App\Services\ProductService;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $products;

    public const PAGINATE_NUMBER = 5;
    public $lastOrders;


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
    public function mount(ProductService $productService)
    {
        $this->products = $productService->getPaginateProduct(self::PAGINATE_NUMBER);
        $this->lastOrders = Order::with('details')->latest()->take(5)->get(); // Récupère les 5 dernières commandes

    }
}
