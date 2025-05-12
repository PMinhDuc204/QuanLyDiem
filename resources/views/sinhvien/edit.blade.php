@extends('layouts.trangchu')

@section('title', 'Chỉnh sửa sinh viên')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Chỉnh sửa Sinh viên</div>
        <div class="card-body">
                <form action="{{ route('sinhviens.update', $sinhviens->MaSV) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Tên sinh viên</label>
                        <input type="text" name="TenSV" class="form-control" value="{{ old('TenSV', $sinhviens->TenSV) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giới tính</label>
                        <select name="Phai" class="form-control" required>
                            <option value="Nam" {{ old('Phai', $sinhviens->Phai) == 'Nam' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ old('Phai', $sinhviens->Phai) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="SDT" class="form-control" value="{{ old('SDT', $sinhviens->SDT) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lớp</label>
                        <select name="MaLop" class="form-control" required>
                            @foreach ($lops as $lop)
                                <option value="{{ $lop->MaLop }}" {{ old('MaLop', $sinhviens->MaLop) == $lop->MaLop ? 'selected' : '' }}>
                                    {{ $lop->TenLop }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <a href="{{ route('sinhviens.index') }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </div>
@endsection


