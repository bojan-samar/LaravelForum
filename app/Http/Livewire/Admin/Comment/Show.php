<?php

namespace App\Http\Livewire\Admin\Comment;

use App\Models\Forum\ForumComment;
use Livewire\Component;

class Show extends Component
{
    public $confirmingDeletion;
    public $comment;
    public $editingComment;

    protected $rules = [
        'comment.body' => 'required|string|min:4',
    ];

    public function mount($commentId){
        $this->comment = ForumComment::with('forum')->findOrFail($commentId);
    }

    public function destroy(){
        $this->comment->delete();
        $this->confirmingDeletion = false;
        $this->emitUp('back');
    }

    public function update(){
        $this->comment->update();
        $this->editingComment = false;
    }

    public function render()
    {
        return view('livewire.admin.comment.show');
    }
}
