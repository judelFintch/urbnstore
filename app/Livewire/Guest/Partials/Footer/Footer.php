<?php

namespace App\Livewire\Guest\Partials\Footer;

use Livewire\Component;
use App\Models\CategoryArticles;

class Footer extends Component
{

    public $categories;

    public function mount(){

        $this->categories = CategoryArticles::all();

    }
    public function render()
    {
        return view('livewire.guest.partials.footer.footer');
    }
}
