<?php

namespace App\View\Components\Forum;

use Illuminate\View\Component;
use App\Models\User;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;
    public $post;
    public $limitBody;
    public $linked;

    public function __construct(User $user, $post, $limitBody = false, $linked = true)
    {
        $this->user = $user;
        $this->post = $post;
        $this->limitBody = $limitBody;
        $this->linked = $linked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forum.post');
    }
}
