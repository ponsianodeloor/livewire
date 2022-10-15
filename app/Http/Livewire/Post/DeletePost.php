<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class DeletePost extends Component
{

    public $open_modal = false;
    public $postDelete;

    protected $listeners = [
        'delete'
    ];

    public function rule(){

    }

    public function mount(Post $post){
        $this->postDelete = $post;
    }

    public function render()
    {
        return view('livewire.post.delete-post');
    }

    public function eliminarPost(){
        //$this->validate();

        $this->postDelete->delete();
        $this->reset(['open_modal']);
        $this->emitTo('show-posts', 'render');
        $this->emit('alert', 'Post', 'Actualizado correctamente', 'success');
    }
}
