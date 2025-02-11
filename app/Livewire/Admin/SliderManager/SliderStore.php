<?php

namespace App\Livewire\Admin\SliderManager;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class SliderStore extends Component
{
    use WithFileUploads, WithPagination;

    public $sliders;

    public $sliderId = null;

    public $name;

    public $caption;

    public $image;

    public $link;

    public $isEditing = false;

    public $sliderIdToDelete = null;

    public $sliderToDelete = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'caption' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:1024', // Limitation de 1 Mo pour l'image
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
        $this->reset(['name', 'caption', 'image', 'link', 'isEditing', 'sliderId']);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        $this->sliderId = $slider->id;
        $this->name = $slider->name;
        $this->caption = $slider->caption;
        $this->link = $slider->link;
        $this->image = null; // Réinitialiser pour ne pas charger une image par défaut
        $this->isEditing = true;
    }

    public function save()
    {
        try {
            $this->validate();

            $slider = $this->isEditing ? Slider::findOrFail($this->sliderId) : new Slider;

            $slider->name = $this->name;
            $slider->caption = $this->caption;
            $slider->link = $this->link;

            // Gestion de l'image
            if ($this->image) {
                if ($this->isEditing && $slider->image) {
                    // Supprimer l'image existante si elle est remplacée
                    Storage::disk('public')->delete($slider->image);
                }
                // Stocker la nouvelle image
                $slider->image = $this->image->store('sliders', 'public');
            }

            $slider->save();

            $this->loadSliders();
            $this->reset(['name', 'caption', 'image', 'link', 'isEditing', 'sliderId']);

            session()->flash('success', 'Le slider a été '.($this->isEditing ? 'modifié' : 'créé').' avec succès.');
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur s\'est produite lors de l\'enregistrement du slider.');
        }
    }

    public function confirmDelete($id)
    {
        $this->sliderIdToDelete = $id;
        $this->sliderToDelete = Slider::find($id);
    }

    public function delete()
    {
        $slider = Slider::findOrFail($this->sliderIdToDelete);

        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        $this->sliderIdToDelete = null;
        $this->sliderToDelete = null;

        session()->flash('success', 'Slider supprimé avec succès.');
    }

    public function cancelDelete()
    {
        $this->sliderIdToDelete = null;
        $this->sliderToDelete = null;
    }

    public function render()
    {
        return view('livewire.admin.slider-manager.slider-store', [
            'slidersPaginated' => Slider::paginate(10),
        ]);
    }
}
