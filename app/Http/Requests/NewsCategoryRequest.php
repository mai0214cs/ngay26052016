<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
