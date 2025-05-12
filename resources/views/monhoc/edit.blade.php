@extends('layouts.trangchu')

@section('title', 'Chỉnh sửa Môn Học')

@section('content')
    <h2 class="mb-4">Chỉnh sửa Môn Học</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('monhocs.update', $monhocs->MaMH) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên Môn Học</label>
            <input type="text" name="TenMH" class="form-control" value="{{ old('TenMH', $monhocs->TenMH) }}" required>
        </div>
        <div class="mb-3">
            <label for="SoTC" class="form-label">Số Tín Chỉ</label>
            <input type="number" id="SoTC" name="SoTC" class="form-control" value="{{ old('SoTC', $monhocs->SoTC) }}" required>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('monhocs.index') }}" class="btn btn-secondary">Quay Lại</a>
    </form>
@endsection

