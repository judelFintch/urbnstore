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
        $this->categories = CategoryArticles::take(5)->get();
    }

    public function updating($field)
    {
        // Réinitialise la pagination lors de la mise à jour d'un filtre
        if (in_array($field, ['selectedCategory', 'priceRange', 'search'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $productsQuery = Product::with('category')
            ->when($this->selectedCategory, function ($query) {
                return $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->where('price', '<=', $this->priceRange);

        $products = $productsQuery->paginate(12); // Limite de 12 produits par page

        return view('livewire.guest.shop.shop', [
            'products' => $products,
            'categories' => $this->categories,
        ]);
    }
}
