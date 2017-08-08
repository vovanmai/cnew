<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name'=>'required',
            'preview_text'=>'required',
            'detail_text'=>'required',
        ];
    }

     public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên tin!',
            'preview_text.required'  => 'Vui lòng nhập mô tả!',
            'detail_text.required'  => 'Vui lòng nhập chi tiêt!',
            
    ];
}
}
