<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $table = 'productlist';
    public function productcate(){
        return $this->belongsTo('App\Model\ProductCate','productcate_id');
    }
    public function productimage(){
        return $this->hasMany('App\Model\ProductImage', 'productlist_id');
    }
    public function useradmin(){
        return $this->belongsTo('App\Model\UserAdmin','useradmin_id');
    }
}
