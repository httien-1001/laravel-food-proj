@extends('layout.app')
@section('title',Auth::user()->name)
@section('content')
    <div class="osahan-profile">
        <div class="d-none">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Profile</h4>
            </div>
        </div>
        <!-- profile -->


        <div class="container position-relative">
            <div class="py-5 osahan-profile row">
                <div class="col-md-4 mb-3">
                    <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                        <a href="profile.html" class="">
                            <div class="d-flex align-items-center p-3">
                                <div class="left mr-3">
                                    <img alt="#" src="{{Auth::user()->avata}}" width="80px" height="80px"
                                         class="rounded-circle">
                                </div>
                                <div class="right">
                                    <h6 class="mb-1 font-weight-bold">{{Auth::user()->name}} <i
                                            class="feather-check-circle text-success"></i></h6>
                                    <p class="text-muted m-0 small">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </a>

                        <!-- profile-details -->
                        <div class="bg-white profile-details">

                            <a href="{{route('tracking')}}" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i
                                            class="feather-truck bg-danger text-white p-2 rounded-circle mr-2"></i>
                                        Delivery </h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm p-4 bg-white">
                        <h5 class="mb-4">My account</h5>

                        <div id="edit_profile">
                            <div>
                                <form action="{{route('customer.update',Auth::id())}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{Auth::user()->avata}}" alt="Card image cap">
                                        <div class="card-body ">
                                            <input type="file" name="anh" class="btn btn-primary w-100">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName1d"
                                               value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('name') }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Địa chỉ</label>
                                        <input type="text" name="Address" class="form-control" id="exampleInputName1d"
                                               value="{{Auth::user()->Address}}">
                                    </div>
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('Address') }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNumber1">Mobile Number</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputNumber1"
                                               value="{{Auth::user()->phone}}">
                                    </div>
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('phone') }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                               value="{{Auth::user()->email}}">
                                    </div>
                                    <div class="font-bold text-xl text-red-600">
                                        {{ $errors->first('email') }}
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            <div class="additional">
                                @if(Auth::user()->login_type == 'local')
                                <div class="change_password my-3">
                                    <span id="pass"
                                          class="p-3 border rounded bg-white btn d-flex align-items-center"
                                          data-toggle="modal" data-target="#modelId">Change Password
                                        <i class="feather-arrow-right ml-auto"></i></span>
                                </div>
                                @endif
                                <div class="deactivate_account my-3">
                                    <a href="forgot_password.html"
                                       class="p-3 border rounded bg-white btn d-flex align-items-center">Deactivate
                                        Account
                                        <i class="feather-arrow-right ml-auto"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
            <div class="row">
                <div class="col">
                    <a href="home.html" class="text-dark small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
                        Home
                    </a>
                </div>
                <div class="col">
                    <a href="most_popular.html" class="text-dark small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                        Trending
                    </a>
                </div>
                <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
                    <div class="bg-danger rounded-circle mt-n0 shadow">
                        <a href="checkout.html" class="text-white small font-weight-bold text-decoration-none">
                            <i class="feather-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-heart"></i></p>
                        Favorites
                    </a>
                </div>
                <div class="col selected">
                    <a href="profile.html" class="text-danger small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-user"></i></p>
                        Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--    Modal--}}
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{route('custom.password',Auth::id())}}" id="changep">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thay đổi mật khẩu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="old">Mật khẩu cũ</label>
                            <input type="password" name="oldpass" class="form-control" id="old" required
                            >
                        </div>
                        <div class="form-group">
                            <label for="new">Mật khẩu mới</label>
                            <input type="password" name="pass" class="form-control" id="new" required
                            >
                        </div>
                        <div class="form-group" id="mess">

                        </div>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
