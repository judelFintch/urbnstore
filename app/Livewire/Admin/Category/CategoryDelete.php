<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryArticles;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CategoryDelete extends Component
{
    public $categoryId; // ID de la catégorie à supprimer

    public $categoryName; // Nom de la catégorie pour confirmation visuelle

    public $isDeleting = false; // Indicateur de chargement

    public function mount($id)
    {
        $category = CategoryArticles::findOrFail($id);
        $this->categoryId = $category->id;
        $this->categoryName = $category->name; // Charger le nom pour affichage
    }

    public function delete()
    {
        $this->isDeleting = true; // Début du processus de suppression

        $category = CategoryArticles::findOrFail($this->categoryId);
        $category->delete();

        $this->isDeleting = false; // Fin du processus
        session()->flash('success', 'Category deleted successfully.');

        return redirect()->route('categories.list'); // Redirection après suppression
    }

    public function render()
    {
        return view('livewire.admin.category.category-delete');
    }
}
