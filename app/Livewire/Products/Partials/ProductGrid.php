<?php

namespace App\Livewire\Products\Partials;

use App\Models\CategoryArticles;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductGrid extends Component
{
    use WithPagination;

    public $categories;

    public $product;

    public $isHomePage;

    public function mount($isHomePage)
    {
        $this->categories = CategoryArticles::take(5)->get();
        // this active the title for the homepage product is true
        $this->isHomePage = $isHomePage;
    }

    public function render()
    {
        return view('livewire.products.partials.product-grid');
    }
}
