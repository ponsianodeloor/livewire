<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{
    use WithFileUploads;

    public $open_modal = false;
    public $post;
    public $id_url_image, $url_image;

    protected $rules =[
        'post.title'=>'required',
        'post.content'=>'required'
    ];

    public function mount(Post $post){
        $this->post = $post;
        $this->id_url_image = rand();
    }

    public function render()
    {
        return view('livewire.post.edit-post');
    }

    public function actualizarPost(){

        $this->validate();

        if($this->url_image){
            $url_image = str_replace('/storage/', '/public/',  $this->post->url_image);
            Storage::disk('local')->delete([$url_image]);

            $url_image = $this->url_image->store('public/images/posts');
            $this->post->url_image = Storage::url($url_image);
        }

        $this->post->save();

        $this->reset(['open_modal']);
        $this->id_url_image = rand();

        $this->emitTo('show-posts','render');
        $this->emit('alert', 'Post', 'Actualizado correctamente', 'success');

    }
}
