<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'cate_name' => 'required|string|unique:categories',
        ];
    }

    public function messages()
    {
        return [
          'cate_name.required' => trans('messages.cate'),
          'cate_name.unique' => trans('messages.catetontai'),
        ];
    }
}
