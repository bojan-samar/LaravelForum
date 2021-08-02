<?php

namespace App\Http\Livewire\Admin\Comment;

use App\Models\Forum\ForumComment;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $confirmingDeletion = false;

    public function render()
    {
        $comments = ForumComment::where('body', 'like', '%'. $this->search .'%')
            ->latest()
            ->get();
        return view('livewire.admin.comment.index', compact('comments'));
    }
}
