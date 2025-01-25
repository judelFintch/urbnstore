<?php

namespace App\Livewire\Products\Partials;

use App\Models\CategoryArticles;
use Livewire\Component;

class SecBanner extends Component
{
    public $banners;

    public function mount()
    {
        $this->banners = CategoryArticles::where('is_featured', true)
                                         ->orderBy('id', 'desc')
                                         ->take(3)
                                         ->get();

    }

    public function render()
    {
        return view('livewire.products.partials.sec-banner');
    }
}
