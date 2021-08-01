<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;


class Comments extends Component
{

    public $model;
    public $newCommentState =[
        'body' => ''
    ];

    protected $validationAttributes = [
        'newCommentState.body' => 'comment'
    ];

    protected $listeners = ['refresh' => '$refresh'];


    public function postComment()
    {
        $this->validate([
            'newCommentState.body' => 'required|string'
        ]);

        $comment = $this->model->comments()->make($this->newCommentState);
        $comment->user()->associate(auth()->user());
        $comment->save();

        $this->newCommentState = [
            'body' => ''
        ];

        $this->emit('alertSuccess','Comment submitted');
    }

    public function render()
    {
        $comments = $this->model->comments()->parent()->latest()->with('user','children.user')->get();
        return view('livewire.comment.comments', compact('comments'));
    }
}
