<?php

use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\SVienController;
use App\Http\Controllers\LOPController;
use App\Http\Controllers\DiemHPController;
use App\Http\Controllers\MonHocController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('first.TChu');
});

Route::resource('sinhviens',SVienController::class);
Route::get('api/sinhviens/get-data', [SVienController::class, 'getData']);
Route::resource('lops', LOPController::class);
Route::resource('giangviens',GiangVienController::class);
Route::resource('monhocs',MonHocController::class);
Route::get('diemhps', [DiemHPController::class, 'index'])->name('diemhps.index');
Route::get('diemhps/create', [DiemHPController::class, 'create'])->name('diemhps.create');
Route::post('diemhps', [DiemHPController::class, 'store'])->name('diemhps.store');
Route::get('diemhps/{MaSV}/{MaMH}/{HocKy}/{NamHoc}/{MaGV}/edit', [DiemHPController::class, 'edit'])->name('diemhps.edit');
Route::put('/diemhps/{MaSV}/{MaMH}/{HocKy}/{NamHoc}/{MaGV}', [DiemHPController::class, 'update'])->name('diemhps.update');
Route::delete('/diemhps/{MaSV}/{MaMH}/{HocKy}/{NamHoc}/{MaGV}', [DiemHPController::class, 'destroy'])->name('diemhps.destroy');
Route::get('api/sinhviens', [SVienController::class, 'index'])->name('sinhviens.index');


?>
