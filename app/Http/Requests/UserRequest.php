<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
           'Name' => 'required|unique:users|max:255',
           'txtfullname' => 'required',
           'txtpassword' => 'required|string|min:6',
           'txtcomfirm' => 'required|same:txtpassword',
           'txtphone' => 'required|max:11|alpha_num',
           'txtaddress' => 'required',
           'sex' => 'required',
           'txtemail' => 'required|email|string',
           'level' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
          'Name.required' => trans('messages.username'),
          'Name.unique' => '*Username đã tồn tại!',
          'txtfullname.required' => '*Vui Lòng Nhập Họ Và Tên',
          'txtpassword.required' => '*Vui Lòng Nhập Pass!',
          'sex.required' => '*Vui lòng chọn giới tính!',
          'txtpassword.min' => '*Pass phải nhiều hơn 6 ký tự!',
          'txtcomfirm.required' => '*Xin Mời nhập Comfirm Pass!',
          'txtcomfirm.same' => '*Mật khẩu phải trùng nhau!',
          'txtphone.required' => '*Xin mời nhập số điện thoại!',
          'txtphone.max' => '*Số điện thoại quá 11 số!',
          'txtphone.alpha_num' => '*Số điện thoại phải là kiểu số!',
          'txtemail.required'  => '*Xin mời nhập email!',
          'txtemail.email' => '*Email Không Chính Xác!',
          'txtaddress.required' => '*Xin mời bạn nhập địa chỉ!',
          'level.required' => '*Xin mời bạn chọn level!',
        ];
    }
}
