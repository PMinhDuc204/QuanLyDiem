@extends('layouts.trangchu')

@section('title', 'Thêm sinh viên')

@section('content')
    <div class="card">
        <div class="card-header bg-success text-white">Thêm Sinh viên</div>
        <div class="card-body">
            <form action="{{ route('sinhviens.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên sinh viên</label>
                    <input type="text" name="TenSV" class="form-control" value="{{ old('TenSV') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Giới tính</label>
                    <select name="Phai" class="form-control" required>
                        <option value="Nam" {{ old('Phai') == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('Phai') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="SDT" class="form-control" value="{{ old('SDT') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lớp</label>
                    <select name="MaLop" class="form-control" required>
                        @foreach ($lops as $lop)
                            <option value="{{ $lop->MaLop }}" {{ old('MaLop') == $lop->MaLop ? 'selected' : '' }}>
                                {{ $lop->TenLop }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="{{ route('sinhviens.index') }}" class="btn btn-secondary">Trở lại</a>
            </form>
        </div>
    </div>
@endsection
