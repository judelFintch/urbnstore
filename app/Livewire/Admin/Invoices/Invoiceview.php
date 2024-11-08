<?php

namespace App\Livewire\Admin\Invoices;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Invoiceview extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.Invoices.invoiceview');
    }
}
