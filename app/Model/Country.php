<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    public function comments(){
        return $this->hasManyThrough('App\Comment', 'App\User');
    }
}
