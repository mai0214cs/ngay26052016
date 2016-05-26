<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MenuRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'type_id'=>'in:1,2,3,4,5,6,7',
            'order'=>'integer',
            'target'=>'in:Y,N',
            'status'=>'in:Y,N'
        ];
    }
}
