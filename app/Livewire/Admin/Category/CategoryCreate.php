<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryArticles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class CategoryCreate extends Component
{
    use WithFileUploads;

    public $name;

    public $slug;

    public $description;

    public $is_active = false;

    public $is_featured = true; // Champ pour catégorie phare

    public $photo; // Champ pour l'upload de photo

    public $slugEditable = false;

    public function updatedName($value)
    {
        // Générer automatiquement le slug si l'édition manuelle est désactivée
        if (! $this->slugEditable) {
            $this->slug = Str::slug($value);
        }
    }

    public function toggleSlugEditable()
    {
        // Permet de basculer l'édition du slug
        $this->slugEditable = ! $this->slugEditable;
    }

    public function save()
    {
        // Validation des champs
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:category_articles,slug',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'photo' => 'nullable|image|max:2048', // Validation pour les images (max 2MB)
        ]);

        // Gestion de l'upload de la photo
        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('category_photos', 'public'); // Stocker dans storage/app/public/category_photos
        }

        // Création de la catégorie
        CategoryArticles::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'photo' => $photoPath, // Stocker le chemin de la photo
        ]);

        // Message de succès et réinitialisation du formulaire
        session()->flash('success', 'La catégorie a été créée avec succès.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->is_active = false;
        $this->is_featured = false;
        $this->photo = null;
        $this->slugEditable = false;
    }

    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
