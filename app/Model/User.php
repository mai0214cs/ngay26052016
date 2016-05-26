<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function phone(){
        return $this->hasOne('App\Phone');
    }
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
