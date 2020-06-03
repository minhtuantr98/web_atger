<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'cate_name'=>'required|unique:tbl_categories,cate_name,'.$this->segment(4).',cate_id'
            //'icon'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'cate_name.required'=>'Trường này không được để trống',
            'cate_name.unique'=>'Tên danh mục đã tồn tại',
        ];
    }
}
