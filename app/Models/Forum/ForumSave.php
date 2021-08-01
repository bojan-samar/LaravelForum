<?php

namespace App\Models\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumSave extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [
        'saved'
    ];

    public function getSavedAttribute()
    {
         return true;
    }

    public function forum(){
        return $this->belongsTo(Forum::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
