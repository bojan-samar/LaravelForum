<?php

namespace App\Http\Livewire\Forum;

use App\Models\Forum\Forum;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $state = [
        'title' => '',
        'body' => ''
    ];

    protected $validationAttributes = [
        'state.title' => 'title',
        'state.body' => 'body',
    ];


    public function store(){
        $this->validate([
            'state.title' => 'required|string|max:191',
            'state.body' => 'required|string'
        ]);

        Forum::create([
           'user_id' => auth()->user()->id,
           'title' => $this->state['title'],
           'slug' => Str::slug($this->state['title']). '-' .Str::random(5),
           'body' => $this->state['body']
        ]);

        $this->emit('alertSuccess','Successfully submitted');
        $this->emitUp('back');
    }

    public function render()
    {
        return view('livewire.forum.create');
    }
}
