<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'IsActive', 'IsVerified', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    //Get the user profile
    public function profile(){
        return $this->hasOne('App\Profile');
    }

    //Role user belongs to
    public function role(){
        return $this->belongsTo('App\Role');
    }

    //Users' posts
    public function posts(){
        return $this->hasMany('App\Post');
    }
}