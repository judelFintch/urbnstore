<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public string $label;

    public string $id;

    public string $type;

    public string $wireModel;

    public string $value;

    public string $step;

    /**
     * Créez une instance du composant Input.
     */
    public function __construct(
        string $label = '',
        string $id = '',
        string $type = 'text',
        string $wireModel = '',
        string $value = '',
        string $step = ''
    ) {
        $this->label = $label;
        $this->id = $id;
        $this->type = $type;
        $this->wireModel = $wireModel;
        $this->value = $value;
        $this->step = $step;
    }

    /**
     * Retourne la vue du composant.
     */
    public function render()
    {
        return view('components.input');
    }
}
