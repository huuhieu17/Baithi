@extends('layouts.site')
@section('title')
    Create Customers
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <form action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Name">Name</label><br>
                    <input type="text" class="form-control" name="hoTen" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <label for="Avatar">Avatar:</label><br>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="gt">Giới tính</label>
                    <select name="gt" id="" class="form-control">
                        <option value="1">
                            Nam
                        </option>
                        <option value="2">
                            Nữ
                        </option>
                        <option value="3">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label><br>
                    <input type="text" name="sdt" placeholder="Số điện thoại" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
@endsection
