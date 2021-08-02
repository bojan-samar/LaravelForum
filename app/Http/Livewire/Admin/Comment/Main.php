<?php

namespace App\Http\Livewire\Admin\Comment;

use App\Models\Forum\ForumComment;
use Livewire\Component;

class Main extends Component
{
    public $step = 'index';
    public $commentSelected;

    protected $listeners = ['back', 'selectComment'];

    public function selectComment($comment_id){
        $this->commentSelected = $comment_id;
        $this->step = 'show';
    }

    public function back(){
        $this->step = 'index';
    }

    public function render()
    {
        return view('livewire.admin.comment.main');
    }
}
