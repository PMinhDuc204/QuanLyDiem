<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SVienRequest extends FormRequest
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
           'TenSV' => 'required|string|max:255',
           'Phai' => 'required|string|in:Nam,Nữ',
           'SDT' => 'nullable|string|max:15',
           'MaLop' => 'required|exists:lops,MaLop',
        ];
    }
    public function messages()
    {
        return [
            'TenSV.required' => 'Tên sinh viên là bắt buộc.',
            'TenSV.max' => 'Tên sinh viên không được vượt quá 50 ký tự.',
            'Phai.in' => 'Giới tính phải là Nam hoặc Nữ.',
            'SDT.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            'MaLop.required' => 'Mã lớp là bắt buộc.',
            'MaLop.exists' => 'Mã lớp không tồn tại.',
        ];
    }
}
