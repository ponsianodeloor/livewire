<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public $txt_search;
    public $column = 'id';
    public $orderBy = "ASC";
    public $cantRegistros = '10';

    //protected $listeners = ['render'=>'render']; // se puede usar esta opcion
    protected $listeners = ['render'];

    public function updatingTxtSearch(){
        $this->resetPage();
    }

    /**
     * esta funcion devuelve las propiedads en la url cuando cambian de valor
    protected $queryString = [
        'cantRegistros' => ['except'=>'10'],
        'column' => ['except'=>'id', 'title'],
        'orderBy' => ['except'=>'ASC'],
        'txt_search' => ['execpt'=>''],
    ];
    */

    public function render()
    {
        //$posts = Post::all();
        //$posts = Post::where('title', 'like', '%'.$this->txt_search.'%')->get();
        /*
        $posts = Post::where('title', 'like', '%'.$this->txt_search.'%')
            ->orWhere('content', 'like', '%'.$this->txt_search.'%')
            ->orderBy($this->column, $this->orderBy)
            ->get();
        */
        $posts = Post::where('title', 'like', '%'.$this->txt_search.'%')
            ->orWhere('content', 'like', '%'.$this->txt_search.'%')
            ->orderBy($this->column, $this->orderBy)
            ->paginate($this->cantRegistros);

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
