<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LOPRequest extends FormRequest
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
            'TenLop' => 'required|string|max:255'
        ];
    }
    public function messages(): array
    {
        return [
            'TenLop.required' => 'Tên lớp không được để trống!',
            'TenLop.string'   => 'Tên lớp phải là chuỗi!',
            'TenLop.max'      => 'Tên lớp tối đa 255 ký tự!',
        ];
    }
}
