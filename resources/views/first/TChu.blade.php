@extends('layouts.mater')

@section('content')
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Card 1: Quản lý sinh viên -->
            <div class="col">
                <div class="card shadow-sm border-0 h-100 bg-gradient bg-primary text-white">
                    <div class="card-body text-center">
                        <h2 class="card-title">Quản lý sinh viên</h2>
                        <p class="card-text">Quản lý thông tin, điểm số, và các dữ liệu liên quan đến sinh viên.</p>
                        <form action="{{ route('sinhviens.index') }}" method="GET">
                            <button type="submit" class="btn btn-light btn-lg w-100">Quản lý</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card 2: Quản lý giảng viên -->
            <div class="col">
                <div class="card shadow-sm border-0 h-100 bg-gradient bg-success text-white">
                    <div class="card-body text-center">
                        <h2 class="card-title">Quản lý giảng viên</h2>
                        <p class="card-text">Quản lý thông tin và lịch giảng dạy của giảng viên.</p>
                        <form action="{{ route('giangviens.index') }}" method="GET">
                            <button type="submit" class="btn btn-light btn-lg w-100">Quản lý</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card 3: Quản lý điểm -->
            <div class="col">
                <div class="card shadow-sm border-0 h-100 bg-gradient bg-danger text-white">
                    <div class="card-body text-center">
                        <h2 class="card-title">Quản lý điểm</h2>
                        <p class="card-text">Quản lý điểm thi và điểm học tập của sinh viên.</p>
                        <form action="{{ route('diemhps.index') }}" method="GET">
                            <button type="submit" class="btn btn-light btn-lg w-100">Quản lý</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Card 4: Quản lý lớp học -->
            <div class="col">
                <div class="card shadow-sm border-0 h-100 bg-gradient bg-info text-dark">
                    <div class="card-body text-center">
                        <h2 class="card-title">Quản lý lớp học</h2>
                        <p class="card-text">Quản lý thông tin và lịch học của các lớp học.</p>
                        <form action="{{ route('lops.index') }}" method="GET">
                            <button type="submit" class="btn btn-dark btn-lg w-100">Quản lý</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Card 4: Quản lý môn học -->
            <div class="col">
                <div class="card shadow-sm border-0 h-100 bg-gradient bg-warning text-dark">
                    <div class="card-body text-center">
                        <h2 class="card-title">Quản lý môn học</h2>
                        <p class="card-text">Quản lý các môn học trong hệ thống.</p>
                        <form action="{{ route('monhocs.index') }}" method="GET">
                            <button type="submit" class="btn btn-dark btn-lg w-100">Quản lý</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
