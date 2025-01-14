<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileUpload extends Component
{
    public string $label;
    public string $id;
    public string $wireModel;
    public bool $multiple;
    public string $error;

    public function __construct(
        string $label,
        string $id,
        string $wireModel,
        bool $multiple = false,
        string $error = ''
    ) {
        $this->label = $label;
        $this->id = $id;
        $this->wireModel = $wireModel;
        $this->multiple = $multiple;
        $this->error = $error;
    }

    public function render()
    {
        return view('components.file-upload');
    }
}
