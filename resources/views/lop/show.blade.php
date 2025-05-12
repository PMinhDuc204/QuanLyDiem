@extends('layouts.trangchu')

@section('content')
    <h2>Chi tiết Lớp: {{ $lops->TenLop }} ({{ $lops->MaLop }})</h2>
    <a href="{{ route('lops.index') }}" class="btn btn-secondary">Quay lại danh sách lớp</a>

    <h4 class="mt-4">Danh sách sinh viên</h4>
    @if ($sinhviens->isEmpty())
        <p>Không có sinh viên nào trong lớp này.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã SV</th>
                    <th>Họ tên</th>
                    <th>Giới Tính</th>
                    <th>SĐT</th>
                    <th>Mã Lớp</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sinhviens as $sv)
                    <tr>
                        <td>{{ $sv->MaSV }}</td>
                        <td>{{ $sv->TenSV }}</td>
                        <td>{{ $sv->Phai }}</td>
                        <td>{{ $sv->SDT }}</td>
                        <td>{{ $sv->MaLop }}</td>
                        <td>
                            <a href="{{ route('sinhviens.edit', $sv->MaSV) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('sinhviens.destroy', $sv->MaSV) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
