@extends('layouts.trangchu')

@section('title', 'Danh sách Môn Học')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Danh sách Môn Học</h3>
        <a href="{{ route('monhocs.create') }}" class="btn btn-primary">+ Thêm Môn Học</a>
    </div>
    <form action="{{ route('monhocs.index') }}" method="GET" class="mt-4 d-flex align-items-center gap-2">
        <input type="text" name="TenMH" class="form-control w-25" placeholder="Tìm kiếm theo Tên Môn Học">
        <button class="btn btn-info" type="submit">Tìm kiếm</button>
    </form>
    <div class="card-body">

        {{-- Hiển thị thông báo thành công --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Kiểm tra danh sách môn học --}}
        @if (!$monhocs->count())
            <div class="alert alert-warning text-center">Không có môn học nào!</div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Mã MH</th>
                        <th>Tên Môn Học</th>
                        <th>Số Tín Chỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monhocs as $mh)
                    <tr>
                        <td>{{ $mh->MaMH }}</td>
                        <td>{{ $mh->TenMH }}</td>
                        <td>{{ $mh->SoTC }}</td>
                        <td>
                            <a href="{{ route('monhocs.edit', $mh->MaMH) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('monhocs.destroy', $mh->MaMH) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
