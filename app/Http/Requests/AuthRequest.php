<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',

        ];

    }
    public function messages(): array
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.string' => 'Tên đăng nhập phải là chuỗi',
            'username.max' => 'Tên đăng nhập không được vượt quá 255 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.string' => 'Mật khẩu phải là chuỗi',
        ];
    }
}
