<?php

namespace App\Livewire\Guest\Partials\Post;

use App\Models\Reviews;
use Livewire\Component;

class Review extends Component
{
    public $name;

    public $email;

    public $rating;

    public $content;

    public $productId;

    public $reviews;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'rating' => 'integer|min:1|max:5',
        'content' => 'required|string|max:1000',
    ];

    public function mount($productId)
    {
        $this->reviews = Reviews::where('product_id', $this->productId)->get();
    }

    public function submit()
    {
        $this->validate();

        $test = Reviews::create([
            'name' => $this->name,
            'email' => $this->email,
            'rating' => $this->rating,
            'content' => $this->content,
            'product_id' => $this->productId,
        ]);

        // Reset form fields
        $this->reset(['name', 'email', 'rating', 'content']);

        // Emit event to refresh review list
        $this->emit('reviewAdded');
    }

    public function render()
    {
        return view('livewire.guest.partials.post.review');
    }
}
