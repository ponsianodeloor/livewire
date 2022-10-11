<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $open = false;
    public $title, $content;

    public $rules = [
        'title'=>'required',
        'content'=>'required'
    ];

    public function render()
    {
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
