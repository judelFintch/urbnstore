<?php

namespace App\Livewire\Guest\Partials\Header;

use Livewire\Component;
use App\Models\{
    CategoryArticles,
};

class Header extends Component
{

    public $categoryArticles;
  
    public function mount(){
        // Fetch all categories from the database and assign it to the component's property.
        // This will be used in the component's view to display the categories in the header./
        // Note: This assumes you have a CategoryArticles model in your application.
        // Replace 'CategoryArticles' with your actual model name.
        // this temporarily code changes the sect by name to 'CategoryArticles
        $this->categoryArticles = CategoryArticles::all();
    }
    public function render()
    {

        return view('livewire.guest.partials.header.header');
    }
}
