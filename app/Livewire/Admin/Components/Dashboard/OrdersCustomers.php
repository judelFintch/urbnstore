<?php
namespace App\Livewire\Admin\Components\Dashboard;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;

class OrdersCustomers extends Component
{
    public int $totalOrders = 0;
    public int $totalCustomers = 0;

    public function render()
    {
        $this->totalOrders = Order::count();
        $this->totalCustomers = User::where('role', 'customer')->count(); 

       

        return view('livewire.admin.components.dashboard.orders-customers');
    }
}
