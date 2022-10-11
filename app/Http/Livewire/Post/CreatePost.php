<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = false;
    public $title, $content, $url_image;
    public $id_url_image;

    protected $rules = [
        'title'=>'required|max:10',
        'content'=>'required|min:10',
        'url_image'=>'required|image|max:2048'
    ];

    protected $messages = [
        'title.required' => 'El titulo no puede ser vacio.',
        'title.max:10' => 'El tamanio debe considerarse.',
    ];

    public function mount(){
        $this->id_url_image = rand();
    }

    /**
     * @param $propertyName se usa para validar las reglas establecidas en los inputs
     * solo se aplican si wire:model.defer="title" no esta activo y solo se encuentra wire:model="title"
     * @return void
     */
    /*
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }*/

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

        $url_image = $this->url_image->store('public/images/posts');

        Post::create([
            'title'=>$this->title,
            'content'=>$this->content,
            'url_image'=>Storage::url($url_image)
        ]);

        $this->reset(['open', 'title', 'content', 'url_image']);
        $this->id_url_image = rand();

        //$this->emit('render_show_posts');
        $this->emitTo('show-posts','render');
        $this->emit('alert', 'Post', 'Guardado correctamente', 'success');
    }
}
