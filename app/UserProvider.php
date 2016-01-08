<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProvider extends Model
{
    protected $primaryKey = 'provider_id';

    protected $fillable = ['provider_id', 'user_id', 'provider'];

    public function user()
    {
        //I might need more parameters here.
        return $this->belongsTo('App\User');
    }
}
