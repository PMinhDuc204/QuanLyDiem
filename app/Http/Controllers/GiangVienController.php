<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiangVienRequest;
use App\Models\GIANGVIEN;
use Illuminate\Http\Request;

class GiangVienController extends Controller
{
    /**
     * Hiển thị danh sách giảng viên.
     */
    public function index(Request $request)
    {
        $giangviens = GIANGVIEN::when(!empty($request->MaGV), function ($q) use ($request){
            $q->where('MaGV', $request->MaGV);
        })->when(!empty($request->TenGV), function ($q) use ($request){
            $q->where('TenGV', 'like', '%' . $request->TenGV .'%');
        })->when(!empty($request->Bangcap), function ($q) use ($request){
            $q->where('Bangcap', 'like', '%' . $request->Bangcap .'%');
        })
        ->get();
        return view('giangvien.index', compact('giangviens'));
    }

    /**
     * Hiển thị form thêm giảng viên.
     */
    public function create()
    {
        return view('giangvien.create');
    }

    /**
     * Lưu giảng viên mới vào database.
     */
    public function store(GiangVienRequest $request)
    {
        GIANGVIEN::create($request->validated());
        // $giangviens = new GIANGVIEN();
        // $giangviens->SDT = $request->SDT;
        return redirect()->route('giangviens.index')->with('success', 'Thêm giảng viên thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa giảng viên.
     */
    public function edit($MaGV)
    {
        $giangviens = GIANGVIEN::findOrFail($MaGV);
        return view('giangvien.edit', compact('giangviens'));
    }

    /**
     * Cập nhật thông tin giảng viên.
     */
    public function update(GiangVienRequest $request, $MaGV)
    {
        $giangviens = GIANGVIEN::findOrFail($MaGV);
        $giangviens->update($request->validated());

        return redirect()->route('giangviens.index')->with('success', 'Cập nhật giảng viên thành công!');
    }

    /**
     * Xóa giảng viên.
     */
    public function destroy($MaGV)
    {
        $giangviens = GIANGVIEN::findOrFail($MaGV);

        $giangviens->delete();
        return redirect()->route('giangviens.index')->with('success', 'Xóa giảng viên thành công!');
    }
}
