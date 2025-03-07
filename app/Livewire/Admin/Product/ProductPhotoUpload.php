<?php

namespace App\Livewire\Admin\Product;

use App\Models\Picture;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ProductPhotoUpload extends Component
{
    use WithFileUploads;
    public $product_id;
    public $photos = [];

    public function mount($id){
        $this->product_id = $id;
        
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

        session()->flash('message', 'Photos ajoutées avec succès.');
    }
    public function render()
    {
        return view('livewire.admin.product.product-photo-upload', [
            'pictures' => Picture::where('product_id', $this->product_id)->get(),
        ]);
    }
}
