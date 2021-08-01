<?php

namespace App\Models\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function favorite(){
        if (auth()->guest()){
            $userId = null;
        }else{
            $userId = auth()->user()->id;
        }

        return $this->hasOne(ForumSave::class)->where('user_id', $userId);
    }

    public function canEdit(){
        if (auth()->guest()) {
            return false;
        }

        if (auth()->user()->hasRole('superadmin')) {
            return true;
        }


        if ($this->user_id == auth()->user()->id) {
            return true;
        }

        return false;
    }

    public function comments(){

        return $this->hasMany(ForumComment::class);
    }
}
