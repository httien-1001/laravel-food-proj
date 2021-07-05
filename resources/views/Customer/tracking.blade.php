@extends('layout.app')
@section('content')
    <div class="container">
    <div class="py-12 my-5 ">
        <div class="">
            <div class="bg-white ">
                <div class="p-3">
                    <h2 class="text-2xl font-bold my-2 ">Danh sách đơn hàng</h2>

                    <table id="" class="display table text-center">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Xem chi tiết</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $key = 1;
                        @endphp

                        @foreach($orders as $it)
                            <tr class="text-center">
                                <td>{{$key++}}</td>
                                <td>{{$it->name}}</td>
                                <td>{{$it->phone}}</td>
                                <td>{{$it->email}}</td>

                                <td>{{number_format($it->total_price - $it->voucher > 0 ? $it->total_price - $it->voucher : 0) . ' vnđ'}}</td>
                                <td>{{$it->getStatus->name}}</td>
                                <td>
                                    <a href="{{route('tracking.detail',$it->id)}}"
                                       class="btn btn-sm btn-success">Xem chi tiết</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
