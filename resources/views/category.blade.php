@extends('layout.app')
@section('content')
    <div class="d-none">
        <div class="bg-primary p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Trending</h4>
        </div>
    </div>
    <div class="osahan-trending">
        <div class="container">
            <div class="most_popular py-5">
                <div class="d-flex align-items-center mb-4">
                    <h3 class="font-weight-bold text-dark mb-0">Danh mục: {{$cate->name}}</h3>
                </div>
                <div class="row">
                    @foreach($product as $item)
                        <div class="col-lg-4 mb-3">
                            <div
                                class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">
                                <div class="list-card-image">
                                    <div class="star position-absolute"><span class="badge badge-success"><i
                                                class="feather-star"></i> 3.1 (300+)</span></div>
                                    <div class="favourite-heart text-danger position-absolute">
                                        {{--                                        <form method="post" action="{{route('add.cart',$item->id)}}" class="buy"> @csrf--}}
                                        {{--                                            <button type="submit"--}}
                                        {{--                                                    class="feather-shopping-cart home bg-primary "></button>--}}
                                        {{--                                        </form>--}}
                                        <a href="{{route('cart.add',$item->id)}}"><i
                                                class="feather-shopping-cart"></i></a>
                                    </div>
                                    <div class="member-plan position-absolute">@if($item->Flash_Sale == 1)
                                            <span class="badge badge-warning">Giảm giá
                                    </span>
                                        @endif
                                    </div>
                                    <a href="{{route('detail.view',$item->id)}}">
                                        <img alt="{{$item->name}}" src="{{url('/public/')}}{{$item->img}}"
                                             class="img-fluid item-img w-100">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1"><a href="{{route('detail.view',$item->id)}}"
                                                            class="text-black">{{$item->name}}
                                            </a>
                                        </h6>
                                        <p class="text-success font-weight-bolder"
                                           style="font-size: 1.3rem">{{number_format($item->price) . ' VNĐ'}}</p>
                                    </div>
                                    <div class="list-card-badge">
                                        <span class="badge badge-danger">OFFER</span> <small>65% OSAHAN50</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
