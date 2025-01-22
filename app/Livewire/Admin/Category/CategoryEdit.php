<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryArticles;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CategoryEdit extends Component
{
    public $categoryId;

    public $name;

    public $slug;

    public $description;

    public $is_active;

    public function mount($id)
    {
        $category = CategoryArticles::findOrFail($id);

        // Charger les données de la catégorie
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
        $this->is_active = $category->is_active;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:category_articles,slug,'.$this->categoryId,
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $category = CategoryArticles::findOrFail($this->categoryId);

        $category->update([
            'name' => $this->name,
            'slug' => $this->slug ?: Str::slug($this->name),
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        session()->flash('success', 'Category updated successfully.');

        return redirect()->route('categories.list'); // Rediriger après mise à jour
    }

    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}
