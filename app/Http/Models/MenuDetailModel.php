<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MenuDetailModel extends Model
{
    protected $table = 'menudetail';
    public function menutype(){
        return $this->belongsTo('App\Http\Models\MenuTypeModel', 'type_id');
    }
}
