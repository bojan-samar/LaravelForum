<?php

namespace App\Http\Livewire\Admin\Forum;

use Livewire\Component;
use App\Models\Forum\Forum;

class Index extends Component
{
    public $search = '';
    public $confirmingDeletion = false;
    
    public function render()
    {
        $forums = Forum::where('title', 'like', '%'. $this->search .'%')
        ->orWhere('body', 'like', '%'. $this->search .'%')
        ->latest()
        ->get();

        return view('livewire.admin.forum.index', compact('forums'));
    }
}
