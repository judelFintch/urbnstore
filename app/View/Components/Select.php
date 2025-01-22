<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    public string $label;

    public string $id;

    public string $wireModel;

    public array $options; // On stocke les options comme tableau

    public string $optionLabel;

    public string $optionValue;

    public string $placeholder;

    public string $error;

    /**
     * Constructeur du composant Select.
     *
     * @param  string  $label  Le label du champ select.
     * @param  string  $id  L'identifiant HTML du champ select.
     * @param  string  $wireModel  Le modèle Livewire associé.
     * @param  iterable|array|Collection  $options  Les options à afficher (tableau ou collection).
     * @param  string  $optionLabel  La clé pour afficher le texte de l'option.
     * @param  string  $optionValue  La clé pour les valeurs des options.
     * @param  string  $placeholder  Option par défaut (vide).
     * @param  string  $error  Message d'erreur à afficher.
     */
    public function __construct(
        string $label,
        string $id,
        string $wireModel,
        $options,
        string $optionLabel,
        string $optionValue,
        string $placeholder = '',
        string $error = ''
    ) {
        $this->label = $label;
        $this->id = $id;
        $this->wireModel = $wireModel;
        $this->options = $options instanceof Collection ? $options->toArray() : (array) $options;
        $this->optionLabel = $optionLabel;
        $this->optionValue = $optionValue;
        $this->placeholder = $placeholder;
        $this->error = $error;
    }

    /**
     * Retourne la vue du composant.
     */
    public function render()
    {
        return view('components.select');
    }
}
