@extends('layouts.trangchu')

@section('title', 'Thêm Môn Học')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Thêm Môn Học</h4>
    </div>
    <div class="card-body">
        {{-- Hiển thị lỗi nếu có --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form thêm môn học --}}
        <form action="{{ route('monhocs.store') }}" method="POST">
            @csrf
            {{-- <div class="mb-3">
                <label for="MaMH" class="form-label">Mã Môn Học</label>
                <input type="text" id="MaMH" name="MaMH" class="form-control" value="{{ old('MaMH') }}" required>
            </div> --}}

            <div class="mb-3">
                <label for="TenMH" class="form-label">Tên Môn Học</label>
                <input type="text" id="TenMH" name="TenMH" class="form-control" value="{{ old('TenMH') }}" required>
            </div>

            <div class="mb-3">
                <label for="SoTC" class="form-label">Số Tín Chỉ</label>
                <input type="number" id="SoTC" name="SoTC" class="form-control" value="{{ old('SoTC') }}" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Thêm Môn Học</button>
                <a href="{{ route('monhocs.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </form>
    </div>
</div>
@endsection
