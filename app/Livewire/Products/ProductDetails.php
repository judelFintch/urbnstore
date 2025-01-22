<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;

    public $selectedSize;

    #[Layout('layouts.guest')]
    public function mount($id)
    {
        if (! ctype_digit($id)) {
            abort(404);
        }

        $this->product = Product::with('details')->findOrFail($id);
        $this->selectedSize = null;
    }

    public function updatedSelectedSize($value)
    {

        $this->selectedSize = $value;
    }

    public function addToCart()
    {
        // Récupérer le panier depuis la session ou en créer un nouveau
        $cart = session()->get('cart', []);

        // Ajouter le produit au panier
        $cart[$this->product->id] = [
            'name' => $this->product->name,
            'price' => $this->product->price,
            'quantity' => ($cart[$this->product->id]['quantity'] ?? 0) + 1,
        ];

        // Mettre à jour le panier dans la session
        session()->put('cart', $cart);

        // Émettre un événement pour mettre à jour le composant Panier
        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.products.product-details');
    }

    public function show($id, $category, $slug)
    {
        $product = Product::with(['details', 'reviews', 'category.relatedProducts'])
            ->findOrFail($id);

        // Rest of the code...
        return $product;
    }
}
