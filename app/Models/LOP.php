<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LOP extends Model
{
    //
    protected $table = 'lops'; // Tên bảng trong CSDL
    protected $primaryKey = 'MaLop'; // Khóa chính
    public $incrementing = true; // Tắt tự động tăng ID
    public $timestamps = false; // Nếu không có cột `created_at` và `updated_at`
    protected $fillable = ['TenLop'];


    // Một lớp có nhiều sinh viên
    public function sinhVien()
    {
        return $this->hasMany(SVien::class, 'MaLop', 'MaLop');
    }
}
