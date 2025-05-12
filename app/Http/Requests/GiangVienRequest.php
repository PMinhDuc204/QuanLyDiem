<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiangVienRequest extends FormRequest
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
            'TenGV' => 'required|string|max:50',
            'SDT' => 'required|string|max:15',
            'Bangcap' => 'nullable|string|max:30',
        ];
    }
    public function messages()
    {
        return [
            'TenGV.required' => 'Tên giảng viên không được để trống.',
            'TenGV.string' => 'Tên giảng viên phải là chuỗi ký tự.',
            'TenGV.max' => 'Tên giảng viên tối đa 50 ký tự.',

            'SDT.required' => 'Số điện thoại không được để trống.',
            'SDT.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'SDT.max' => 'Số điện thoại tối đa 15 ký tự.',

            'Bangcap.string' => 'Bằng cấp phải là chuỗi ký tự.',
            'Bangcap.max' => 'Bằng cấp tối đa 30 ký tự.',
        ];
    }
}
