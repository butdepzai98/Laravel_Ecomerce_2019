<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Yêu cầu nhập Email',
            'email.email' => 'Email sai định dạng',
            'phone.required' => 'Yêu cầu nhập số điện thoại',
            'address.required' => 'Yêu cầu nhập địa chỉ Nhận hàng',
        ];
    }
}
