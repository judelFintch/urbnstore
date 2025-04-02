<?php

namespace App\Livewire\Guest\Partials\Header;

use App\Models\CategoryArticles;
use Livewire\Component;
use App\Models\Product;

class Header extends Component
{
    public $categoryArticles;

    public $defaultCategoryArticles;

    public $defaultUrl;
    public $products;

    // Définir directement les constantes ici
    const DEFAULT_CATEGORY = 'all_categories';

    const DEFAULT_URL_PRODUCT = 'all_products';

    const IS_TYPE = true;

    public function mount($providedDefaultCategory = null)
    {
        $this->categoryArticles = CategoryArticles::select('id', 'name', 'slug')
            ->where('is_active', self::IS_TYPE)
            ->take(5)
            ->get();



        $this->defaultCategoryArticles = $providedDefaultCategory ?: self::DEFAULT_CATEGORY;
        $this->defaultUrl = self::DEFAULT_URL_PRODUCT;
    }

    public function render()
    {

        $products = Product::with(['details', 'productPicture'])->take(5)->get();
        return view('livewire.guest.partials.header.header', compact('products'));
    }
}

