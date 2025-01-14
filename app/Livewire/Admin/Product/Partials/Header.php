<?php

namespace App\Livewire\Admin\Product\Partials;

use Livewire\Component;

class Header extends Component
{
    public $content;
    public $isCreated = true;
    public $isUpdated = false;
    public $isList = false;

    const UPDATE_TYPE = 'update';
    const CREATE_TYPE = 'create';
    const LIST_TYPE = 'list';

    public function mount($content)
    {
        $this->content = $content;

        // Configuration des drapeaux en fonction du contenu
        if ($content === self::UPDATE_TYPE) {
            $this->isUpdated = true;
            $this->isList = true;
            $this->isCreated = true;
        } elseif ($content === self::CREATE_TYPE) {
            $this->isCreated = true;
            $this->isList = false;
        } elseif ($content === self::LIST_TYPE) {
            $this->isList = true;
            $this->isCreated = true;
        }
    }

    public function render()
    {
        return view('livewire.admin.product.partials.header');
    }
}
