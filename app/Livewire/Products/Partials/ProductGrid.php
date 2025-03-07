<?php

namespace App\Livewire\Products\Partials;

use App\Models\CategoryArticles;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductGrid extends Component
{
    use WithPagination;

    public $products;

    //this code is temporary until
    public $specificProductCategory ='4';

    public $categories;

    public $selectedCategory = 'all';

    public $category = 'all';

    public $priceRange = 'all';

    public $color = 'all';

    public $product;

    public $showModal = false;

    public $isHomePage;

    public $articPerPage = 8;

    public function mount($isHomePage)
    {
        $this->products = Product::with('category')->get();
        $this->categories = CategoryArticles::take(5)->get();
        // this active the title for the homepage product is true
        $this->isHomePage = $isHomePage;

    }

    public function showProduct($productId)
    {

        $this->product = Product::find($productId);
        $this->dispatch('open-modal');
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
    }

    public function render()
    {

        $filteredProducts = $this->selectedCategory === 'all'
            ? $this->products
            : array_filter($this->products, fn ($product) => $product['category'] === $this->selectedCategory);

            $specificProducts = Product::where('category_id', $this->specificProductCategory)->get();

        return view('livewire.products.partials.product-grid', ['filteredProducts' => $filteredProducts, 'specificProducts' => $specificProducts]);

    }
}
