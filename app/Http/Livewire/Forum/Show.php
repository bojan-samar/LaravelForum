<?php

namespace App\Http\Livewire\Forum;

use App\Models\Forum\ForumSave;
use Livewire\Component;

class Show extends Component
{
    public $forum;
    public $confirmingDeletion = false;

    public function favorite(){
        if ($this->forum->favorite){
            $this->forum->favorite->delete();
            $this->forum->favorite = null;
        }else{
            ForumSave::create([
                'forum_id' => $this->forum['id'],
                'user_id' => auth()->user()->id,
            ]);
            $this->forum->favorite = true;
        }
    }


    public function destroy(){
        $this->forum->delete();
        $this->confirmingDeletion = false;
        session()->flash('success', 'Post successfully deleted');
        return redirect('forum');
    }

    public function render()
    {
        return view('livewire.forum.show', [
            'forum' => $this->forum
        ]);
    }
}
