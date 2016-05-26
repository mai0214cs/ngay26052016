<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model
{
    protected $table = 'productcate';
    public function productlist(){
        return $this->hasMany('App\Model\ProductList','productcate_id');
    }
}
