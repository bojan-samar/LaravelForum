<?php

namespace App\Models;

use App\Models\Forum\Forum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url', 'alias'
    ];

    protected $roles = [
        'superadmin',
        'admin',
        'editor',
        'subscriber'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($user){
            $user->uuid = Str::uuid();
            $user->role = 'subscriber';
        });

    }


    protected function defaultProfilePhotoUrl()
    {
        return asset("/assets/avatar.svg");
    }


    public function hasRole($role){
        //CHECK IF ROLE REQUESTED EXISTS
        if (! in_array($role, $this->roles)){
            return false;
        }

        //CHECK IF USER ROLE EXISTS
        $userRoleExists = array_search($this->role, $this->roles);


        if ($userRoleExists === false){
            return false;
        }

        $userAvailableRoles = array_slice($this->roles, $userRoleExists);
        $userHasRole = in_array($role, $userAvailableRoles);

        return $userHasRole;
    }

    public function forums(){

        return $this->hasMany(Forum::class)->latest();
    }

    public function getAliasAttribute()
    {
        $name = explode(' ', $this->name);
        $alias = $name[0];
        if(!empty($name[1])){
            $alias = $alias . " " . substr($name[1],0,1) .'.';
        }
        return Str::title($alias);
    }


}
