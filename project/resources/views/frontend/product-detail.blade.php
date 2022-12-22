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
                                    <img src="{{asset('assets/images/galleries/'.$gal->photo) ?? ''}}"
                                         alt="Thumb Image"/>
                                </div>
                            @endforeach
                        </div>
                        <div class="product-detail-nav">
                            @foreach($productt->galleries as $gal)
                                <div>
                                    <img class="ml-10" src="{{asset('assets/images/galleries/'.$gal->photo) ?? ''}}"
                                         alt="Thumb Image"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prodctdetailContent">
                        <h2>{{ $productt->name ?? '' }}
                        </h2>
                        <span>${{ $productt->price ?? '' }}
                        </span>
                        <p>{{ substr($productt->details, 0, 300) }}
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
                                        <ul class="siz-list">
                                            @foreach(array_unique($productt->size) as $key => $data1)
                                                <li class="{{ $loop->first ? 'active' : '' }}"
                                                    data-key="{{ str_replace(' ','',$data1) }}">
                                                <span class="box">
                                                  {{ $data1 }}
                                                </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- PRODUCT COLOR SECTION  --}}
                                @if(!empty($productt->color))
                                    <div class="product-color">
                                        <div class="title">{{ __('Color :') }}</div>
                                        <ul class="color-list">
                                            @foreach($productt->color as $key => $data1)
                                                <li class="{{ $loop->first ? 'active' : '' }}
                                                {{ $productt->IsSizeColor($productt->size[$key]) ? str_replace(' ','',$productt->size[$key]) : ''  }} {{ $productt->size[$key] == $productt->size[0] ? 'show-colors' : '' }}">
                                                <span class="box" data-color="{{ $productt->color[$key] }}"
                                                      style="background-color: {{ $productt->color[$key] }};
                                                          width: 20px; height: 20px; border-right: 10px;">

                                                  <input type="hidden" class="size" value="{{ $productt->size[$key] }}">
                                                  <input type="hidden" class="size_qty"
                                                         value="{{ $productt->size_qty[$key] }}">
                                                  <input type="hidden" class="size_key" value="{{$key}}">
                                                  <input type="hidden" class="size_price"
                                                         value="{{ round($productt->size_price[$key] * $curr->value,2) }}">

                                                </span>
                                                </li>
                                            @endforeach
                                        </ul>
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
        </div>
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
