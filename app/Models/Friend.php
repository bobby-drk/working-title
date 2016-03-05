<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'simple_friends';

        /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

}
