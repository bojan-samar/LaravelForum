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
        'profile_photo_url',
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


}
