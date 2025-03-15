<?php

namespace App\Livewire\Admin\Product;

use App\Models\Picture;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

/**
 * ProductPhotoUpload Component
 *
 * Ce composant Livewire permet de gérer l'upload et la suppression de photos pour un produit spécifique.
 */
#[Layout('layouts.app')]
class ProductPhotoUpload extends Component
{
    use WithFileUploads;

    public $product_id;
    public $photos = [];
    public $pictures = [];

    public function mount($id)
    {
        $this->product_id = $id;
        $this->updatePicturesList();
    }

    public function updatedPhotos()
    {
        $this->validate([
            'photos.*' => 'image|max:2048', // Limite 2MB par image
        ]);
    }

    public function savePhotos()
    {
        $this->validate([
            'photos.*' => 'image|max:2048',
        ]);

        foreach ($this->photos as $photo) {
            $path = $photo->store('products', 'public');
            Picture::create([
                'product_id' => $this->product_id,
                'image_path' => $path,
            ]);
        }

        // Réinitialiser le champ après l'upload
        $this->photos = [];

        // Rafraîchir la liste des photos
        $this->updatePicturesList();

        session()->flash('message', 'Photos ajoutées avec succès.');
    }

    public function deletePhoto($photoId)
    {
        $photo = Picture::find($photoId);

        if ($photo) {
            // Supprime le fichier du stockage
            if (Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }

            // Supprime l'enregistrement de la base de données
            $photo->delete();

            // Rafraîchir la liste des photos après suppression
            $this->updatePicturesList();

            session()->flash('message', 'Photo supprimée avec succès.');
        }
    }

    public function updatePicturesList()
    {
        $this->pictures = Picture::where('product_id', $this->product_id)->get();
    }

    public function render()
    {
        return view('livewire.admin.product.product-photo-upload', [
            'pictures' => $this->pictures,
        ]);
    }
}
