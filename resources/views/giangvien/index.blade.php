@extends('layouts.trangchu')

@section('title', 'Danh sách Giảng viên')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Danh sách Giảng viên</h3>
        <a href="{{ route('giangviens.create') }}" class="btn btn-primary">+ Thêm Giảng viên</a>
    </div>
    <form action="{{ route('giangviens.index') }}" method="GET" class="mt-4 d-flex align-items-center gap-2">
        <input type="text" name="TenGV" class="form-control w-25" placeholder="Tìm kiếm theo Tên Giảng Viên">
        <input type="text" name="Bangcap" class="form-control w-25" placeholder="Tìm kiếm theo Bằng cấp">
        <button class="btn btn-info" type="submit">Tìm kiếm</button>
     </form>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã GV</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Bằng cấp</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($giangviens as $gv)
                <tr>
                    <td>{{ $gv->MaGV }}</td>
                    <td>{{ $gv->TenGV }}</td>
                    <td>{{ $gv->SDT }}</td>
                    <td>{{ $gv->Bangcap }}</td>
                    <td>
                        <a href="{{ route('giangviens.edit', $gv->MaGV) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('giangviens.destroy', $gv->MaGV) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
