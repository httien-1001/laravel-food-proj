@extends('layout.app')
@section('title', $option->title)
@section('content')

    <div class="bg-primary p-3 d-none">
        <div class="text-white">
            <div class="title d-flex align-items-center">
                <a class="toggle" href="#">
                    <span></span>
                </a>
                <h4 class="font-weight-bold m-0 pl-5">Browse</h4>
            </div>
        </div>
        <div class="input-group mt-3 rounded shadow-sm overflow-hidden">
            <div class="input-group-prepend">

                <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i
                        class="feather-search"></i></button>
            </div>
            <input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes">
        </div>

    </div>
    <!-- Filters -->

    <div class="container">
        <div class="cat-slider">
            @foreach($cate as $ct)
                <div class="cat-item px-1 py-3">
                    <a class="bg-white rounded d-block p-2 text-center shadow-sm"
                       href="{{route('Category.view',$ct->id)}}">
                        <img alt="{{$ct->name}}" src="{{url('/public')}}{{$ct->img}}" class="img-fluid mb-2">
                        <p class="m-0 small">{{$ct->name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- offer sectio slider -->
    @if($banner != null)
        <div class="bg-white">
            <div class="container">
                <div class="offer-slider">
                    @foreach($banner as $banners)
                        <div class="cat-item px-1 py-3">
                            <a class="d-block text-center shadow-sm" href="{{$banners->link}}" target="_blank">
                                <img alt="#"
                                     src="{{url('/')}}{{$banners->images}}"
                                     class="img-fluid rounded" style="width: 100%; height: 450px; object-fit: cover">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <!-- Trending this week -->
        <div class="pt-4 pb-2 title d-flex align-items-center">
            <h5 class="m-0">Đặc biệt</h5>
        </div>
        <!-- slider -->
        <div class="trending-slider">
            @foreach($prod as $treding)
                @if($treding->GetCate->status == 1)
                    @if($treding->Special == 1)
                        <div class="osahan-slider-item">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <div class="star position-absolute"><span class="badge badge-success"><i
                                                class="feather-star"></i> 3.1 (300+)</span></div>
                                    <div class="favourite-heart text-danger position-absolute">
                                        {{--                                    <form method="post" action="{{route('cart.add',['id'=>$treding->id])}}" class="buy"> @csrf--}}
                                        {{--                                        <button type="submit" class="feather-shopping-cart home bg-primary "></button>--}}
                                        {{--                                    </form>--}}
                                        <a href="{{route('cart.add',$treding->id)}}"><i
                                                class="feather-shopping-cart"></i></a>
                                    </div>
                                    <div class="member-plan position-absolute">@if($treding->Flash_Sale == 1)
                                            <span class="badge badge-warning">Giảm giá
                                    </span>
                                        @endif
                                        <span class="badge badge-success"><i class="feather-star"></i>Đặc biệt</span>
                                    </div>
                                    <a href="{{route('detail.view',$treding->id)}}">
                                        <img alt="#" src="{{url('/public/')}}{{$treding->img}}"
                                             class="img-fluid item-img w-100">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1"><a href="{{route('detail.view',$treding->id)}}"
                                                            class="text-black">{{$treding->name}}
                                            </a>
                                        </h6>

                                        @if($treding->sale_price > 0)
                                            <p class="mt-2">
                                                <del class="text-gray font-weight-bolder"
                                                     style="font-size: 1.1rem"> {{number_format($treding->price)}}</del>
                                                <span class="text-warning font-weight-bolder"
                                                      style="font-size: 1.3rem">{{number_format($treding->sale_price) .' VNĐ '}}</span>
                                            </p>

                                        @else
                                            <p class="text-success font-weight-bolder"
                                               style="font-size: 1.3rem">
                                                {{number_format($treding->price) . 'VNĐ'}}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
        <!-- Most popular -->
        <div class="py-3 title d-flex align-items-center">
            <h5 class="m-0">Bài viết gần đây</h5>
        </div>
        <!-- Most popular -->

        <div class="most_popular">
            <div class="row">
                @foreach($prod->take(12) as $pr)

                    @if($pr->GetCate->status == 1)
                        <div class="col-md-3 pb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">

                                    <div class="favourite-heart text-danger position-absolute">
                                        {{--                                    <form method="post" action="{{route('cart.add',['id'=>$pr->id])}}" class="buy"> @csrf--}}
                                        {{--                                        <button type="submit" class="feather-shopping-cart home bg-primary "></button>--}}
                                        {{--                                    </form>--}}
                                        <a href="{{route('cart.add',$pr->id)}}"><i
                                                class="feather-shopping-cart"></i></a>
                                    </div>
                                    <div class="member-plan position-absolute">
                                        @if($pr->Flash_Sale == 1)
                                            <span class="badge badge-warning">Giảm giá
                                    </span>
                                        @endif

                                    </div>
                                    <a href="{{route('detail.view',$pr->id)}}"
                                       style="display: inline-block; height: 165px">
                                        <img alt="#" src="{{url('/public/')}}{{$pr->img}}"
                                             class="img-fluid item-img w-100">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1 title" style="height: 30px;"><a
                                                href="{{route('detail.view',$pr->id)}}"
                                                class="text-black">{{$pr->name}}
                                            </a>
                                        </h6>
                                        @if($pr->sale_price > 0)
                                            <p>
                                                <del class="text-gray font-weight-bolder"
                                                     style="font-size: 1.1rem"> {{number_format($pr->price)}}</del>
                                                <span class="text-success font-weight-bolder"
                                                      style="font-size: 1.3rem">{{number_format($pr->sale_price) .'VNĐ'}}</span>
                                            </p>

                                        @else
                                            <p class="text-success font-weight-bolder"
                                               style="font-size: 1.3rem">
                                                {{number_format($pr->price) . 'VNĐ'}}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
        <!-- Most sales -->
        <!-- Most popular -->
        <div class="py-3 title d-flex align-items-center">
            <h5 class="m-0">BÁNH MỲ HEALTHY</h5>
        </div>
        <!-- Most popular -->

        <div class="most_popular">
            <div class="row">
                @foreach($baminh[0]->GetProduct as $pr)
                    @if($pr->GetCate->status == 1)
                        <div class="col-md-3 pb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">

                                    <div class="favourite-heart text-danger position-absolute">
                                        {{--                                    <form method="post" action="{{route('cart.add',['id'=>$pr->id])}}" class="buy"> @csrf--}}
                                        {{--                                        <button type="submit" class="feather-shopping-cart home bg-primary "></button>--}}
                                        {{--                                    </form>--}}
                                        <a href="{{route('cart.add',$pr->id)}}"><i
                                                class="feather-shopping-cart"></i></a>
                                    </div>
                                    <div class="member-plan position-absolute">
                                        @if($pr->Flash_Sale == 1)
                                            <span class="badge badge-warning">Giảm giá
                                    </span>
                                        @endif

                                    </div>
                                    <a href="{{route('detail.view',$pr->id)}}"
                                       style="display: inline-block; height: 165px">
                                        <img alt="#" src="{{url('/public/')}}{{$pr->img}}"
                                             class="img-fluid item-img w-100">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1 title" style="height: 30px;"><a
                                                href="{{route('detail.view',$pr->id)}}"
                                                class="text-black">{{$pr->name}}
                                            </a>
                                        </h6>
                                        @if($pr->sale_price > 0)
                                            <p>
                                                <del class="text-gray font-weight-bolder"
                                                     style="font-size: 1.1rem"> {{number_format($pr->price)}}</del>
                                                <span class="text-success font-weight-bolder"
                                                      style="font-size: 1.3rem">{{number_format($pr->sale_price) .'VNĐ'}}</span>
                                            </p>

                                        @else
                                            <p class="text-success font-weight-bolder"
                                               style="font-size: 1.3rem">
                                                {{number_format($pr->price) . 'VNĐ'}}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- Most sales -->
        <div class="py-3 title d-flex align-items-center">
            <h5 class="m-0">CƠM GẠO LỨT</h5>
        </div>
        <!-- Most popular -->

        <div class="most_popular">
            <div class="row">
                @foreach($com[0]->GetProduct->take(8) as $pr)
                    @if($pr->GetCate->status == 1)
                        <div class="col-md-3 pb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">

                                    <div class="favourite-heart text-danger position-absolute">
                                        {{--                                    <form method="post" action="{{route('cart.add',['id'=>$pr->id])}}" class="buy"> @csrf--}}
                                        {{--                                        <button type="submit" class="feather-shopping-cart home bg-primary "></button>--}}
                                        {{--                                    </form>--}}
                                        <a href="{{route('cart.add',$pr->id)}}"><i
                                                class="feather-shopping-cart"></i></a>
                                    </div>
                                    <div class="member-plan position-absolute">
                                        @if($pr->Flash_Sale == 1)
                                            <span class="badge badge-warning">Giảm giá
                                    </span>
                                        @endif

                                    </div>
                                    <a href="{{route('detail.view',$pr->id)}}"
                                       style="display: inline-block; height: 165px">
                                        <img alt="#" src="{{url('/public/')}}{{$pr->img}}"
                                             class="img-fluid item-img w-100">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1 title" style="height: 30px;"><a
                                                href="{{route('detail.view',$pr->id)}}"
                                                class="text-black">{{$pr->name}}
                                            </a>
                                        </h6>
                                        @if($pr->sale_price > 0)
                                            <p>
                                                <del class="text-gray font-weight-bolder"
                                                     style="font-size: 1.1rem"> {{number_format($pr->price)}}</del>
                                                <span class="text-success font-weight-bolder"
                                                      style="font-size: 1.3rem">{{number_format($pr->sale_price) .'VNĐ'}}</span>
                                            </p>

                                        @else
                                            <p class="text-success font-weight-bolder"
                                               style="font-size: 1.3rem">
                                                {{number_format($pr->price) . 'VNĐ'}}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection
