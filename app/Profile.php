<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sex', 'profile_pic', 'website', 'about_me', 'user_id'
    ];

    //User, profile belongs to
    public function user(){
        return $this->belongsTo('App\User');
    }
}