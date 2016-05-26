<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsListResquest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'txtName'=>'required|unique:newscategory,name',
            'txtOrder'=>'integer',
            'rdoStatus'=>'in:Y,N',
            'rdonew'=>'in:Y,N',
            'rdohot'=>'in:Y,N',
            'rdofeature'=>'in:Y,N'
        ];
    }
}
