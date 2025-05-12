@extends('layouts.trangchu')

@section('content')
<div class="container mt-4">
    <h2>Thêm Giảng Viên Mới</h2>

    <form action="{{ route('giangviens.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="TenGV" class="form-label">Tên Giảng Viên</label>
            <input type="text" class="form-control" id="TenGV" name="TenGV" required>
        </div>

        <div class="mb-3">
            <label for="SDT" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control" id="SDT" name="SDT" required>
        </div>

        <div class="mb-3">
            <label for="Bangcap" class="form-label">Bằng Cấp</label>
            <select class="form-select" id="Bangcap" name="Bangcap">
                <option value="Tiến sĩ">Tiến sĩ</option>
                <option value="Thạc sĩ">Thạc sĩ</option>
                <option value="Phó Giáo sư">Phó Giáo sư</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Giảng Viên</button>
        <a href="{{ route('giangviens.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
