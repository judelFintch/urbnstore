<?php

namespace App\Livewire\Products\Partials;

use App\Models\CategoryArticles;
use Livewire\Component;

class SecBanner extends Component
{
    public $banners;

    public function mount()
    {
        $this->banners = CategoryArticles::where('is_featured', true)->take(3);

    }

    public function render()
    {
        return view('livewire.products.partials.sec-banner');
    }
}
