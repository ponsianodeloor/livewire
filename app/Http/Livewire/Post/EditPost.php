<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class EditPost extends Component
{
    public $open_modal = false;

    public function render()
    {
        return view('livewire.post.edit-post');
    }
}
