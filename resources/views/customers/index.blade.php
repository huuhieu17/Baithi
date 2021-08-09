@extends('layouts.site')
@section('title')
    Customers
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <form action="{{route('customers.index')}}" method="get">
                <div class="form-group">
                    <input type="text" name="keyword" placeholder="Tên khách hàng" class="form-control w-50" style="display: inline-block"> <button class="btn btn-secondary">Tìm kiếm</button>  <button type="button" onclick="window.location.replace('/customers/create')" class="btn btn-secondary">Create Customers</button>
                </div>

            </form>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Họ tên</th>
                    <th>Ảnh đại diện</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>


                @forelse($data as $d)
                    <tr>
                        <td>{{$d->maKH}}</td>
                        <td>{{$d->hoTen}}</td>
                        <td><img src="{{asset('storage/images/'.$d->avatar)}}" class="img-fluid" alt=""></td>
                        <td>
                            @switch($d->gt)
                                @case('0')
                                Nữ
                                @break
                                @case('1')
                                Nam
                                @break
                                @case('2')
                                Khác
                                @break
                            @endswitch
                        </td>
                        <td>{{$d->sdt}}</td>
                        <td>{{$d->email}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"> Không tìm thấy khách hàng nào</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
