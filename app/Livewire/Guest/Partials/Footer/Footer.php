<?php

namespace App\Livewire\Guest\Partials\Footer;

use Livewire\Component;
use App\Models\CategoryArticles;

class Footer extends Component
{

    public $categories;

    public function mount(){

        $this->categories = CategoryArticles::select('id', 'name')->where('is_active',true)->get(); 

    }
    public function render()
    {
        return view('livewire.guest.partials.footer.footer');
    }
}
