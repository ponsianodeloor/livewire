<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $txt_search;
    public $column = 'id';
    public $orderBy = "ASC";

    //protected $listeners = ['render'=>'render'];
    protected $listeners = ['render'];

    public function render()
    {
        //$posts = Post::all();
        //$posts = Post::where('title', 'like', '%'.$this->txt_search.'%')->get();
        $posts = Post::where('title', 'like', '%'.$this->txt_search.'%')
            ->orWhere('content', 'like', '%'.$this->txt_search.'%')
            ->orderBy($this->column, $this->orderBy)
            ->get();
        return view('livewire.show-posts', compact('posts'));
    }

    public function order($column){
        if ($this->column == $column){
            if ($this->orderBy == "ASC"){
                $this->orderBy = "DESC";
            }else{
                $this->orderBy = "ASC";
            }
        }else{
            $this->column = $column;
            $this->orderBy = "ASC";
        }
    }
}
