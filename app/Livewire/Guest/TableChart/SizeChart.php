<?php

namespace App\Livewire\Guest\TableChart;

use Livewire\Attributes\Layout;
use Livewire\Component; // Modèle pour insérer les messages

class SizeChart extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.guest.table-chart.size-chart');
    }
}
