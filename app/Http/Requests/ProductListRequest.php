<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductListRequest extends Request
{
    public function authorize()
    {
        return TRUE;
    }
    public function rules()
    {
        return [
            'txtName'=>'required|unique:newscategory,name',
            'txtOrder'=>'integer',
            'rdoStatus'=>'in:Y,N',
            'rdonew'=>'in:Y,N',
            'rdohot'=>'in:Y,N',
            'rdofeature'=>'in:Y,N',
            'txtPrice'=>'integer|min:0',
            'txtPromotionPrice'=>'integer|min:0',
            'rdovat'=>'in:Y,N',
            'txtQuantity'=>'integer|min:0',
            'txtWarranty'=>'integer|min:0'
        ];
    }
}
