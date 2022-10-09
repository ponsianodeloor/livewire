<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $txt_search;

    public function render()
    {
        //$posts = Post::all();
        //$posts = Post::where('title', 'like', '%'.$this->txt_search.'%')->get();
        $posts = Post::where('title', 'like', '%'.$this->txt_search.'%')
            ->orWhere('content', 'like', '%'.$this->txt_search.'%')
            ->get();
        return view('livewire.show-posts', compact('posts'));
    }
}
