<?php

namespace App\Http\Livewire\Admin\Comment;

use App\Models\Forum\ForumComment;
use Livewire\Component;

class Show extends Component
{
    public $confirmingDeletion;
    public $comment;
    public $editingComment;
    public $replyingComment;
    public $reply;

    protected $rules = [
        'comment.body' => 'required|string|min:4',
        'reply' => 'required|string|min:4',
    ];

    public function mount($commentId){
        $this->comment = ForumComment::with('forum')->findOrFail($commentId);
    }

    public function destroy(){
        $this->comment->delete();
        $this->confirmingDeletion = false;
        $this->emitUp('back');
    }

    public function postReply(){
        $this->validate();

        ForumComment::create([
            'user_id' => auth()->user()->id,
            'forum_id' => $this->comment->forum_id,
            'parent_id' => $this->comment->parent_id,
            'body' => $this->reply,
         ]);

        $this->reply ='';

        $this->replyingComment = false;
    }

    public function update(){
        $this->validate();
        $this->comment->update();
        $this->editingComment = false;
    }

    public function render()
    {
        return view('livewire.admin.comment.show');
    }
}
