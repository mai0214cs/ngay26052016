<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ProductListModel extends Model
{
    protected $table = 'productlist';
    public function categogy(){
        return $this->belongsTo('App\Http\Models\ProductCategoryModel', 'category_id');
    }
}
