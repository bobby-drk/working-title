<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProvider extends Model
{

    protected $fillable = ['provider_id', 'user_id', 'provider_key'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function provider()
    {
        return $this->belongsToMany('App\Model\Provider');
    }

}
