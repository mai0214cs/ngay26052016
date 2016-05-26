<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategoryModul extends Model
{
    protected $table = 'newscategory';
    public function news(){
        return $this->hasMany('\App\Http\Models\NewsListModul', 'category_id');
    }
}
