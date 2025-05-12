<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SVien extends Model
{
    use HasFactory;

   protected $table = 'svien';
   protected $primaryKey = 'MaSV'; // Đảm bảo Laravel nhận đúng khóa chính
   public $incrementing = true; // Nếu id là AUTO_INCREMENT
   protected $fillable =['TenSV', 'Phai', 'SDT', 'MaLop'];
   public $timestamps = false;

   public function lop(){
    return $this->belongsTo(LOP::class, 'MaLop', 'MaLop');
}
   public function diemHP(){
    return $this->hasMany(DiemHP::class, 'MaSV', 'MaSV');
   }
}

