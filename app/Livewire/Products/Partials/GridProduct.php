<?php

namespace App\Livewire\Products\Partials;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class GridProduct extends Component
{
    use WithPagination;

    public $specificProductCategory = '4';

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = ['page'];

    // Pour indiquer à la vue que le chargement est en cours
    public $isLoading = false;

    // Livewire détecte auto page, on peut hook sur "updatingPage"
    public function updatingPage()
    {
        $this->isLoading = true;
    }

    public function updatedPage()
    {
        $this->isLoading = false;
        $this->dispatch('scrollToProducts');
    }

    public function render()
    {
        $specificProducts = Product::where('category_id', $this->specificProductCategory)
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('livewire.products.partials.grid-product', compact('specificProducts'));
    }
}
