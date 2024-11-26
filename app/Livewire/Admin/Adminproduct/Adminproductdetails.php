<?php

namespace App\Livewire\Admin\Adminproduct;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Adminproductdetails extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.adminproduct.adminproductdetails');
    }
}
