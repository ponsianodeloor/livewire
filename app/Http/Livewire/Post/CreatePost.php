<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $open = false;
    public $title, $content;

    protected $rules = [
        'title'=>'required|max:10',
        'content'=>'required|min:10'
    ];

    protected $messages = [
        'title.required' => 'El titulo no puede ser vacio.',
        'title.max:10' => 'El tamanio debe considerarse.',
    ];

    /**
     * @param $propertyName se usa para validar las reglas establecidas en los inputs
     * solo se aplican si wire:model.defer="title" no esta activo y solo se encuentra wire:model="title"
     * @return void
     */
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        /**
         * if(count($this->getErrorBag()->all()) > 0){
            $this->emit('alert', 'Post', 'Datos vacios', 'error');
        }**/
        return view('livewire.post.create-post');
    }

    public function guardarPost(){

        $this->validate();

        Post::create([
            'title'=>$this->title,
            'content'=>$this->content
        ]);

        $this->reset(['open', 'title', 'content']);

        //$this->emit('render_show_posts');
        $this->emitTo('show-posts','render');
        $this->emit('alert', 'Post', 'Guardado correctamente', 'success');
    }
}
