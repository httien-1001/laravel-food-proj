@extends('layout.app')
@section('title', $pro->name)
@section('content')
    <div class="d-none">
        <div class="bg-primary p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Osahan Bar</h4>
        </div>
    </div>
    <div class="offer-section py-4">
        <div class="container position-relative">
            <img alt="#" src="{{url('/public/')}}{{$pro->img}}" class="restaurant-pic">
            <div class="pt-3 text-white">
                <h2 class="font-weight-bold">{{$pro->name}}</h2>
                <div class="rating-wrap d-flex align-items-center mt-2">
                    <ul class="rating-stars list-unstyled">
                        <li>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star"></i>
                        </li>
                    </ul>

                    <p class="label-rating text-white ml-2 small"> (245 Reviews)</p>
                </div>
            </div>
            <div class="pb-4">
                <div class="row">
                    <div class="col-6 col-md-2">
                        <p class="text-white-50 font-weight-bold m-0 small">Delivery</p>
                        <p class="text-white m-0">Free</p>
                    </div>
                    <div class="col-6 col-md-2">
                        <p class="text-white-50 font-weight-bold m-0 small">Open time</p>
                        <p class="text-white m-0">8:00 AM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="p-3 bg-primary bg-primary mt-n3 rounded position-relative">
            <div class="d-flex align-items-center justify-content-between">
                <div class="feather_icon font-weight-bolder text-white">
                    <h3>{{number_format($pro->price) . ' VNĐ'}}</h3>
                </div>
                <div class="feather_icon font-weight-bolder text-white">
                    <a href="{{route('cart.add',$pro->id)}}"><i
                            class="feather-shopping-cart buy bg-primary"></i></a>
{{--                    <form method="post" action="{{route('add.cart',$pro->id)}}" class="buy">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="feather-shopping-cart buy bg-primary "--}}
{{--                        ></button>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="">
            <p class="font-weight-bold pt-4 m-0">Món ăn cùng chuyên mục</p>
            <!-- slider -->
            <div class="trending-slider rounded">
                @if($cat != null)
                    @foreach($cat as $cats)
                        <div class="osahan-slider-item">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <a href="{{route('detail.view',$cats->id)}}">
                                        <img alt="{{$cats->name}}" src="{{url('/public/')}}{{$cats->img}}"
                                             class="img-fluid item-img w-100">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1"><a href="{{route('detail.view',$cats->id)}}"
                                                            class="text-black">{{$cats->name}}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Menu -->
    <div class="container position-relative">
        <div class="row">
            <div class="col-md-12 pt-3">
                <div class="mb-3">
                    <div class="bg-white pt-3 pl-3 pr-3 mb-3 restaurant-detailed-ratings-and-reviews shadow-sm rounded">

                        <h6 class="mb-1">Đánh giá về sản phẩm này</h6>
                        <?php $count=1 ?>
                        @if(count($reviews)>0)
                            @foreach($reviews as $review)
                            <div class="reviews-members pt-3">
                                <div class="media-body">
                                    <div class="reviews-members-header">
                                            <h6 class="mb-0"><a class="text-dark" href="#">Đánh giá #{{$count++}}</a></h6>
                                            <p class="text-muted small">Ngày: {{date_format($review->created_at,'d-m-y')}}</p>
                                    </div>
                                    <div class="reviews-members-body pb-3">
                                        <span>{{$review->content}}</span>
                                    </div>
                                </div>

                            </div>
                                <hr>
                            @endforeach
                        @else
                            <div class="reviews-members py-3">
                                <span>Sản phẩm này chưa có đánh giá</span>
                            </div>
                        @endif
                    </div>
                    @if(Auth::check())
                    <div class="bg-white p-3 rating-review-select-page rounded shadow-sm">
                        <h6 class="mb-3">Để lại đánh giá</h6>

                        <form action="{{route('review.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$pro->id}}">

                            <div class="form-group">
                                <label class="form-label small">Đánh giá của bạn</label>
                                <textarea class="form-control" name="review"></textarea></div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block"> Gửi đánh giá</button>
                            </div>
                        </form>
                    </div>
                    @else
                        <div class="bg-white p-3 rating-review-select-page rounded shadow-sm">
                            <h6>Vui lòng đăng nhập <a href="{{route('login')}}">tại đây </a>  để đánh giá sản phẩm</h6>

                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
