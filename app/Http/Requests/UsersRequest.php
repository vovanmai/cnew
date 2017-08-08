<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          return [
            'username'=>'required',
            'password'=>'required|min:6|max:32',
            'fullname'=>'required'
        ];
    }

      public function messages(){
        return [
            'username.required' => 'vui lòng nhập username',
            
            'password.required'  => 'Vui lòng nhập password',
            'password.min'  => 'Vui lòng nhập password ít nhất 6 ký tự',
            'password.max'  => 'Vui lòng nhập password không quá 32 ký tự',
            'fullname.required'  => 'Vui lòng nhập fullname',
    ];
}
}
