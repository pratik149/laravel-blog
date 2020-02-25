<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'c_body',
    ];


    /**
     * Get the blog that owns the comment.
     */
    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
