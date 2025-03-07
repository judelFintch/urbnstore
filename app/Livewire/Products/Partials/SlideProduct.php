<?php

namespace App\Livewire\Products\Partials;

use App\Models\CategoryArticles;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SlideProduct extends Component
{
    use WithPagination;

    // this code is temporary until
    public $specificProductCategory = '4';

    public $categories;

    public function mount()
    {
        $this->categories = CategoryArticles::take(5)->get();
        // this active the title for the homepage product is true
    }

    public function render()
    {
        $filteredProducts = Product::where('category_id', '!=', $this->specificProductCategory)
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.products.partials.slide-product', ['filteredProducts' => $filteredProducts]);
    }
}
