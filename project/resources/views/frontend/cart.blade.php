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
                        <li><a href="#">cart</a></li>
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
                @forelse($products as $item)
{{--                    {{ dd($item) }}--}}
                    <div class="col-md-1">
                        <img src="{{asset('assets/images/check.jpg')}}" alt="">
                    </div>
                    <div class="col-md-6 text-left">
                        <h4>{{ $item['item']->name ?? '' }}</h4>
                    </div>
                    <div class="col-md-1">
                        <strong class="price">${{ $item['item']->price ?? '' }}</strong>
                    </div>
                    <div class="col-md-2">
                        <div class="proCounter">
                            <input type="hidden" class="prodid" value="{{$item['item']['id'] ?? ''}}">
                            <input type="hidden" class="itemid"
                                   value="{{$item['item']['id'].$item['size'] ?? ''.$item['color'].str_replace(str_split(' ,'),'',$item['values'] ?? '')}}">
                            <input type="hidden" class="size_qty" value="{{$item['size_qty'] ?? ''}}">
                            <input type="hidden" class="size_price" value="{{$item['size_price'] ?? ''}}">
                            <input type="hidden" class="minimum_qty"
                                   value="{{ $item['item']['minimum_qty'] == null ? '0' : $item['item']['minimum_qty'] ?? '' }}">
                            <span class="minus qtyminus" field='quantity'
                                  data-minus-number="{{ $item['item']->id ?? ''}}">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            <input name="quantity" id="{{ $item['item']->id ?? ''}}" value="{{ $item['qty'] ?? ''}}">
                            <span class="plus qtyplus" field='quantity' data-plus-number="{{ $item['item']->id ?? ''}}">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <strong class="price">${{ $item['price'] ?? ''}}</strong>
                    </div>
                    <div class="col-md-1">
                        <a href="{{ route('product.cart.remove',$item['item']->id.$item['size'].$item['color'].str_replace(str_split(' ,'),'',$item['values']) ?? '') }}"
                           class="delete remove-from-cart"><i
                                class="far fa-trash-alt text-danger"></i></a>
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
                    <ul class="shipping-billing-col">
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i> Marina, CA 93933
                                <a href="" class="edit">edit</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone"></i> <a href="tel:(831) 747-0564">(831) 747-0564</a> <a href="#"
                                                                                                               class="edit">edit</a>
                            </p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i><a href="mailto:admin@hazycreations.com">
                                    admin@hazycreations.com</a><a href="#" class="edit">edit</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Step 1 -->
@endsection
@section('script')
    <script>
        var mainurl = "<?php echo e(url('/')); ?>";

        //Remove Product From Cart
        $(document).on("click", ".cart-remove", function () {
            var $selector = $(this).data("class");
            $("." + $selector).hide();
            $.get($(this).data("href"), function (data) {
                window.location.reload();
            });
        });

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
                    $(".gocover").hide();
                    if (data == 0) {
                        toastr.error(lang.cart_out);
                    } else {
                        $.get(mainurl + "/carts", function (response) {
                            toastr.success('Product Added Successdully')
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
                        size_qty: size_qty,
                        size_price: size_price,
                    },
                    success: function (data) {
                        if (data.qty >= 1) {
                            $.get(mainurl + "/carts", function (response) {
                                // $(".load_cart").html(response);
                                toastr.success('Product Minus Successdully')
                                window.location.reload();
                            });
                        } else {
                            toastr.error('Product Must Be At Least 1')
                            return false;
                        }
                    },
                });
            }
        });
    </script>
@endsection
