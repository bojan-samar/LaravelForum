<?php

namespace App\Http\Livewire\Forum;

use App\Models\Forum\Forum;
use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $search = '';

    public function render()
    {
        $user = User::find(1);
        // dd($user);
        $forums = Forum::where('title', 'like', '%'. $this->search .'%')
        ->orWhere('body', 'like', '%'. $this->search .'%')
        ->latest()
        ->with('user','comments')
        ->get();
        return view('livewire.forum.index', compact('forums'));
    }
}
