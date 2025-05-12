
 @extends('layouts.trangchu')

 @section('title', 'Quản Lý Sinh Viên')

 @section('content')
     <div class="mt-3">
         <a href="{{ route('sinhviens.create') }}" class="btn btn-primary">Thêm Sinh Viên</a>
     </div>
     <form action="{{ route('sinhviens.index') }}" method="GET" class="mt-4 d-flex align-items-center gap-2">
        <input type="text" name="TenSV" class="form-control w-25" placeholder="Tìm kiếm theo Tên sinh viên">
        <input type="text" name="Phai" class="form-control w-25" placeholder="Tìm kiếm theo Giới Tính">
        <button class="btn btn-info" type="submit">Tìm kiếm</button>
     </form>

     <table class="table table-bordered mt-4 text-center">
         <thead class="table-dark">
             <tr>
                 <th>Mã SV</th>
                 <th>Tên SV</th>
                 <th>Giới tính</th>
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
                     <a href="{{ route('sinhviens.edit', ['sinhvien' => $sv->MaSV]) }}" class="btn btn-warning btn-sm">Cập nhật</a>
                     <form action="{{ route('sinhviens.destroy', ['sinhvien' => $sv->MaSV]) }}" method="post" style="display:inline;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</button>
                     </form>
                 </td>
             </tr>
             @endforeach
         </tbody>
     </table>
 @endsection
