<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
           'color_name' => 'required|string|unique:colors',
        ];
    }

    public function messages()
    {
        return [
          'color_name.required' => trans('messages.color'),
          'color_name.unique' => trans('messages.colorexist'),
          'color_name.string' => trans('messages.numbercolor')
        ];
    }
}
