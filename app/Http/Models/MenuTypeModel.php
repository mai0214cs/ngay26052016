<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MenuTypeModel extends Model
{
    protected $table = 'menutype';
    public function menudetail(){
        return $this->hasMany('App\Http\Models\MenuDetailModel', 'type_id');
    }
}
