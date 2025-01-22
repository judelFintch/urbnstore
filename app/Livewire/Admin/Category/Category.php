<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryArticles;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Category extends Component
{
    use WithPagination; // Active la pagination dans Livewire

    protected $listeners = ['categoryUpdated' => '$refresh']; // Rafraîchir automatiquement

    public function render()
    {
        // Retourne une vue avec les données paginées
        return view('livewire.admin.category.category', [
            'categories' => CategoryArticles::paginate(10),
        ]);
    }
}
