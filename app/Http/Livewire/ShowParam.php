<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowParam extends Component
{
    public $title, $contenido;

    public function mount($content){
        $this->contenido = $content;
    }

    public function render()
    {
        return view('livewire.show-param');
    }
}
