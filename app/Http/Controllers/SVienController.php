<?php

namespace App\Http\Controllers;

use App\Http\Requests\SVienRequest;
use App\Models\LOP;
use App\Models\SVien;
use Illuminate\Http\Request;

class SVienController extends Controller
{


    public function index(Request $request)
    {
        //
        $sinhviens = SVien::when(!empty($request->MaSV), function ($q) use ($request) {
            $q->where('MaSV', $request->MaSV);
        })->when(!empty($request->TenSV), function ($q) use ($request) {
            $q->where('TenSV', 'like',  '%' . $request->TenSV . '%');
        })->when(!empty($request->Phai), function ($q) use ($request) {
            $q->where('Phai', 'like', '%' .$request->Phai . '%');
        })->when(!empty($request->MaLop), function ($q) use ($request){
            $q->where('MaLop', 'like', '%' .$request->MaLop . '%');
        })
        ->get();

        $lops = LOP::all();
        return view('sinhvien.index', compact('sinhviens', 'lops'));

        // return response()->json([
        //     'success' => true,
        //     'data' => $sinhviens,
        //     'message' => 'Lấy danh sách sinh viên thành công',
        // ], 200);

    }

    public function getData(Request $request) {

        $sinhviens = SVien::when(!empty($request->MaSV), function ($q) use ($request) {
            $q->where('MaSV', $request->MaSV);
        })->get();
        return response()->json([
            'success' => true,
            'data' => $sinhviens,
            'message' => 'Lấy danh sách sinh viên thành công',
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $lops = LOP::all(); // Lấy danh sách lớp từ bảng LOP
        return view('sinhvien.create', compact('lops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SVienRequest $request)
    {
        //
        // dd($request->all());
        // $sinhviens = SVien::create($request->validated());
        // $sinhviens = new SVien();
        // $sinhviens->TenSV = $request->TenSV;
        // $sinhviens->Phai = $request->Phai;
        // $sinhviens->SDT = $request->SDT;
        // $sinhviens->MaLop = $request->MaLop;

        // $sinhviens->save(); // Lưu dữ liệu
        // return redirect()->route('sinhviens.index')->with('success','Them sinh vien thanh cong');
        $sinhvien = SVien::create($request->validated());

            if ($sinhvien) {
                return response()->json(
                    [
                       'success' => true,
                       'data' => $sinhvien,
                       'message' => 'Thêm sinh viên thành công',
                   ],201
                );
            }

            return response()->json(
                [
                  'success' => false,
                  'message' => 'Không thể thêm sinh viên',
                ],500
            );
    }

    /**
     * Display the specified resource.
     */
    public function show($MaSV)
    {
        //
    $sinhvien = SVien::findOrFail($MaSV);
    return view('sinhvien.show', compact('sinhvien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($MaSV)
    {
        //

        $sinhviens = SVien::where('MaSV', $MaSV)->first();
        // $sinhviens = SVien::find($MaSV);
        $lops = LOP::all(); // Lấy danh sách lớp để hiển thị trong form
        // return view('sinhvien.edit', compact('sinhviens', 'lops'));
        return response()->json([
            'success' => true,
            'data' => $sinhviens,
            'message' => 'Lấy thông tin sinh viên thành công',
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(SVienRequest $request, $MaSV)
    {
        //
        $sinhviens = SVien::findOrFail($MaSV);
        $sinhviens->update($request->validated());
        // $sinhvien->update($request->validated()); // Cập nhật trực tiếp trên object
            // return redirect()->route('sinhviens.index')->with('success','Cập nhật thành công');
        return response()->json(
            [
                'success' => true,
                'message' => 'Cập nhật sinh viên thành công',
            ], 200
        );
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($MaSV)
    {
        //
        $sinhviens = SVien::findOrFail($MaSV);
        $sinhviens->delete(); // Xóa trực tiếp object
        return redirect()->route('sinhviens.index')->with('success', 'Xóa thông tin thành công');
    }
}
