@extends('layout.app')


@section('content')
    <div class="osahan-checkout">
        <div class="d-none">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Checkout</h4>
            </div>
        </div>
        <!-- checkout -->

        <div class="container position-relative">
            <div class="py-5 row">
                @if($cart->total_quantity>0)
                    <div class="col-md-8 mb-3">
                        <div>
                            <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">

                                <div class="osahan-cart-item-profile bg-white p-3">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 font-weight-bold">Delivery Address</h6>
                                        <form method="POST" action="{{route('cart.checkout')}}">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-12 form-group">
                                                    <label class="form-label font-weight-bold small">Name</label>
                                                    <div class="input-group">
                                                        <input placeholder="Your name" type="text" class="form-control"
                                                               name="name" value="{{Auth::user()->name}}" required>
                                                    </div>
                                                    <div class="font-weight-bolder text-xl text-danger">
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                </div>

                                                <div class="col-md-8 form-group">
                                                    <label class="form-label font-weight-bold small">Address</label>
                                                    <div class="input-group">
                                                        <input placeholder="Your address" type="text"
                                                               class="form-control" name="addres"
                                                               value="{{Auth::user()->Address}}" required>

                                                    </div>
                                                    <div class="font-weight-bolder text-xl text-danger">
                                                        {{ $errors->first('addres') }}
                                                    </div>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <label class="form-label font-weight-bold small">Email</label>
                                                    <div class="input-group">
                                                        <input placeholder="Your address" type="email"
                                                               class="form-control" name="email"
                                                               value="{{Auth::user()->email}}" required>
                                                    </div>
                                                    <div class="font-weight-bolder text-xl text-danger">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="form-label font-weight-bold small">Phone</label>
                                                    <div class="input-group">
                                                        <input placeholder="Your number" type="number"
                                                               class="form-control" name="phone"
                                                               value="{{Auth::user()->phone}}" required>

                                                    </div>
                                                    <div class="font-weight-bolder text-xl text-danger">
                                                        {{ $errors->first('phone') }}
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$cart->total_price}}" name="total">
                                                <input type="hidden" value="{{session('voucher')}}" name="voucher">
                                                <div class="w-100 form-group">
                                                    <label class="form-label font-weight-bold small">Note</label>
                                                    <div class="input-group ">
                                                        <textarea placeholder="Enter note here"
                                                                  class="form-control w-100 "
                                                                  name="order_note"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <input type="hidden" value="{{$cart->total_price}}"
                                                   name="total_price">
                                            <button class="btn rounded btn-primary btn-lg btn-block" type="submit">
                                                Order
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div
                            class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar border-bottom">
                            <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">

                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 font-weight-bold ">This is your order</h6>

                                </div>
                            </div>
                            <div class="bg-white border-bottom py-2">

                                @foreach($cart->items as $item)
                                    <div
                                        class="gold-members d-flex align-items-center justify-content-between px-3 py-2 ">
                                        <div class="media align-items-center">
                                            <div class="mr-2 text-danger">&middot;</div>
                                            <div class="media-body">
                                                <p class="m-0">{{$item['name']}} (x{{$item['quantity']}})</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">

                                            </span>
                                            <p class="text-gray mb-0 float-right ml-2 text-muted big">
                                                {{number_format($item['quantity']*$item['price']) . ' vnđ'}}</p>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if(session('voucher') == null)
                            <div class="bg-white p-3 py-3 border-bottom clearfix">
                                <form action="{{route('cart.check_voucher',)}}" method="POST">
                                    @csrf
                                    <div class="input-group-sm mb-2 input-group">
                                        <input placeholder="Enter promo code" type="text" class="form-control"
                                               name="name">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="feather-percent"></i>
                                                APPLY
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="font-weight-bold text-danger">
                                    {{ $errors->first('name') }}
                                </div>

                            </div>
                        @endif
                        <div class="bg-white p-3 clearfix border-bottom">
                            <p class="mb-1">Item Total <span
                                    class="float-right text-dark">{{$cart->total_quantity}}</span></p>
                            <p class="mb-1">Discount Price <span class="float-right text-dark">
                                    @if(session('voucher') != null)
                                        {{'- ' . number_format(session('voucher')) . 'vnđ'}}
                                    @endif
                                </span>
                            </p>

                            <hr>
                            <h6 class="font-weight-bold mb-0">TO PAY <span
                                    class="float-right">
                                    @if(session('voucher') != null)
                                        {{$cart->total_price-session('voucher') > 0 ? number_format($cart->total_price-session('voucher')) . 'vnđ' : 0 . ' VNĐ'}}
                                    @else
                                        {{number_format($cart->total_price) .' VNĐ'}}
                                    @endif
                                </span>
                            </h6>
                        </div>
                        <div class="p-3">

                        </div>

                    </div>
                @else
                    <div class="d-none">
                        <div class="bg-primary border-bottom p-3 d-flex align-items-center mb-4">
                            <a class="toggle togglew toggle-2" href="#"><span></span></a>
                            <h4 class="font-weight-bold m-0 text-white">Not Found</h4>
                        </div>
                    </div>
                    <div class="container osahan-coming-soon py-5 d-flex justify-content-center align-items-center">
                        <div class="osahan-text text-center">
                            <div class="osahan-img px-5 pb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" id="bbc88faa-5a3b-49cf-bdbb-6c9ab11be594"
                                     data-name="Layer 1" width="w-100" viewBox="0 0 728 754.88525"
                                     class="injected-svg modal__media modal__mobile__media"
                                     data-src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/illustrations/cooking_lyxy.svg"
                                >
                                    <rect x="514.67011" y="302.6311" width="33" height="524"
                                          transform="translate(-458.65432 311.24592) rotate(-33.25976)"
                                          fill="#e6e6e6"></rect>
                                    <path
                                        d="M335.58256,171.60615l63.84438,97.34271a8.5,8.5,0,0,1-14.21528,9.32341L311.81484,166.36508a60.62682,60.62682,0,0,0-29.14936,4.78729L362.63446,293.08a8.5,8.5,0,0,1-14.21528,9.3234l-79.969-121.92766A60.62685,60.62685,0,0,0,252.44516,205.304L325.842,317.2112a8.5,8.5,0,0,1-14.21528,9.3234l-63.84438-97.3427c-1.6398,27.14157,7.20944,59.3114,26.60329,88.881,36.04421,54.95614,94.83957,80.109,131.32307,56.18052s36.8396-87.87721.79539-142.83336C387.11022,201.85046,361.13005,180.91634,335.58256,171.60615Z"
                                        transform="translate(-236 -72.55738)" fill="#e6e6e6"></path>
                                    <rect x="256" y="204" width="33" height="524" fill="#e6e6e6"></rect>
                                    <ellipse cx="272" cy="119" rx="79" ry="119" fill="#e6e6e6"></ellipse>
                                    <ellipse cx="272" cy="119" rx="65" ry="97.91139" fill="#ccc"></ellipse>
                                    <ellipse cx="364" cy="734" rx="364" ry="20.88525" fill="#e6e6e6"></ellipse>
                                    <path
                                        d="M815.26782,806.25045a1162.796,1162.796,0,0,0-412.53564,0A15.04906,15.04906,0,0,1,385,791.45826V604.55738H833V791.45826A15.04906,15.04906,0,0,1,815.26782,806.25045Z"
                                        transform="translate(-236 -72.55738)" fill="#e23744"></path>
                                    <path
                                        d="M792,466.55738a92.85808,92.85808,0,0,0-30.39526,5.0863,179.055,179.055,0,0,0-324.4441-1.63928,93.00486,93.00486,0,1,0,12.16987,174.74988,179.02647,179.02647,0,0,0,300.7481-2.16382A93.00664,93.00664,0,1,0,792,466.55738Z"
                                        transform="translate(-236 -72.55738)" fill="#e23744"></path>
                                    <path
                                        d="M421,546.55738h-2A178.40222,178.40222,0,0,1,436.24707,469.572l1.80762.85644A176.41047,176.41047,0,0,0,421,546.55738Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M779,546.55738h-2a176.52632,176.52632,0,0,0-16.29395-74.501l1.81641-.83789A178.51046,178.51046,0,0,1,779,546.55738Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M385.24121,691.52808l-.48242-1.94141c.56445-.13964,57.40332-14.09961,140.70019-21.02636,76.88086-6.39258,192.68653-7.93457,307.78516,21.02734l-.48828,1.93945C717.93945,662.63746,602.38672,664.17261,525.667,670.55054,442.519,677.46167,385.8042,691.38843,385.24121,691.52808Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M385.24121,718.52808l-.48242-1.94141c.56445-.13964,57.40332-14.09961,140.70019-21.02636,76.88086-6.39258,192.68653-7.93457,307.78516,21.02734l-.48828,1.93945C717.93945,689.63746,602.38672,691.17456,525.667,697.55054,442.519,704.46167,385.8042,718.38843,385.24121,718.52808Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M385.24121,745.52808l-.48242-1.94141c.56445-.13964,57.40332-14.09961,140.70019-21.02636,76.88086-6.39258,192.68653-7.93457,307.78516,21.02734l-.48828,1.93945C717.93945,716.63746,602.38672,718.17456,525.667,724.55054,442.519,731.46167,385.8042,745.38843,385.24121,745.52808Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M753.26693,598.71334,729.03658,590.475l23.26113-118.72871-15.992-1.45382c-15.594,11.96435-36.35984,16.65481-62.99891,13.08438l42.64542,64.45274-21.745,15.34942-69.368-83.20523A20.866,20.866,0,0,1,620,466.61227v0a20.866,20.866,0,0,1,15.0905-20.05076L709.16769,425.224l86.74466,9.69214c13.11467,19.99417,13.62744,33.89954-6.33645,37.911Z"
                                        transform="translate(-236 -72.55738)" fill="#2f2e41"></path>
                                    <path
                                        d="M728.46691,644.90106h0a15.95869,15.95869,0,0,1-13.86555-21.711l12.046-30.97551c6.11869-11.59112,14.5164-10.14011,24.43261,0l4.84611,14.21526a9.17534,9.17534,0,0,1-.53485,7.176L743.64973,636.306A15.95871,15.95871,0,0,1,728.46691,644.90106Z"
                                        transform="translate(-236 -72.55738)" fill="#2f2e41"></path>
                                    <path
                                        d="M697.15218,604.33834h0a15.95869,15.95869,0,0,1-13.86555-21.711l12.046-30.97551c6.11869-11.59113,14.51641-10.14012,24.43261,0l4.84611,14.21525a9.17537,9.17537,0,0,1-.53485,7.176L712.335,595.74331A15.9587,15.9587,0,0,1,697.15218,604.33834Z"
                                        transform="translate(-236 -72.55738)" fill="#2f2e41"></path>
                                    <circle cx="476.55994" cy="212.13062" r="27.13799" fill="#ffb9b9"></circle>
                                    <polygon
                                        points="518.721 250.415 481.406 269.799 473.652 234.907 499.336 218.915 518.721 250.415"
                                        fill="#ffb9b9"></polygon>
                                    <path
                                        d="M799.7892,439.76224c-37.23393-11.24605-71.01788-17.07317-95.46758-8.23832,8.42738-23.70818-7.12737-59.91146-24.23035-96.9214,7.37949-9.64677,19.14576-13.38347,32.46867-15.02282,14.5769,10.5844,24.74122,3.79091,32.46867-12.59978,16.85358-.67652,33.095,5.29186,48.94531,15.50743C781.58355,362.17339,783.814,401.25293,799.7892,439.76224Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M703.837,437.33921c-5.87952,3.4656-11.3058,9.30325-16.47664,16.47664-8.73817-5.349-16.42816-11.439-22.48592-18.68294a40.01122,40.01122,0,0,1-7.33032-37.42892l16.56053-53.82173a23.60967,23.60967,0,0,1,7.67755-11.38054l2.18592-1.776,21.80731,41.19159-21.80731,40.707C686.73356,420.03892,694.88267,428.6031,703.837,437.33921Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M711.343,478.37478h0a14.00455,14.00455,0,0,1-19.66674-10.71872L688.072,442.98155l12.59979-6.7845,15.9909,20.93355A14.00455,14.00455,0,0,1,711.343,478.37478Z"
                                        transform="translate(-236 -72.55738)" fill="#ffb9b9"></path>
                                    <path
                                        d="M739.94024,283.50047l-4.63369.13763-12.853-18.20724c-16.46951,1.70257-29.96494,8.858-41.38524,19.81828l-1.15795-7.71966a29.10153,29.10153,0,0,1,22.90286-32.81892h.00006a29.10153,29.10153,0,0,1,34.57213,23.6573Z"
                                        transform="translate(-236 -72.55738)" fill="#2f2e41"></path>
                                    <path
                                        d="M687.82806,453.82563v0a14.00456,14.00456,0,0,1,10.71872-19.66675l24.67452-3.60414,6.7845,12.59978L709.07224,459.1454A14.00455,14.00455,0,0,1,687.82806,453.82563Z"
                                        transform="translate(-236 -72.55738)" fill="#ffb9b9"></path>
                                    <path
                                        d="M804.49034,431.38118c-23.4754,1.82279-49.10633,9.14326-75.93837,19.527a37.12074,37.12074,0,0,0-8.23832-21.80731c24.37008-6.41874,46.48406-13.95144,60.09127-25.68417L772.1666,341.387l17.93046-20.35349,3.09274,1.6136a20.65228,20.65228,0,0,1,10.4691,13.14326c7.57071,29.449,10.93351,57.66486,8.62195,84.21782A10.47079,10.47079,0,0,1,804.49034,431.38118Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <path
                                        d="M331.88594,800.6692q-32.74851,20.483-65.49722-.01716a4.441,4.441,0,0,1-2.10125-4.0963l6.81241-88.56136h55.10049l7.78288,88.5302A4.44,4.44,0,0,1,331.88594,800.6692Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <ellipse cx="62.39599" cy="636.43883" rx="27.80438" ry="10.01827"
                                             fill="#3f3d56"></ellipse>
                                    <path d="M320.18941,705.61437q-21.73251,15.28772-42.07674,0V689.58514h42.07674Z"
                                          transform="translate(-236 -72.55738)" fill="#e23744"></path>
                                    <ellipse cx="63.15104" cy="617.02776" rx="21.03837" ry="8.01462"
                                             fill="#e23744"></ellipse>
                                    <ellipse cx="64.15287" cy="616.02594" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="73.61397" cy="616.02594" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="68.88342" cy="618.39121" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="49.96121" cy="618.39121" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="54.69176" cy="616.02594" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="59.42232" cy="619.57385" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <path
                                        d="M936.88594,800.6692q-32.74851,20.483-65.49722-.01716a4.441,4.441,0,0,1-2.10125-4.0963l6.81241-88.56136h55.10049l7.78288,88.5302A4.44,4.44,0,0,1,936.88594,800.6692Z"
                                        transform="translate(-236 -72.55738)" fill="#3f3d56"></path>
                                    <ellipse cx="667.39599" cy="636.43883" rx="27.80438" ry="10.01827"
                                             fill="#3f3d56"></ellipse>
                                    <path d="M925.18941,705.61437q-21.73251,15.28772-42.07674,0V689.58514h42.07674Z"
                                          transform="translate(-236 -72.55738)" fill="#e23744"></path>
                                    <ellipse cx="668.15104" cy="617.02776" rx="21.03837" ry="8.01462"
                                             fill="#e23744"></ellipse>
                                    <ellipse cx="669.15287" cy="616.02594" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="678.61397" cy="616.02594" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="673.88342" cy="618.39121" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="654.96121" cy="618.39121" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="659.69176" cy="616.02594" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                    <ellipse cx="664.42232" cy="619.57385" rx="2.00365" ry="1.00183"
                                             fill="#e6e6e6"></ellipse>
                                </svg>
                            </div>
                            <h2 class="text-primary mb-3 font-weight-light">There is no item in your cart!</b></h2>

                            <p class="mb-5">Go to buy here

                                <a href="{{url('/')}}" class="btn badge-danger">Go </a>
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
