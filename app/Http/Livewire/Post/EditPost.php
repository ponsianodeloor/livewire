<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $open_modal = false;
    public $post;

    protected $rules =[
        'post.title'=>'required',
        'post.content'=>'required'
    ];

    public function mount(Post $post){
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post.edit-post');
    }

    public function actualizarPost(){

        $this->validate();

        $this->post->save();

        $this->reset(['open_modal']);

        $this->emitTo('show-posts','render');
        $this->emit('alert', 'Post', 'Actualizado correctamente', 'success');

    }
}
