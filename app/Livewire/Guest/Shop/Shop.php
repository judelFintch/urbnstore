<?php
// app/Livewire/Guest/Shop/Shop.php

namespace App\Livewire\Guest\Shop;

use App\Models\CategoryArticles;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.guest', ['title' => 'Boutique'])]
class Shop extends Component
{
    use WithPagination;

    public $categories;

    public $selectedCategory = null;
    public $search = '';

    public $minPrice = 0;
    public $maxPrice = 500;

    public $filterMin = 0;
    public $filterMax = 500;

    protected $queryString = [
        'selectedCategory' => ['except' => null],
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->categories = CategoryArticles::all();
    }

    public function applyFilters()
    {
        $this->minPrice = $this->filterMin;
        $this->maxPrice = $this->filterMax;
        $this->resetPage();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->selectedCategory = null;
        $this->search = '';
        $this->filterMin = 0;
        $this->filterMax = 1000;
        $this->applyFilters();
    }

    public function render()
    {
        $productsQuery = Product::with('category', 'details')
            ->when($this->selectedCategory, fn($q) => $q->where('category_id', $this->selectedCategory))
            ->when($this->search, fn($q) => $q->where('title', 'like', '%'.$this->search.'%'))
            ->whereBetween('price', [$this->minPrice, $this->maxPrice]);

        $products = $productsQuery->paginate(12);

        $suggestedProducts = $this->selectedCategory
            ? Product::where('category_id', $this->selectedCategory)->inRandomOrder()->take(6)->get()
            : Product::inRandomOrder()->take(6)->get();

        $recentlyViewedProductIds = session()->get('recently_viewed', []);
        $recentlyViewedProducts = Product::whereIn('id', $recentlyViewedProductIds)->take(6)->get();

        return view('livewire.guest.shop.shop', [
            'products' => $products,
            'categories' => $this->categories,
            'suggestedProducts' => $suggestedProducts,
            'recentlyViewedProducts' => $recentlyViewedProducts,
        ]);
    }

    public function trackProduct($productId)
    {
        $recentlyViewed = session()->get('recently_viewed', []);
        if (! in_array($productId, $recentlyViewed)) {
            $recentlyViewed[] = $productId;
            session()->put('recently_viewed', $recentlyViewed);
        }
    }
}
