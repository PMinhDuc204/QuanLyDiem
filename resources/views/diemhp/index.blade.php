@extends('layouts.trangchu')

@section('title', 'Danh sách Điểm Học Phần')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Danh sách Điểm</h3>

        <a href="{{ route('diemhps.create') }}" class="btn btn-primary">+ Thêm Điểm Học Phần</a>

    </div>
    <form action="{{ route('diemhps.index') }}" method="GET" class="mt-4 d-flex align-items-center gap-2">
        <input type="text" name="MaSV" class="form-control w-25" placeholder="Tìm kiếm theo Mã sinh viên">
        <input type="text" name="NamHoc" class="form-control w-25" placeholder="Tìm kiếm theo Năm Học">
        <button class="btn btn-info" type="submit">Tìm kiếm</button>
     </form>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã SV</th>
                    <th>Mã MH</th>
                    <th>Năm Học</th>
                    <th>Hoc Ky</th>
                    <th>Diem</th>
                    <th>Xep loai</th>
                    <th>Ma GV</th>
                    <th>Thao Tac</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diemhps as $diemhp)
                <tr>
                    <td>{{ $diemhp->MaSV }}</td>
                    <td>{{ $diemhp->MaMH }}</td>
                    <td>{{ $diemhp->NamHoc }}</td>
                    <td>{{ $diemhp->HocKy }}</td>
                    <td>{{ $diemhp->Diem }}</td>
                    <td>{{ $diemhp->Xeploai }}</td>
                    <td>{{ $diemhp->MaGV }}</td>
                    <td>
                        <a href="{{ route('diemhps.edit', [
                        'MaSV' => $diemhp->MaSV,
                        'MaMH' => $diemhp->MaMH,
                        'HocKy' => $diemhp->HocKy,
                        'NamHoc' => $diemhp->NamHoc,
                        'MaGV' => $diemhp->MaGV,
                        ]) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('diemhps.destroy', [
                            'MaSV' => $diemhp->MaSV,
                            'MaMH' => $diemhp->MaMH,
                            'HocKy' => $diemhp->HocKy,
                            'NamHoc' => $diemhp->NamHoc,
                            'MaGV' => $diemhp->MaGV,
                        ]) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

