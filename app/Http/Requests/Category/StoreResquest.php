<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreResquest extends FormRequest
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
            'name' => 'required|unique:category_models',
            'img' => 'required'
        ];
    }
//    public function messages()
//    {
//        [
//            'name.unique' => 'Danh mục đã tồn tại',
//            'name.required' => 'Vui lòng không để rỗng'
//        ];
//    }
}
