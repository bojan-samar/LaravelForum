<?php

namespace App\Http\Livewire\Admin\Forum;

use Livewire\Component;

class Main extends Component
{
    public $step = 'index';
    public $forumSelected;

    protected $listeners = ['back', 'selectForum'];

    public function selectForum($forum_id){
        $this->forumSelected = $forum_id;
        $this->step = 'show';
    }

    public function back(){
        $this->step = 'index';
    }

    public function render()
    {
        return view('livewire.admin.forum.main');
    }
}
