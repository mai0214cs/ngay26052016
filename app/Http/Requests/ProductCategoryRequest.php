<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductCategoryRequest extends Request
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
            'rdoStatus'=>'in:Y,N'
        ];
    }
}
