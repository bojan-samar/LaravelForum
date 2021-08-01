<?php

namespace App\Http\Livewire\Forum;

use Livewire\Component;
use App\Models\Forum\ForumSave;

class Saved extends Component
{
    public $saves;


    public function mount(){
        $saves = ForumSave::where('user_id', auth()->user()->id)->latest()->with('forum','user')->get();
        $this->saves = $saves->toArray();
    }


    public function save($index){
        $save = $this->saves[$index];

        if ($save['saved']) {
            ForumSave::destroy($save['id']);
            $this->saves[$index]['saved'] = false;
        }else{
            ForumSave::create([
                'user_id' => auth()->user()->id,
                'forum_id' => $save['forum_id'],
            ]);
            $this->saves[$index]['saved'] = true;
        }
    }



    public function render()
    {
        return view('livewire.forum.saved');
    }
}
