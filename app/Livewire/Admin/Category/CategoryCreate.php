<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\CategoryArticles;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class CategoryCreate extends Component
{
    public $name;
    public $slug;
    public $description;
    public $is_active = false;
    public $slugEditable = false; // Permet de gérer l'état du champ slug

    public function updatedName($value)
    {
        // Générer automatiquement le slug si l'édition manuelle est désactivée
        if (!$this->slugEditable) {
            $this->slug = Str::slug($value);
        }
    }

    public function toggleSlugEditable()
    {
        // Permet de basculer l'édition du slug
        $this->slugEditable = !$this->slugEditable;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:category_articles,slug',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        CategoryArticles::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        session()->flash('success', 'Category created successfully.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->is_active = false;
        $this->slugEditable = false;
    }


    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
