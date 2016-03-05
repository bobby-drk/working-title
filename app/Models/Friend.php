<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    /**
     * Table Name
     */
    protected $table = 'simple_friends';

    /**
     * a Friend has many users
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

}
