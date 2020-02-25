<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    /**
     * Get the user that owns the blog.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
