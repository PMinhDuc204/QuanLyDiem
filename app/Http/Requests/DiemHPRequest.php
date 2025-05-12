<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiemHPRequest extends FormRequest
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
        'MaSV' => 'required|integer',
        'MaMH' => 'required|integer',
        'HocKy' => 'required|integer|min:1|max:2',
        'NamHoc' => 'required|string',
        'MaGV' => 'required|integer',
        'Diem' => 'required|numeric|min:0|max:10'
        ];
    }
    public function messages()
    {
        return [
            'MaSV.required' => 'Vui lòng chọn sinh viên.',
            'MaMH.required' => 'Vui lòng chọn môn học.',
            'MaGV.required' => 'Vui lòng chọn giảng viên.',
            'Diem.required' => 'Vui lòng nhập điểm.',
            'Diem.numeric' => 'Điểm phải là số.',
            'Diem.min' => 'Điểm phải từ 0 đến 10.',
            'Diem.max' => 'Điểm phải từ 0 đến 10.',
            'Xeploai.required' => 'Vui lòng chọn xếp loại.',
            'KetQua.in' => 'Xếp loại không hợp lệ.',
        ];
    }
}

