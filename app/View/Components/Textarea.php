<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public string $label;
    public string $id;
    public string $wireModel;
    public string $placeholder;
    public string $error;

    public function __construct(
        string $label,
        string $id,
        string $wireModel,
        string $placeholder = '',
        string $error = ''
    ) {
        $this->label = $label;
        $this->id = $id;
        $this->wireModel = $wireModel;
        $this->placeholder = $placeholder;
        $this->error = $error;
    }

    public function render()
    {
        return view('components.textarea');
    }
}
