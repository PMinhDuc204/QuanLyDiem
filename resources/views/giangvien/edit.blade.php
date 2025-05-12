@extends('layouts.trangchu')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Chỉnh sửa thông tin Giảng Viên</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('giangviens.update', $giangviens->MaGV) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="TenGV" class="form-label">Tên Giảng Viên</label>
            <input type="text" name="TenGV" class="form-control" id="TenGV" value="{{ old('TenGV', $giangviens->TenGV) }}" required>
        </div>

        <div class="mb-3">
            <label for="SDT" class="form-label">Số Điện Thoại</label>
            <input type="text" name="SDT" class="form-control" id="SDT" value="{{ old('SDT', $giangviens->SDT) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bằng Cấp</label>
            <select name="Bangcap" class="form-control" required>
                <option value="Thạc sĩ" {{ old('Bangcap', $giangviens->Bangcap) == 'Thạc sĩ' ? 'selected' : '' }}>Thạc sĩ</option>
                <option value="Tiến sĩ" {{ old('Bangcap', $giangviens->Bangcap) == 'Tiến sĩ' ? 'selected' : '' }}>Tiến sĩ</option>
                <option value="Phó Giáo sư" {{ old('Bangcap', $giangviens->Bangcap) == 'Phó Giáo sư' ? 'selected' : '' }}>Phó Giáo sư</option>
                <option value="Giáo sư" {{ old('Bangcap', $giangviens->Bangcap) == 'Giáo sư' ? 'selected' : '' }}>Giáo sư</option>
                <option value="Thạc sĩ" {{ old('Bangcap', $giangviens->Bangcap) == 'Thạc sĩ' ? 'selected' : '' }}>Thạc sĩ</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('giangviens.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
