<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]

class ProductDelete extends Component
{
    public $productId;
    public $product;

    // Récupérer les données du produit à supprimer lors du montage du composant
    public function mount($id)
    {
        $this->product = Product::with('details')->findOrFail($id);
        $this->productId = $id;
    }

    // Fonction de suppression
    public function delete()
    {
        // Supprimer les images associées au produit
        if ($this->product->details && $this->product->details->image_url) {
            $images = json_decode($this->product->details->image_url, true);
            foreach ($images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image); // Supprimer chaque image du stockage
                }
            }
        }

        // Supprimer les détails du produit
        if ($this->product->details) {
            $this->product->details()->delete();
        }

        // Supprimer le produit
        $this->product->delete();

        session()->flash('message', 'Produit supprimé avec succès.');

        // Rediriger vers la liste des produits
        return redirect()->route('admin.products.view');
    }

    public function render()
    {
        return view('livewire.admin.product.product-delete');
    }
}
