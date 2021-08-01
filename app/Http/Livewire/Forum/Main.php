<?php

namespace App\Http\Livewire\Forum;

use Livewire\Component;

class Main extends Component
{
    public $step = 'index';

    protected $listeners = ['back'];

    public function back(){
        $this->step = 'index';
    }

    public function render()
    {
        return view('livewire.forum.main');
    }
}
