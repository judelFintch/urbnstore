<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryArticles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class CategoryEdit extends Component
{
    use WithFileUploads;

    public $categoryId;

    public $name;

    public $slug;

    public $description;

    public $is_active;

    public $is_featured;

    public $photo; // Gestion des uploads de fichiers

    public $slugEditable = false; // Contrôle de l'édition manuelle du slug

    public function mount($id)
    {
        $category = CategoryArticles::findOrFail($id);

        // Initialisation des propriétés à partir de la catégorie existante
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
        $this->is_active = $category->is_active;
        $this->is_featured = $category->is_featured;
    }

    public function updatedName($value)
    {
        // Générer automatiquement le slug si l'édition manuelle est désactivée
        if (! $this->slugEditable) {
            $this->slug = Str::slug($value);
        }
    }

    public function toggleSlugEditable()
    {
        // Basculer l'état d'édition manuelle du slug
        $this->slugEditable = ! $this->slugEditable;
    }

    public function update()
    {
        // Validation des champs
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:category_articles,slug,'.$this->categoryId,
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'photo' => 'nullable|image|max:2048', // Validation pour les images (max 2MB)
        ]);

        $category = CategoryArticles::findOrFail($this->categoryId);

        // Gestion de l'upload de la nouvelle photo
        $photoPath = $category->photo; // Conserver la photo existante par défaut
        if ($this->photo) {
            // Supprimer l'ancienne photo si une nouvelle est téléchargée
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }

            // Enregistrer la nouvelle photo
            $photoPath = $this->photo->store('category_photos', 'public');
        }

        // Mise à jour de la catégorie
        $category->update([
            'name' => $this->name,
            'slug' => $this->slug ?: Str::slug($this->name),
            'description' => $this->description,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'photo' => $photoPath,
        ]);

        // Message de succès et redirection
        session()->flash('success', 'La catégorie a été mise à jour avec succès.');

        return redirect()->route('categories.list');
    }

    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}
