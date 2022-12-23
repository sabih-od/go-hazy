@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Cart</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">{{ __('Cart') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- Begin: Step 1 -->
    <div class="checkOutStyle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-sm-0">
                    <div class="title">
                        <h2>Confirm Your Purchase</h2>
                    </div>
                </div>
            </div>
            <div class="row cartItemCard">
                <input type="hidden" name="cart_id" class="id" value="">
                @forelse($products as $product)
{{--                    {{ dd($product) }}--}}
                    <div class="col-md-1">
                        <img src="{{ asset('assets/images/products/'.$product['item']['photo']) }}" alt="">
                    </div>
                    <div class="col-md-5 text-left">
                        <strong>{{ $product['item']->name ?? '' }}</strong>
                        @if(!empty($product['color']))
                            <p class="m-0" style="display: flex;">
                                <strong class="color">{{ __('Color') }} :</strong>
                                <span id="color-bar"
                                      style="border: 10px solid {{$product['color'] == "" ? "white" : '#'.$product['color']}};
                                          width: 20px; height: 10px;border-radius: 50%;">
                            </span>
                            </p>
                        @endif
                        @if(!empty($product['size']))
                            <p class="m-0">
                                <strong class="color">{{ __('Size') }} : {{str_replace('-',' ',$product['size'])}}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <strong class="price">${{ $product['item']->price ?? '' }}</strong>
                    </div>
                    <div class="col-md-2">
                        <div class="proCounter">
                            <input type="hidden" class="prodid" value="{{$product['item']['id']}}">
                            <input type="hidden" class="itemid"
                                   value="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">
                            <input type="hidden" class="size_qty" value="{{$product['size_qty']}}">
                            <input type="hidden" class="size_price" value="{{$product['size_price']}}">
                            <input type="hidden" class="minimum_qty"
                                   value="{{ $product['item']['minimum_qty'] == null ? '0' : $product['item']['minimum_qty'] }}">
                            <input type="hidden" id="{{'qty' . $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}"
                                   value="{{ $product['item']['minimum_qty'] == null ? '0' : $product['item']['minimum_qty'] }}">
                            <button class="minus">-</button>
                            <input
                                data-id="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}"
                                type="text"
                                class="input-text qty text input-quantity" name="quantity[]"
                                value="{{ $product['qty'] }}" title="Qty" size="4">
                            <button class="plus quantity-up">+</button>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <strong class="price">${{ $product['price'] ?? ''}}</strong>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="remove cart-remove delete"
                           data-class="cremove{{ $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values']) }}"
                           data-href="{{ route('product.cart.remove',$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])) }}"><i
                                class="far fa-trash-alt"></i></a>
                    </div>
                @empty
                    <p class="text-danger ml-5 my-2">Product Not Found</p>
                @endforelse
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <a href="{{count($products) != 0 ? route('front.checkout') : route('front.category')}}"
                           class="btnStyle my-5">{{count($products) != 0 ? 'Proceed To Pay' : 'Shop Now'}}</a>
                    </div>
                    {{--                    <ul class="shipping-billing-col">--}}
                    {{--                        <li>--}}
                    {{--                            <p><i class="fas fa-map-marker-alt"></i> Marina, CA 93933--}}
                    {{--                                <a href="" class="edit">edit</a></p>--}}
                    {{--                        </li>--}}
                    {{--                        <li>--}}
                    {{--                            <p><i class="fas fa-phone"></i> <a href="tel:(831) 747-0564">(831) 747-0564</a> <a href="#"--}}
                    {{--                                                                                                               class="edit">edit</a>--}}
                    {{--                            </p>--}}
                    {{--                        </li>--}}
                    {{--                        <li>--}}
                    {{--                            <p><i class="fas fa-envelope"></i><a href="mailto:admin@hazycreations.com">--}}
                    {{--                                    admin@hazycreations.com</a><a href="#" class="edit">edit</a></p>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- END: Step 1 -->
@endsection
@section('script')
    <script>
        // Remove Product From Cart
        $(document).on("click", ".cart-remove", function () {
            var $selector = $(this).data("class");
            $("." + $selector).hide();
            $.get($(this).data("href"), function (data) {
                toastr.success('Successfully Remove To Cart')
                window.location.reload();
            });
        });

        var mainurl = "<?php echo e(url('/')); ?>";

        // Add quantity in the cart
        $('.plus').click(function () {
            var pid = $(this).parent().find('.prodid').val();
            var itemid = $(this).parent().find(".itemid").val();
            var size_qty = $(this).parent().find(".size_qty").val();
            var size_price = $(this).parent().find(".size_price").val();

            $.ajax({
                type: "GET",
                url: mainurl + "/addbyone",
                data: {
                    id: pid,
                    itemid: itemid,
                    size_qty: size_qty,
                    size_price: size_price,
                },
                success: function (data) {
                    // console.log(data);
                    $(".gocover").hide();
                    if (data == 0) {
                        toastr.error(lang.cart_out);
                    } else {
                        $.get(mainurl + "/carts", function (response) {
                            toastr.success('Product Added Successfully')
                            // $(".load_cart").html(response);
                            window.location.reload();
                        });
                    }
                },
            });
        });

        // Remove Quantity from cart
        $('.minus').click(function () {
            var pid = $(this).parent().find(".prodid").val();
            var itemid = $(this).parent().find(".itemid").val();
            var color = $(this).parent().find(".color").val();
            var size_qty = $(this).parent().find(".size_qty").val();
            var size_price = $(this).parent().find(".size_price").val();
            var qty = parseInt($("#qty" + itemid).val());
            var minimum_qty = $(this).parent().find(".minimum_qty").val();

            $(".gocover").show();

            if (qty < 1) {
                $("#qty" + itemid).val("1");
                $(".gocover").hide();
                return false;
            } else if (qty < minimum_qty) {
                return false;
            } else {
                $(".gocover").show();

                $("#qty" + itemid).val(qty);
                $.ajax({
                    type: "GET",
                    url: mainurl + "/reducebyone",
                    data: {
                        id: pid,
                        itemid: itemid,
                        color: color,
                        size_qty: size_qty,
                        size_price: size_price,
                    },
                    success: function (data) {
                        if (data.qty >= 1) {
                            $.get(mainurl + "/carts", function (response) {
                                // $(".load_cart").html(response);
                                toastr.success('Product Minus Successfully')
                                window.location.reload();
                            });
                        } else {
                            toastr.error('Product Must Be At Least 1')
                            window.location.reload();
                            return false;
                        }
                    },
                });
            }
        });
    </script>
@endsection
