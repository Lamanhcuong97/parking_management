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
            'user_name' => 'required|min:3|max:50',
            'password' => 'required|confirmed|min:3',
            'terms' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Vui lòng điền tên đăng nhập',
            'user_name.min' => 'Tên đăng chứa ít nhất 3 kí tự',
            'user_name.max' => 'Tên đăng chứa tối đa 50 kí tự',
            'password.required'  => 'Vui lòng điền mật khẩu ',
            'password.min'  => 'Mật khẩu chứa ít nhất 3 kí tự',
            'password.confirmed'  => 'Mật khẩu không khớp',
            'terms.required' => 'Chọn đồng ý để tiếp tục',
        ];
    }
}
