<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowParamUrl extends Component
{
    public $parametro_url;
    public function mount($param_url){
        $this->parametro_url = $param_url;
    }
    public function render()
    {
        return view('livewire.show-param-url')
            ->layout('layouts.template_liveware');
    }
}
