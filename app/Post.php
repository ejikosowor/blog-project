<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'excerpt', 'slug', 'IsPublished', 'user_id', 'category_id', 'status_id'
    ];

    //Get the author of the post
    public function author(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //Get the post category
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //Get the post tags
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    //Get the post status
    public function status(){
        return $this->belongsTo('App\PostStatus');
    }

    /**
     * Get the route key for the model
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}