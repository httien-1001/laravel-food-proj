<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'addres' => 'required',
            'phone' => 'required|min:9'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống',
            'email.required' => 'Vui lòng không để trống',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'addres.required' => 'Vui lòng không để trống',
            'phone.required' => 'Vui lòng không để trống'
        ];
    }
}
