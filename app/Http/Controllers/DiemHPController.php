<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemHP;
use App\Models\SVien;
use App\Models\MonHoc;
use App\Models\GIANGVIEN;
use App\Http\Requests\DiemHPRequest;

class DiemHPController extends Controller
{
    /**
     * Hiển thị danh sách điểm học phần.
     */
    public function index(Request $request)
    {
        $diemhps = DiemHP::with(['sinhvien', 'monhoc', 'giangvien'])
    ->when(!empty($request->MaSV), function ($q) use ($request) {
        $q->where('MaSV', $request->MaSV);
    })->when(!empty($request->NamHoc), function ($q) use ($request) {
        $q->where('NamHoc', 'like',  '%' . $request->NamHoc . '%');
    })
    ->get();

    return view('diemhp.index', compact('diemhps'));
    }

    /**
     * Hiển thị form thêm mới điểm học phần.
     */
    public function create()
    {
        $sinhviens = SVien::all();
        $giangviens = GIANGVIEN::all();
        $monhocs = MonHoc::all();

    return view('diemhp.create', compact('sinhviens', 'giangviens', 'monhocs'));
    }

    /**
     * Lưu điểm học phần mới vào CSDL.
     */
    public function store(DiemHPRequest $request)
    {

        $validated = $request->validated();
        // dd($validated);

    // Tính xếp loại dựa trên điểm
    $diem = $validated['Diem'];
    $Xeploai = match (true) {
        $diem >= 9 => 'Xuất sắc',
        $diem >= 8 => 'Giỏi',
        $diem >= 7 => 'Khá',
        $diem >= 5 => 'Trung bình',
        $diem >= 4 => 'Yếu',
        default => 'Kém',
    };

    $validated['Xeploai'] = $Xeploai;

    // Tạo bản ghi mới
    DiemHP::create($validated);

    return redirect()->route('diemhps.index')->with('success', 'Thêm điểm học phần thành công');
    }

    /**
     * Hiển thị chi tiết điểm học phần.
     */
    public function show(Request $request)
    {

    }

    /**
     * Hiển thị form chỉnh sửa điểm học phần.
     */
    public function edit($MaSV, $MaMH, $HocKy, $NamHoc, $MaGV)
    {
        $diemhp = DiemHP::where([
            ['MaSV', '=', $MaSV],
            ['MaMH', '=', $MaMH],
            ['HocKy', '=', $HocKy],
            ['NamHoc', '=', $NamHoc],
            ['MaGV', '=', $MaGV]
        ])
        ->with(['sinhvien', 'monhoc', 'giangvien'])
        ->firstOrFail();
        // dd($diemhp);

        // Lấy danh sách cho các <select>
        $sinhviens = SVien::select('MaSV', 'TenSV')->get();
        $giangviens = GIANGVIEN::select('MaGV', 'TenGV')->get();
        $monhocs = MonHoc::select('MaMH', 'TenMH')->get();

        return view('diemhp.edit', compact('diemhp', 'sinhviens', 'giangviens', 'monhocs'));
   }
    /**
     * Cập nhật điểm học phần trong CSDL.
     */
    public function update(DiemHPRequest $request, $MaSV, $MaMH, $HocKy, $NamHoc, $MaGV)
    {
        // Tìm bản ghi cần cập nhật
        // dd($MaSV, $MaMH, $HocKy, $NamHoc, $MaGV);
        // dd($HocKy);
        $diemhp = DiemHP::where([
            ['MaSV', '=', $MaSV],
            ['MaMH', '=', $MaMH],
            ['HocKy', '=', $HocKy],
            ['NamHoc', '=', $NamHoc],
            ['MaGV', '=', $MaGV]
        ])
        ->first();

        DiemHP::where([
            ['MaSV', '=', $MaSV],
            ['MaMH', '=', $MaMH],
            ['HocKy', '=', $HocKy],
            ['NamHoc', '=', $NamHoc]
        ])->update([
            'Diem' => $request->input('Diem'),
            'Xeploai' => $request->input('Xeploai')
        ]);

        // dd($diemhp);

        $requestData = $request->validated();
        $requestData['Xeploai'] = $request->input('Xeploai', 'Chưa xác định'); // Giá trị mặc định
        // dd($requestData);
        unset($requestData['Diem']);
        unset($requestData['Xeploai']);
        // $diemhp->update($requestData);
        return redirect()->route('diemhps.index')->with('success','Cập nhật điểm học phần thành công');
    }
    /**
     * Xóa điểm học phần khỏi CSDL.
     */
    public function destroy($MaSV, $MaMH, $HocKy, $NamHoc, $MaGV)
    {
        DiemHP::where([
            ['MaSV', '=', $MaSV],
            ['MaMH', '=', $MaMH],
            ['HocKy', '=', $HocKy],
            ['NamHoc', '=', $NamHoc],
            ['MaGV', '=', $MaGV]
        ])->delete();
        return redirect()->route('diemhps.index')->with('success', 'Xóa điểm thành công');
    }
}
?>
