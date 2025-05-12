<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;

    protected $table = 'monhoc';  // Tên bảng
    protected $primaryKey = 'MaMH';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =['TenMH', 'SoTC', 'MoTa'];
    public function diemhp(){
        return $this->belongsToMany(SVien::class,  'MaMH', 'MaMH');
    }
}
?>
