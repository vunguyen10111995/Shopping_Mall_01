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

             'product_name' => 'required',
             'price' => 'required',
             'product_image' => 'required',
             'catparent' => 'required',
             'color' => 'required',
             'size' => 'required',
             'factory' => 'required',
        ];
    }
    public function messages()
    {
        return [
          'product_name.required' => 'Please fill product name',
          'price.required' => 'Please fill price',
          'product_image.required' => 'Please select product image',
          'catparent.required' => 'Please select cat parent',
          'color.required' => 'Please check color',
          'size.required' => 'Please check size',
          'factory.required' => 'Please select factory',
          ];
    }
}
