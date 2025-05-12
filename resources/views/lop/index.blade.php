@extends('layouts.trangchu')

@section('content')
    <h2>Danh sách Lớp</h2>
    <a href="{{ route('lops.create') }}" class="btn btn-primary">Thêm lớp</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lops as $lop)
                <tr>
                    <td>{{ $lop->MaLop }}</td>
                    <td>{{ $lop->TenLop }}</td>
                    <td>
                        <a href="{{ route('lops.edit', $lop->MaLop) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('lops.destroy', $lop->MaLop) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        <a href="{{ route('lops.show', $lop->MaLop) }}" class="btn btn-info btn-sm">Xem</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
