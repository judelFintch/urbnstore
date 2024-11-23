<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryArticles;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;

class Category extends Component
{
    // Champs pour le formulaire
    public $name;
    public $slug;
    public $description;
    public $is_active = false;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.category.category', [
            'categories' => CategoryArticles::paginate(10),
        ]);
    }
  
    // Méthode pour sauvegarder la catégorie
    public function save()
    {
        /*$this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:category_articles,slug',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);*/

        CategoryArticles::create([
            'name' => $this->name,
            'slug' => $this->slug ?: Str::slug($this->name),
            'description' => $this->description,
            'is_active' => 1,
        ]);

        session()->flash('success', 'Category created successfully.');

        $this->resetForm();
    }

    // Réinitialiser le formulaire
    public function resetForm()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->is_active = true;
    }
}
