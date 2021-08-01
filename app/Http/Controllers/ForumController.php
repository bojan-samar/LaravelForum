<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum\Forum;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;

class ForumController extends Controller
{
    public function show($slug){
        $forum = Forum::where('slug', $slug)->with('comments', 'favorite')->firstOrFail();
        return view('forum.show', compact('forum'));
    }


    public function user($uuid){
        $user = User::where('uuid', $uuid)->with('forums')->firstOrFail();
        return view('forum.user', compact('user'));
    }

}
