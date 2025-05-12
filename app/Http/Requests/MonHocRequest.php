<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonHocRequest extends FormRequest
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
            'TenMH' => 'required|string|max:255', // Tên môn học bắt buộc
            'SoTC' => 'required|integer|min:1|max:10', // Số tín chỉ từ 1 - 10
        ];
    }
    public function messages()
    {
        return [
            'TenMH.required' => 'Tên môn học không được để trống.',
            'SoTC.required' => 'Số tín chỉ không được để trống.',
            'SoTC.integer' => 'Số tín chỉ phải là số nguyên.',
            'SoTC.min' => 'Số tín chỉ phải lớn hơn hoặc bằng 1.',
            'SoTC.max' => 'Số tín chỉ không được vượt quá 10.',
        ];
    }
}
