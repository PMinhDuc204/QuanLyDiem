<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemHP extends Model
{
    use HasFactory;

    protected $table = 'diemhp'; // Tên bảng trong CSDL
    public $timestamps = false;
    protected $primaryKey = ['MaSV', 'MaMH', 'HocKy', 'NamHoc'];
    public $incrementing = false;
    protected $fillable = ['MaSV', 'MaMH', 'HocKy', 'NamHoc', 'MaGV', 'Xeploai', 'Diem'];




    // Điểm học phần thuộc về một sinh viên
    public function sinhvien()
    {
        return $this->belongsTo(SVien::class, 'MaSV', 'MaSV');
    }

    // Điểm học phần thuộc về một môn học
    public function monhoc()
    {
        return $this->belongsTo(MonHoc::class, 'MaMH', 'MaMH');
    }

    public function giangvien(){
        return $this->belongsTo(GIANGVIEN::class, 'MaGV', 'MaGV');
    }
}


?>
