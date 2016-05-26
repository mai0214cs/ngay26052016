<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    protected $table = 'productcategory';
    public function category(){
        return $this->hasMany('App\Http\Models\ProductListModel', 'category_id');
    }
}
