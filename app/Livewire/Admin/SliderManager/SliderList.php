<?php

namespace App\Livewire\Admin\SliderManager;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout; // Modèle Slider (à créer)
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]

class SliderList extends Component
{
    use WithFileUploads;

    public $sliders;

    public $sliderId;

    public $name;

    public $caption;

    public $image;

    public $link;

    public $isEditing = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'caption' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:1024', // 1MB max pour l'image
        'link' => 'nullable|url',
    ];

    public function mount()
    {
        $this->loadSliders();
    }

    public function loadSliders()
    {
        $this->sliders = Slider::all();
    }

    public function create()
    {
        $this->reset(['name', 'caption', 'image', 'link']);
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        $this->sliderId = $slider->id;
        $this->name = $slider->name;
        $this->caption = $slider->caption;
        $this->link = $slider->link;
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        $slider = $this->isEditing ? Slider::findOrFail($this->sliderId) : new Slider;

        $slider->name = $this->name;
        $slider->caption = $this->caption;
        $slider->link = $this->link;

        if ($this->image) {
            if ($this->isEditing && $slider->image) {
                Storage::delete($slider->image);
            }
            $slider->image = $this->image->store('sliders');
        }

        $slider->save();

        $this->loadSliders();
        $this->reset(['name', 'caption', 'image', 'link', 'isEditing', 'sliderId']);

        session()->flash('success', 'Le slider a été '.($this->isEditing ? 'modifié' : 'créé').' avec succès.');
    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->image) {
            Storage::delete($slider->image);
        }

        $slider->delete();

        $this->loadSliders();

        session()->flash('success', 'Le slider a été supprimé avec succès.');
    }

    public function render()
    {
        return view('livewire.admin.slider-manager.slider-list');
    }
}
