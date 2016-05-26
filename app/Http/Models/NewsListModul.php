<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class NewsListModul extends Model
{
    protected $table = 'newslist';
    public function category(){
        return $this->belongsTo('\App\Http\Models\NewsCategoryModul', 'category_id');
    }
}
