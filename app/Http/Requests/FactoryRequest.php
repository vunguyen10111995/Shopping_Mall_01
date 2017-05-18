<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactoryRequest extends FormRequest
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
            'factory_name' => 'required|string|unique:factories',
            'logo' => 'required',
            'website' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'factory_name.required' => trans('messages.tencty'),
           'factory_name.unique' => trans('messages.tenctytontai'),
           'logo.required' => trans('messages.logo'),
           'website.required' => trans('messages.web'),
        ];
    }
}
