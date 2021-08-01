<?php

namespace App\Http\Livewire\Comment;


use App\Models\Forum\ForumComment;
use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $confirmingDeletion = false;

    public $isReplying = false;
    public $replyState =[
        'body' => ''
    ];

    public $isEditing = false;
    public $editState =[
        'body' => ''
    ];

    protected $validationAttributes = [
        'replyState.body' => 'reply',
        'editState.body' => 'edit',
    ];

    public function updatedIsEditing(){
        $this->editState['body'] = $this->comment->body;
    }


    public function postReply(){
        $this->validate([
            'replyState.body' => 'required|string'
        ]);

        ForumComment::create([
           'user_id' => auth()->user()->id,
           'forum_id' => $this->comment->forum_id,
           'parent_id' => $this->comment->id,
           'body' => $this->replyState['body'],
        ]);

        $this->replyState =[
            'body' => ''
        ];

        $this->isReplying = false;

        $this->emit('alertSuccess','Reply Submitted');
        $this->emitUp('refresh');
    }

    public function postEdit(){
        $this->validate([
            'editState.body' => 'required'
        ]);

        $this->comment->update([
           'body' => $this->editState['body']
        ]);


        $this->editState =[
            'body' => ''
        ];

        $this->isEditing = false;

        $this->emit('alertSuccess','Comment Updated');
        $this->emitUp('refresh');
    }


    public function destroy(){
        $this->comment->delete();
        $this->confirmingDeletion = false;
        $this->emit('alertSuccess','Comment Deleted');
        $this->emitUp('refresh');
    }

    public function render()
    {
        return view('livewire.comment.comment');
    }

}
