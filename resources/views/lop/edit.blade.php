@extends('layouts.trangchu')

@section('title', 'Chỉnh sửa lớp')

@section('content')
    <h2 class="mb-4">Chỉnh sửa Lớp</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lops.update', $lops->MaLop) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên Lớp</label>
            <input type="text" name="TenLop" class="form-control" value="{{ old('TenLop', $lops->TenLop) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('lops.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

