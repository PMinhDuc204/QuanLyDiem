<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GIANGVIEN extends Model
{
    use HasFactory;

    protected $table = 'giangviens';
    protected $primaryKey = 'MaGV';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['MaGV', 'TenGV', 'SDT', 'Bangcap'];

    // Một giảng viên dạy nhiều môn học
    public function monhocs()
    {
        return $this->hasMany(MONHOC::class, 'MaGV', 'MaGV');
    }

    // Một giảng viên chấm điểm cho nhiều sinh viên
    public function diem()
    {
        return $this->hasMany(DiemHP::class, 'MaGV', 'MaGV');
    }
}
?>
