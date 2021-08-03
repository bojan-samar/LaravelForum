<?php

namespace App\Http\Livewire\Admin\Forum;

use Livewire\Component;
use App\Models\Forum\Forum;

class Show extends Component
{
    public $forum;
    public $editingForum;
    public $replyingForum;
    public $reply;
    public $confirmingDeletion;
    

    protected $rules = [
        'forum.title' => 'required|string|min:4',
        'forum.body' => 'required|string|min:4',
    ];

    public function mount($forumId){
        $this->forum = Forum::with('user','comments')->findOrFail($forumId);
    }

    public function update(){
        $this->validate();
        $this->forum->update();
        $this->editingForum = false;
    }

    public function destroy(){
        $this->forum->delete();
        $this->confirmingDeletion = false;
        $this->emitUp('back');
    }


    public function render()
    {
        return view('livewire.admin.forum.show');
    }
}
