@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>{{ __('Product Details') }}</h6>
                    <ul>
                        <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">{{ __('Product Details') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="productDetail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="productImgMain">
                        <div class="product-detail-slider">

                            @foreach($productt->galleries as $gal)
                                <div>
                                    <img class="" src="{{asset('assets/images/galleries/'.$gal->photo) ?? ''}}"
                                         alt="Thumb Image"/>
                                </div>
                            @endforeach
                            {{--                            @if($productt->galleries == null || count($productt->galleries) == 0)--}}
                            {{--                                    <div>--}}
                            {{--                                        <img src="{{asset('assets/images/products/'.$productt->photo) ?? ''}}"--}}
                            {{--                                             alt="Thumb Image"/>--}}
                            {{--                                    </div>--}}
                            {{--                            @else--}}
                        </div>
                        <div class="product-detail-nav">
                            {{--                            @foreach($productt->galleries as $gal)--}}
                            {{--                                <div>--}}
                            {{--                                    <img class="ml-10" src="{{asset('assets/images/galleries/'.$gal->photo) ?? ''}}"--}}
                            {{--                                         alt="Thumb Image"/>--}}
                            {{--                                </div>--}}
                            {{--                                @endforeach--}}
                            @foreach($productt->galleries as $gal)
                                <div>
                                    <img class="" src="{{asset('assets/images/galleries/'.$gal->photo) ?? ''}}"
                                         alt="Thumb Image"/>
                                </div>
                            @endforeach
                            {{--                            @endif--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prodctdetailContent">
                        <h2>{{ $productt->name ?? '' }}
                        </h2>
                        <span>{{ $productt->setCurrency() ?? '' }}</span>
                        <del>{{ $productt->showPreviousPrice() ?? '' }}</del>
                        @if (round((int)$productt->offPercentage()) > 0)
                            <div class="on-sale">{{ round((int)$productt->offPercentage() )}}% Off</div>
                        @endif
                        <p>{!! $productt->details !!}
                        </p>
                    </div>
                    <form action="{{ route('product.cart.quickadd', $productt->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="proCounter">
                            <span class="minus">-</span>
                            <input class="product_qty qttotal" id="product_qty" name="quantity"
                                   value="1">
                            <span class="plus">+</span>

                            @if ($productt->stock_check == 1)
                                {{-- Product Size Option--}}
                                @if(!empty($productt->size))
                                    <div class="product-size">
                                        <p class="title">{{ __('Size :') }}</p>
                                        <select name="size" id="size" class="form-control">
                                            @foreach(array_unique($productt->size) as $key => $data1)
                                                <option value="{{ str_replace(' ','',$data1) }}">{{ $data1 }}</option>
                                                {{--                                            <input type="hidden" class="size" value="{{$data1}}">--}}
                                                {{--                                            <input type="hidden" class="size_key" value="{{$key}}">--}}
                                            @endforeach
                                        </select>
                                        {{--                                        <ul class="siz-list">--}}
                                        {{--                                            @foreach(array_unique($productt->size) as $key => $data1)--}}
                                        {{--                                                <li class="{{ $loop->first ? 'active' : '' }}"--}}
                                        {{--                                                    data-key="{{ str_replace(' ','',$data1) }}">--}}
                                        {{--                                                <span class="box">--}}
                                        {{--                                                  {{ $data1 }}--}}
                                        {{--                                                </span>--}}
                                        {{--                                                </li>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </ul>--}}
                                    </div>
                                @endif
                                {{-- PRODUCT COLOR SECTION  --}}
                                @if(!empty($productt->color))
                                    <div class="product-color">
                                        <div class="title">{{ __('Color :') }}</div>
                                        <select name="color" id="color" onChange="update()" style="border-radius: 3px;">
                                            @foreach($productt->color as $key => $color1)
                                                <option value="{{ $color1 }}"
                                                        style="background-color: {{ $color1 }};"></option>
                                            @endforeach
                                        </select>
                                        {{--                                        <ul class="color-list">--}}
                                        {{--                                            @foreach($productt->color as $key => $data1)--}}
                                        {{--                                                <li class="{{ $loop->first ? 'active' : '' }}--}}
                                        {{--                                                {{ $productt->IsSizeColor($productt->size[$key]) ? str_replace(' ','',$productt->size[$key]) : ''  }} {{ $productt->size[$key] == $productt->size[0] ? 'show-colors' : '' }}">--}}
                                        {{--                                                <span class="box" data-color="{{ $productt->color[$key] }}"--}}
                                        {{--                                                      style="background-color: {{ $productt->color[$key] }};--}}
                                        {{--                                                          width: 20px; height: 20px; border-right: 10px;">--}}

                                        {{--                                                  <input type="hidden" class="size" value="{{ $productt->size[$key] }}">--}}
                                        {{--                                                  <input type="hidden" class="size_qty"--}}
                                        {{--                                                         value="{{ $productt->size_qty[$key] }}">--}}
                                        {{--                                                  <input type="hidden" class="size_key" value="{{$key}}">--}}
                                        {{--                                                  <input type="hidden" class="size_price"--}}
                                        {{--                                                         value="{{ round($productt->size_price[$key] * $curr->value,2) }}">--}}

                                        {{--                                                </span>--}}
                                        {{--                                                </li>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </ul>--}}
                                    </div>

                                @endif
                                {{-- PRODUCT COLOR SECTION ENDS  --}}
                            @else
                                @if(!empty($productt->size_all))
                                    <div class="product-size" data-key="false">
                                        <span class="title">{{ __('Size :') }}</span>
                                        <select name="size" id="size" class="form-control">
                                            @foreach(array_unique(explode(',',$productt->size_all)) as $key => $data1)
                                                <option value="{{ str_replace(' ','',$data1) }}">{{ $data1 }}</option>
                                                {{--                                            <input type="hidden" class="size" value="{{$data1}}">--}}
                                                {{--                                            <input type="hidden" class="size_key" value="{{$key}}">--}}
                                            @endforeach
                                        </select>

                                    </div>
                                @endif
                                @if(!empty($productt->color_all))
                                    <div class="product-color" data-key="false">
                                        <div class="title">{{ __('Color :') }}</div>
                                        <select name="color" id="color" onChange="update()" style="border-radius: 3px;">
                                            @foreach(explode(',', $productt->color_all) as $key => $color1)
                                                <option value="{{ $color1 }}"
                                                        style="background-color: {{ $color1 }};"></option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            @endif
                            <input type="hidden" id="product_id" name="product_id"
                                   value="{{ $productt->id }}">
                            <div class="cartBtn">
                                <a href="javascript:;" class="btnStyle" id="addcrt">Add To Cart</a>
                            </div>
                        </div>
                    </form>
                    <div class="sku">
                        <p>SKU: {{ $productt->sku }} Category: <a href="#">{{ $productt->category->name }}</a>
                        </p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-8">
                    @foreach($productt->ratings as $product_review)
                    <div id="comments">
                        <h2 class="woocommerce-Reviews-title my-3"> {{ __('Ratings & Reviews') }}</h2>
                        <div class="reating-area">
                            <div class="stars">
                                <span id="star-rating"></span>
                                @for($i = 0; $i < $product_review->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                        </div>
                        <ul class="all-comments">
                            <li>
                                <div class="single-comment">
                                    <div class="left-area">
                                        <img
                                            src="{{ $product_review->user->photo ? asset('assets/images/users/'.$product_review->user->photo):asset('assets/images/'.$gs->user_image) }}"
                                            alt="">
                                        <div class="header-area">
                                            <div class="stars-area">
                                                <ul class="stars">
                                                    <div class="ratings">
                                                        <div class="empty-stars"></div>
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        <div class="empty-stars"></div>--}}
                                                        {{--                                                    <div class="full-stars" style="width:{{$review->rating*20}}%"></div>--}}
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-area">
                                        <div class="comment-body">
                                            <div class="nameBox">
                                                <h5 class="name">
                                                    {{ $product_review->user->name }}
                                                </h5>
                                                <p class="date">
                                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$product_review->review_date)->diffForHumans() }}
                                                </p>
                                            </div>
                                            <p>
                                                {{ $product_review->review }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach

                        @if($productt->ratings->isEmpty())
                            <p>No reviews found.</p>
                        @endif
{{--                    <p>{{ __('No Review Found.') }}</p>--}}
                    <div id="review_form_wrapper">
                        <div class="write-comment-area">
                            <div class="gocover"
                                 style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="reviewform" action="{{ route('front.review.submit') }}"
                                  data-href="{{ route('front.customerreviews',$productt->id) }}"
                                  data-side-href="{{ route('front.side.reviews',$productt->id) }}" method="post" >
                                @csrf
                                <div class="review-area">
                                    <h4 class="title">{{ __('Reviews') }}</h4>
                                    <div class="star-area">
                                        <ul class="star-list">
                                            <li class="stars" data-val="1">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="stars" data-val="2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="stars" data-val="3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="stars" data-val="4">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li class="stars active" data-val="5">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <input type="hidden" id="rating" name="rating" value="5">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                                <input type="hidden" name="product_id" value="{{ $productt->id }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                <textarea name="review" placeholder="{{ __('Write Your Review *') }}"
                                          required></textarea>
                                    </div>
                                </div>
                                @auth
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button class="btnStyle" type="submit">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                @endauth
                                @guest
                                    <a href="{{route('user.login')}}" class="btnStyle">Submit</a>
                                @endguest
                            </form>
                        </div>
                    </div>


{{--            <div class="row">--}}
{{--                <div class="col-8">--}}
{{--                    @foreach($productt->ratings as $product_review)--}}
{{--                    <div id="comments">--}}
{{--                        <h2 class="woocommerce-Reviews-title my-3"> {{ __('Ratings & Reviews') }}</h2>--}}
{{--                        <div class="reating-area">--}}
{{--                            <div class="stars">--}}
{{--                                <span id="star-rating"></span>--}}
{{--                                @for($i = 0; $i < $product_review->rating; $i++)--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                @endfor--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <ul class="all-comments">--}}
{{--                            <li>--}}
{{--                                <div class="single-comment">--}}
{{--                                    <div class="left-area">--}}
{{--                                        <img--}}
{{--                                            src="{{ $product_review->user->photo ? asset('assets/images/users/'.$product_review->user->photo):asset('assets/images/'.$gs->user_image) }}"--}}
{{--                                            alt="">--}}
{{--                                        <div class="header-area">--}}
{{--                                            <div class="stars-area">--}}
{{--                                                <ul class="stars">--}}
{{--                                                    <div class="ratings">--}}
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        <div class="empty-stars"></div>--}}
{{--                                                        --}}{{--                                                    <div class="full-stars" style="width:{{$review->rating*20}}%"></div>--}}
{{--                                                    </div>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="right-area">--}}
{{--                                        <div class="comment-body">--}}
{{--                                            <div class="nameBox">--}}
{{--                                                <h5 class="name">--}}
{{--                                                    {{ $product_review->user->name }}--}}
{{--                                                </h5>--}}
{{--                                                <p class="date">--}}
{{--                                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$product_review->review_date)->diffForHumans() }}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                            <p>--}}
{{--                                                {{ $product_review->review }}--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}

{{--                        @if($productt->ratings->isEmpty())--}}
{{--                            <p>No reviews found.</p>--}}
{{--                        @endif--}}
{{--                    <p>{{ __('No Review Found.') }}</p>--}}
{{--                    <div id="review_form_wrapper">--}}
{{--                        <div class="review-area">--}}
{{--                            <h4 class="title">{{ __('Reviews') }}</h4>--}}
{{--                            <div class="star-area">--}}
{{--                                <ul class="star-list">--}}
{{--                                    <li class="stars" data-val="1">--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="stars" data-val="2">--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="stars" data-val="3">--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="stars" data-val="4">--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="stars active" data-val="5">--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                        <i class="fas fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="write-comment-area">--}}
{{--                            <div class="gocover"--}}
{{--                                 style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">--}}
{{--                            </div>--}}
{{--                            <form id="reviewform" action="{{ route('front.review.submit') }}"--}}
{{--                                  data-href="{{ route('front.customerreviews',$productt->id) }}"--}}
{{--                                  data-side-href="{{ route('front.side.reviews',$productt->id) }}" method="post" >--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" id="rating" name="rating" value="5">--}}
{{--                                <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">--}}
{{--                                <input type="hidden" name="product_id" value="{{ $productt->id }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                <textarea name="review" placeholder="{{ __('Write Your Review *') }}"--}}
{{--                                          required></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @auth--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <button class="btnStyle" type="submit">{{ __('Submit') }}</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @endauth--}}
{{--                                @guest--}}
{{--                                    <a href="{{route('user.login')}}" class="btnStyle">Submit</a>--}}
{{--                                @endguest--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>

        // Upadte Color
        function update() {
            let select = document.querySelector('#color')
            let option = select.options[select.selectedIndex];

            select.style.backgroundColor = option.value;
            select.style.color = option.value;
        }

        $(window).on('load', function () {
            update();
        })

        // Script for Counter
        $(document).ready(function () {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input[name="quantity"]');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input[name="quantity"]');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });

            // <li class="stars" data-val="1">
            $('.stars').on('click', function () {
                $('.stars').each(function () {
                    $(this).removeClass('active');
                });

                $(this).addClass('active');
                $('#rating').val($(this).data('val'));
            })
        });

        var mainurl = "<?php echo e(url('/')); ?>";
        var sizes = "";
        var size_qty = "";
        var size_price = "";
        var size_key = "";
        var colors = "";
        var keys = "";
        var values = "";
        var prices = "";

        // Add Product To Cart
        $(document).on("click", "#addcrt", function () {
            var qty = $(".qttotal").val() ? $(".qttotal").val() : 1;
            var pid = $("#product_id").val();
            var colors = $('select[name="color"]').find(":selected").val();
            var sizes = $('select[name="size"]').find(":selected").text();

            if ($(".product-attr").length > 0) {
                values = $(".product-attr:checked")
                    .map(function () {
                        return $(this).val();
                    })
                    .get();

                keys = $(".product-attr:checked")
                    .map(function () {
                        return $(this).data("key");
                    })
                    .get();

                prices = $(".product-attr:checked")
                    .map(function () {
                        return $(this).data("price");
                    })
                    .get();

                if (!isNaN(size_qty)) {
                    if (size_qty == "0") {
                        toastr.error(lang.cart_out);
                        return false;
                    }
                } else {
                    size_qty = null;
                }
            }

            $.ajax({
                type: "GET",
                url: mainurl + "/addnumcart",
                data: {
                    id: pid,
                    qty: qty,
                    size: sizes,
                    color: colors,
                    size_qty: size_qty,
                    size_price: size_price,
                    size_key: size_key,
                    keys: keys,
                    values: values,
                    prices: prices,
                },
                success: function (data) {
                    if (data == "digital") {
                        toastr.error("Already Added To Cart");
                    } else if (data == 0) {
                        toastr.error("Out Of Stock");
                    } else if (data[3]) {
                        toastr.error(lang.minimum_qty_error + " " + data[4]);
                    } else {
                        $("#cart-count").html(data[0]);
                        $("#cart-count1").html(data[0]);
                        $(".cart-popup").load(mainurl + "/carts/view");
                        $("#cart-items").load(mainurl + "/carts/view");
                        toastr.success("Successfully Added To Cart");
                    }
                    window.location.reload();
                },
            });
        });

    </script>
@endsection
