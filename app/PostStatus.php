<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostStatus extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'post_statuses';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    //Get posts under a status
    public function posts(){
        return $this->hasMany('App\Post');
    }
}