<?php

namespace App\Livewire\Guest\Shop;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\CategoryArticles;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest', ['title' => 'Boutique'])]
class Shop extends Component
{
    use WithPagination;

    public $categories;
    public $selectedCategory = null; // ID de la catégorie sélectionnée
    public $priceRange = 1000; // Filtre par prix
    public $search = ''; // Recherche par titre

    protected $queryString = [
        'selectedCategory' => ['except' => null],
        'priceRange' => ['except' => 1000],
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->categories = CategoryArticles::all(); // Récupère toutes les catégories
    }

    public function selectCategory($categoryId)
    {
        // Mise à jour de la catégorie sélectionnée
        $this->selectedCategory = $categoryId;
        $this->resetPage(); // Réinitialise la pagination
    }

    public function updating($field)
    {
        // Réinitialise la pagination lors de la mise à jour d'un filtre
        if (in_array($field, ['selectedCategory', 'priceRange', 'search'])) {
            $this->resetPage();
        }
    }

    public function resetFilters()
    {
        $this->selectedCategory = null;
        $this->priceRange = 1000;
        $this->search = '';
        $this->resetPage(); // Réinitialise la pagination
    }

    public function render()
    {

        $productsQuery = Product::with('category', 'details')
            ->when($this->selectedCategory, function ($query) {
                return $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->where('price', '<=', $this->priceRange);

        $products = $productsQuery->paginate(12);

        // Suggestions basées sur la catégorie ou par défaut
        $suggestedProducts = $this->selectedCategory
            ? Product::where('category_id', $this->selectedCategory)
                ->inRandomOrder()
                ->take(6)
                ->get()
            : Product::inRandomOrder()->take(6)->get();

        // Produits récemment consultés (stockés en session)
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
        if (!in_array($productId, $recentlyViewed)) {
            $recentlyViewed[] = $productId;
            session()->put('recently_viewed', $recentlyViewed);
        }
    }
}