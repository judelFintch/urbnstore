<?php

namespace App\Livewire\Guest\Partials\Header;

use Livewire\Component;
use App\Helpers\Helpers;

use App\Models\{
    CategoryArticles,
};

class Header extends Component
{
    public $categoryArticles;
    public $defaultCategoryArticles;
    public $defaultUrl;
    const IS_TYPE = true;
    public function mount($getDefaultCategoryArticles = null)
    {
        $this->categoryArticles = CategoryArticles::select("id", "name", "slug")->where('is_active', self::IS_TYPE)->take(5)->get();
        $this->defaultCategoryArticles = $getDefaultCategoryArticles ?: Helpers::getDefaultCategory();
        $this->defaultUrl = Helpers::getDefaultUrlProduct();
    }
    public function render()
    {

        return view('livewire.guest.partials.header.header');
    }
}
