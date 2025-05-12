<?php
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\SVienController;
use App\Http\Controllers\LOPController;
use App\Http\Controllers\DiemHPController;
use App\Http\Controllers\MonHocController;
use App\Models\SVien;
use Illuminate\Support\Facades\Route;


Route::resource('sinhviens', SVienController::class);

?>
