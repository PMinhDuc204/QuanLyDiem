@extends('layouts.trangchu')

@section('content')
<div class="container">
    <h2>Chỉnh Sửa Điểm Học Phần</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('diemhps.update', [
        'MaSV' => $diemhp->MaSV,
        'MaMH' => $diemhp->MaMH,
        'HocKy' => $diemhp->HocKy,
        'NamHoc' => $diemhp->NamHoc,
        'MaGV' => $diemhp->MaGV
    ]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Chọn Sinh Viên -->
        <div class="mb-3">
            <label class="form-label">Sinh Viên</label>
            <select name="MaSV" class="form-control" required>
                <option value="">-- Chọn Sinh Viên --</option>
                @foreach($sinhviens as $sv)
                    <option value="{{ $sv->MaSV }}" {{ old('MaSV', $diemhp->MaSV) == $sv->MaSV ? 'selected' : '' }}>
                        {{ $sv->MaSV }} - {{ $sv->TenSV }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Chọn Môn Học -->
        <div class="mb-3">
            <label class="form-label">Môn Học</label>
            <select name="MaMH" class="form-control" required>
                <option value="">-- Chọn Môn Học --</option>
                @foreach($monhocs as $mh)
                    <option value="{{ $mh->MaMH }}" {{ old('MaMH', $diemhp->MaMH) == $mh->MaMH ? 'selected' : '' }}>
                        {{ $mh->MaMH }} - {{ $mh->TenMH }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Chọn Học Kỳ -->
        <div class="mb-3">
            <label for="HocKy" class="form-label">Học kỳ</label>
            <input type="number" class="form-control" id="HocKy" name="HocKy" value="{{ old('HocKy', $diemhp->HocKy) }}" required>
        </div>

        <!-- Chọn Năm Học -->
        <div class="mb-3">
            <label class="form-label">Năm Học</label>
            <input type="text" class="form-control" id="NamHoc" name="NamHoc" value="{{ old('NamHoc', $diemhp->NamHoc) }}" required>
        </div>

        <!-- Chọn Giảng Viên -->
        <div class="mb-3">
            <label class="form-label">Giảng Viên</label>
            <select name="MaGV" class="form-control" required>
                <option value="">-- Chọn Giảng Viên --</option>
                @foreach($giangviens as $gv)
                    <option value="{{ $gv->MaGV }}" {{ old('MaGV', $diemhp->MaGV) == $gv->MaGV ? 'selected' : '' }}>
                        {{ $gv->MaGV }} - {{ $gv->TenGV }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nhập Điểm -->
        <div class="mb-3">
            <label class="form-label">Điểm</label>
            <input type="number" name="Diem" class="form-control" step="0.1" min="0" max="10" value="{{ old('Diem', $diemhp->Diem) }}" required>
        </div>

        <!-- Chọn Xếp Loại -->
        <div class="mb-3">
            <label for="Xeploai" class="form-label">Xếp loại</label>
            <select class="form-control" name="Xeploai" id="Xeploai" required>
                <option value="">-- Chọn xếp loại --</option>
                <option value="Xuất sắc">Xuất sắc</option>
                <option value="Giỏi">Giỏi</option>
                <option value="Khá">Khá</option>
                <option value="Trung bình">Trung bình</option>
                <option value="Yếu">Yếu</option>
                <option value="Kém">Kém</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('diemhps.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
