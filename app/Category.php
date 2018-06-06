<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
        'name', 'slug', 'description', 'parent_id'
    ];

    //Posts under a category
    public function posts(){
        return $this->hasMany('App\Post');
    }

    /**
     * Get Sub Categories.
     */
    public function subCategories(){
        return $this->hasMany('App\Category', 'parent_id');
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