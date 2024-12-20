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
    public $defaultCategoryArticles ;
    public $defaultUrl;
  
    public function mount($getDefaultCategoryArticles = null){
        
        $this->categoryArticles = CategoryArticles::select("id","name","slug")->get();
        $this->defaultCategoryArticles = $getDefaultCategoryArticles ?: Helpers::getDefaultCategory();
        $this->defaultUrl = Helpers::getDefaultUrlProduct();
    }
    public function render()
    {
   
        return view('livewire.guest.partials.header.header');
    }
}
