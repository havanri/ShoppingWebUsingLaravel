<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255|min:10',
            'price' => 'required',
            'content'=>'required|min:10',
            //'feature_image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'a name is required',
            'price.required' => 'A price is required',
            //'feature_image.required'=>'A image path is required',
            //'feature_image.mimes'=>'must jpg,png,jpeg',
            'content.required'=>'A content path is required',
        ];
    }
}
