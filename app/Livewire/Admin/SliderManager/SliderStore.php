<?php

namespace App\Livewire\Admin\SliderManager;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slider; // Modèle Slider (à créer)
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]

class SliderStore extends Component
{
    use WithFileUploads;


    public $sliders;
    public $sliderId;
    public $name, $caption, $image, $link;

    public $isEditing = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'caption' => 'nullable|string|max:255',
        'image' => 'nullable|image', // 1MB max pour l'image
        'link' => 'nullable',
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
        try {
            $this->validate();

            $slider = $this->isEditing ? Slider::findOrFail($this->sliderId) : new Slider();

            $slider->name = $this->name;
            $slider->caption = $this->caption;
            $slider->link = $this->link;

            if ($this->image) {
                if ($this->isEditing && $slider->image) {
                    try {
                        Storage::delete($slider->image);
                    } catch (\Exception $e) {
                        // Gérer l'exception
                    }
                }
                $slider->image = $this->image->store('sliders', 'public');
            }

            $slider->save();

            $this->loadSliders();
            $this->reset(['name', 'caption', 'image', 'link', 'isEditing', 'sliderId']);

            session()->flash('success', 'Le slider a été ' . ($this->isEditing ? 'modifié' : 'créé') . 'avec succès.');
        } catch (\Exception $e) {
            // Gérer l'exception
        }
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
        return view('livewire.admin.slider-manager.slider-store');
    }
}
