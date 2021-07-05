@extends('layout.app')
@section('content')
    <div class="container">
        <div class="py-12 my-5 ">
            <div class="">
                <div class="bg-white ">

                    <div class="p-3" id="pdf">
                        <h2 class="text-2xl font-bold my-2 ">Đơn hàng số #{{$customer[0]->id}}</h2>

                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="">Ngày tạo đơn: {{$customer[0]->created_at}}</h6>
                                <h6 class="">Trạng thái: {{$customer[0]->getStatus->name}}</h6>
                                <h6 class="">Tên khách hàng: {{$customer[0]->name}}</h6>
                                <h6 class="">Số điện thoại: {{$customer[0]->phone}}</h6>
                                <h6 class="">Email: {{$customer[0]->email}}</h6>
                                <h6 class="">Địa chỉ nhận hàng: {{$customer[0]->addres}}</h6>

                            </div>
                            <div class="col-md-6">
                                <a type="button" href="{{route('orders.pdf',$customer[0]->id)}}"
                                   class="ml-5 px-5 py-2  btn btn-success" style="cursor: pointer">Download
                                    PDF </a>
                            </div>
                        </div>

                        <table id="" class="display table text-center mt-3">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $key = 1;?>
                            @foreach($customer[0]->getDetail as $it)
                                @foreach($it->GetProducts as $pro)
                                    <tr class="text-center">
                                        <td>{{$key++}}</td>
                                        <td>{{$pro->name}}</td>
                                        <td> @if($pro->sale_price > 0)
                                                <p>
                                                    <del class="text-gray font-weight-bolder"
                                                    > {{number_format($pro->price)}}</del>
                                                    <span class="text-success font-weight-bolder"
                                                    >{{number_format($pro->sale_price) .'VNĐ'}}</span>
                                                </p>

                                            @else
                                                <p class="text-success font-weight-bolder"
                                                >
                                                    {{number_format($pro->price) . 'VNĐ'}}
                                                </p>
                                            @endif</td>
                                        <td>{{$it->quantity}}</td>
                                        <td>{{number_format($pro->sale_price >0? $pro->sale_price * $it->quantity :$pro->price * $it->quantity)}}
                                            VNĐ
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-left">
                            <h6>Giảm: {{ number_format($customer[0]->voucher) .  ' vnđ'}}</h6>

                            <h5>Tổng tiền đơn
                                hàng: {{number_format($customer[0]->total_price - $customer[0]->voucher > 0 ? $customer[0]->total_price - $customer[0]->voucher : 0)}}
                                VNĐ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
