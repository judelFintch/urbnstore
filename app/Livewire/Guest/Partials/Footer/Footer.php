<?php

namespace App\Livewire\Guest\Partials\Footer;

use App\Models\CategoryArticles;
use Livewire\Component;

class Footer extends Component
{
    public $categories;

    const CATEGORIES_LIMIT = 5;

    public function mount()
    {
        $this->categories = CategoryArticles::select('id', 'name','slug')
            ->where('is_active', true)
            ->orderBy('id', 'desc')
            ->take(self::CATEGORIES_LIMIT)
            ->get();
    }

    public function render()
    {
        return view('livewire.guest.partials.footer.footer');
    }
}
