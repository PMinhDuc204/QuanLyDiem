@extends('layouts.trangchu')

@section('title', 'Thêm mới lớp')

@section('content')
    <div class="card">
        <div class="card-header bg-success text-white">
            <h5>Thêm mới lớp</h5>
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

            <form action="{{ route('lops.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="TenLop" class="form-label">Tên lớp</label>
                    <input type="text" id="TenLop" name="TenLop" class="form-control" value="{{ old('TenLop') }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{ route('lops.index') }}" class="btn btn-secondary">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection
