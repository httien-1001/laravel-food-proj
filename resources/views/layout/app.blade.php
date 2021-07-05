<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <link rel="icon" type="image/png" href="img/fav.png">

    <title>Swiggiweb - @yield('title')</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="{!! asset('public//vendor/slick/slick.min.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/vendor/slick/slick-theme.min.css"/>
    <!-- Feather Icon-->
    <link href="{{url('/')}}/public/vendor/icons/feather.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{url('/')}}/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{url('/')}}/public/css/style.css" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="{{url('/')}}/public/vendor/sidebar/demo.css" rel="stylesheet">
    <style>
        .buy {
            outline: none;
            font-size: 1.75rem;
            border: none;
            color: #fff;
            font-weight: bold;
        }

        .buy:focus {
            outline: none;
        }

        .home {
            border: none;
            border-radius: 5px;
            background-color: #fff;
            font-size: 1.2rem;
            color: #fff;
            padding: 5px 10px;
        }

        .home:focus {
            outline: none;
        }

        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }
    </style>
</head>

<body class="fixed-bottom-bar">
<header class="section-header">
    <section class="header-main shadow-sm bg-white">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-1">
                    <a href="{{route('home')}}" class="brand-wrap mb-0">
                        <img alt="#" class="img-fluid" src="{{url('/')}}{{$data->logo}}">
                    </a>
                    <!-- brand-wrap.// -->
                </div>
                <div class="col-3 d-flex align-items-center m-none">
                    <div class="dropdown mr-3">
                        <div class="dropdown-menu p-0 drop-loc" aria-labelledby="navbarDropdown">
                            <div class="osahan-country">
                                <div class="search_location bg-primary p-3 text-right">
                                    <div class="input-group rounded shadow-sm overflow-hidden">
                                        <div class="input-group-prepend">
                                            <button
                                                class="border-0 btn btn-outline-secondary text-dark bg-white btn-block">
                                                <i class="feather-search"></i></button>
                                        </div>
                                        <input type="text" class="shadow-none border-0 form-control"
                                               placeholder="Enter Your Location">
                                    </div>
                                </div>
                                <div class="p-3 border-bottom">
                                    <a href="home.html" class="text-decoration-none">
                                        <p class="font-weight-bold text-primary m-0"><i class="feather-navigation"></i>
                                            New York, USA</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col.// -->
                <div class="col-8">
                    <div class="d-flex align-items-center justify-content-end pr-5 ">

                        <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal">
                            <div class="icon d-flex align-items-center">
                                <i class="feather-search h6 mr-2 mb-0"></i> <span>Search</span>
                            </div>
                        </button>
{{--                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--                            <a href="{{route('search.index')}}" class="widget-header mr-4 text-dark">--}}
{{--                                <div class="icon d-flex align-items-center">--}}
{{--                                    <i class="feather-search h6 mr-2 mb-0"></i> <span>Search</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </button>--}}

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm sản phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('search.store')}}" >
                                            @csrf
                                            <div class="input-group mb-4 mt-4">
                                                <input type="text" class="form-control form-control-lg input_search border-right-0" id="inlineFormInputGroup" value=""
                                                       name="name"
                                                >
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="btn input-group-text bg-white border_search border-left-0 text-primary"><i class="feather-search">

                                                        </i></button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- signin -->
                        @if(!Auth::check())
                            <a href="{{route('login')}}" class="py-4 widget-header mr-4 text-dark m-none ">
                                <div class="icon d-flex align-items-center">
                                    <i class="feather-user h6 mr-2 mb-0"></i> <span>Sign in</span>
                                </div>
                            </a>
                        @endif
                    <!-- my account -->
                        @if(Auth::check())
                            <div class="dropdown mr-4 m-none">
                                <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img alt="#" src="{{url('/')}}{{Auth::user()->avata}}"
                                         class="img-fluid rounded-circle header-user mr-2 header-user">
                                    Hi {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('customer.prodfile')}}">My account</a>
                                    <a class="dropdown-item" href="{{route('tracking')}}">Delivery</a>

                                    <form method="POST" action="{{route('logout')}}" class="">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Log out</button>
                                    </form>

                                </div>
                            </div>
                            <a href="{{route('cart.view')}}" class="widget-header mr-4 text-dark">
                                <div class="icon d-flex align-items-center">

                                    <i class="feather-shopping-cart h6 mr-2 mb-0"></i> <span>Cart - {{count($cart->items)}} items </span>

                                </div>
                            </a>
                            <a class="toggle" href="#">
                                <span></span>
                            </a>
                    @endif
                    <!-- signin -->

                    </div>
                    <!-- widgets-wrap.// -->
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- container.// -->
    </section>
    <!-- header-main .// -->
</header>
<div class="osahan-home-page">

    @yield('content')
</div>
<footer class="section-footer border-top bg-dark">
    <div class="container">
        <section class="footer-top padding-y py-5">
            <div class="row">
                <aside class="col-md-4 footer-about">
                    <article class="d-flex pb-3">
                        <div><img alt="#" src="{{url('/')}}{{$data->logo}}" class="logo-footer mr-3"></div>
                        <div>
                            <h6 class="title text-white">About Us</h6>
                            <p class="text-muted">{{$data->About}}</p>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank"
                                   href="{{$data->facebook}}"><i class="feather-facebook"></i></a>
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank"
                                   href="{{$data->instagram}}"><i class="feather-instagram"></i></a>
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Youtube" target="_blank"
                                   href="{{$data->youtube}}"><i class="feather-youtube"></i></a>
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank"
                                   href="{{$data->twitter}}"><i class="feather-twitter"></i></a>
                            </div>
                        </div>
                    </article>
                </aside>

            </div>
            <!-- row.// -->
        </section>
        <!-- footer-top.// -->
    </div>

</footer>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{url('/public')}}/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/public')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- slick Slider JS-->
<script type="text/javascript" src="{{url('/public')}}/vendor/slick/slick.min.js"></script>
<!-- Sidebar JS-->
<script type="text/javascript" src="{{url('/public')}}/vendor/sidebar/hc-offcanvas-nav.js"></script>
<!-- Custom scripts for all pages-->
<script type="text/javascript" src="{{url('/public')}}/js/osahan.js"></script>
<script type="text/javascript" src="{{url('/public')}}/js/input-spinner.js"></script>
<script type="text/javascript" src="{{url('/public')}}/js/simple.money.format.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    $(document).ready(function () {
        $('#changep').submit(function (event) {
            event.preventDefault();
            const ur = $(this).attr("action");
            $.ajax({
                url: ur,
                type: 'POST',
                data: {_token: '{{csrf_token()}}', oldpass: $('#old').val(), pass: $('#new').val()},
                dataType: 'json',
                success: function (data) {
                    switch (data.statusCode){
                        case 200: {
                            $('#mess').html("<span class='font-weight-bolder text-success'>Thay đổi mật khẩu thành công</span>");
                            $('.print-error-msg').css('display','none');
                            break;
                        }
                        case 404: {
                            $('#mess').html("<span class='font-weight-bolder text-danger'>Mật khẩu cũng không khớp</span>");
                            $('.print-error-msg').css('display','none');
                            break;
                        }
                        default: {
                            $('.print-error-msg').css('display','block');
                            printErrorMsg(data.error);
                            break;
                        }
                    }
                },
                error: function (ers) {
                    console.log(ers)
                }
            });
        });

        function printErrorMsg(msg) {
            $.each(msg, function (key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }

        $('.buy').submit(function (event) {
            event.preventDefault();
            const id = $(this).attr('data-targer');
            const url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'post',
                data: {_token: '{{csrf_token()}}'},
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                },
                error: function (err) {
                }
            });
        });

        $(".count-number-input").inputSpinner();
        var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        $('.price-show').each(function (index, value) {
            $(value).html(formatter.format($(value).html()));
        });

        $('.total-price').html(formatter.format($('.total-price').html()));
        $('.count-number-input').change(function () {
            const data = $(this).val();
            const id = $(this).attr('data-type');
            $.ajax({
                url: '{{route('cart.update')}}',
                type: 'post',
                data: {_token: '{{csrf_token()}}', id: id, quantity: data},
                dataType: 'json',
                success: function (data) {
                    $('.price-show').each(function (index, value) {
                        if (data.product.id == $(value).attr('data-id')) {
                            const price = data.product.quantity * data.product.price;
                            $(value).html(formatter.format(price));
                        }
                        $('.total-price').html(formatter.format(data.total));
                        console.log(data.total)
                    });
                },
                error: function (errs) {

                }
            });
        });

    });
</script>

</body>

</html>
