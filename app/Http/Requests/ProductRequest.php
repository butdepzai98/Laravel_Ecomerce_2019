<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'txtName' => 'required',
            'txtQuantity' => 'required|min:1',
            'txtPrice' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => 'Yêu cầu nhập tên sản phẩm',
            'txtQuantity.required' => 'Yêu cầu nhập số lượng sản phẩm',
            'txtPrice.required' => 'Yêu cầu nhập giá sản phẩm',
        ];
    }
}
