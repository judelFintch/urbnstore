<?php

namespace App\Livewire\Products\Partials;

use Livewire\Component;

class SecBanner extends Component
{


    public $banners = [
        [
            'image' => 'images/banner-01.jpg',
            'name' => 'Femme',
            'info' => 'Collection 2024',
            'link' => '#',
        ],
        [
            'image' => 'images/banner-02.jpg',
            'name' => 'Homme',
            'info' => 'Collection 2024',
            'link' => 'product.html',
        ],
        [
            'image' => 'images/banner-03.jpg',
            'name' => 'Accessoires',
            'info' => 'Collection 2024',
            'link' => 'product.html',
        ],
    ];
    public function render()
    {
        return view('livewire.products.partials.sec-banner');
    }
}
