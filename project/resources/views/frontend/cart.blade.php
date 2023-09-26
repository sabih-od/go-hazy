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
                            <!-- Other input fields for size, color, and quantity -->

                            <!-- Discount logic -->
                            @php
                                $originalPrice = $product['item']->price;
                                $discountPercentage = 20; // 20% discount
                                $discountAmount = ($originalPrice * $discountPercentage) / 100;
                                $discountedPrice = $originalPrice - $discountAmount;
                            @endphp
                            <strong class="discounted-price">${{ number_format($discountedPrice, 2) }}</strong>
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
{{--                        <a href="{{count($products) != 0 ? route('front.checkout') : route('front.category' )}}"--}}
{{--                           class="btnStyle my-5">{{count($products) != 0 ? 'Proceed To Pay' : 'Shop Now'}}</a>--}}

                            @if(Session::has('cart'))
                        <button type="button" class="btnStyle my-5" data-toggle="modal" data-target="#exampleModalCenter">
                            Proceed To Pay
                        </button>
                        @else
                            <button type="button" class="btnStyle my-5">
                                Proceed To Pay
                            </button>
                        @endif


                  {{--   modal work --}}
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="radio">
                                            Are you veteran ?
                                        <form>
                                        <input type="radio" id="html" name="fav_language" value="HTML" class="click_first_number_radio">
                                        <label for="html">First member </label><br>
                                        <input type="radio" id="css" name="fav_language" value="CSS" class="click_veteran_radio">
                                        <label for="css">Veteran</label>
                                        </form>
                                        </div>
                                        <div id="email" style="display: none">
                                            <form id="email-form" action="{{ route('submit_email') }}" method="POST">
                                                @csrf
                                                <label for="email">Enter your Email</label><br>
                                                <input type="email" id="email-input" name="email" placeholder="example@gmail.com" class="form-group" required >
                                                <button type="submit" class="btn btn-primary">Submit Email</button>
                                            </form>
                                        </div>
                                        <div id="otp" style="display: none">
                                            <form id="otp-form">
                                                <label>OTP Verification</label><br>
                                                <input type="text" name="otp" id="otp-input" placeholder="6-digit number" class="form-group" required>
                                                <button type="submit"  class="btn btn-primary">Verify OTP</button>
                                            </form>
                                        </div>
                                         <h2 class="text-center show_msg"style="display: none">Please Wait</h2>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="hidden" class="btn btn-secondary cancel_btn_hide" data-dismiss="modal">Cancel</button>
{{--                                        <button type="button" id="visible" class="btn btn-primary">Proceed</button>--}}
{{--                                        <a href="{{route('front.checkout')}}" id="otp_verification" style="display: none" class="btn btn-primary">Proceed</a>--}}

                                    </div>
                                </div>
                            </div>
                        </div>

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
            // alert('hello');
            // var delete_cart = $(this).data("class");
            $(this).hide();
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
        $(document).on('click', '.minus', function () {
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
                // return false;
            } else if (qty < minimum_qty) {
                // return false;
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
                        qty : qty,
                        minimum_qty: minimum_qty,
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

    <script>
        $(document).ready(function() {
            // $("#visible").click(function() {
            //     if ($('input[name="fav_language"]:checked').val() === "CSS") {
            //         $("#email").show();
            //         $("#radio").hide();
            //         $("#visible").hide();
            //         $("#otp").hide();
            //         $("#otp_verification").show();
            //         $("#success-message").hide();
            //     } else {
            //         $("#email").show();
            //         $("#otp").hide();
            //         $("#success-message").hide();
            //     }
            // });
            //
            // $("#hidden").click(function() {
            //     $("#radio").show();
            //     $("#email").hide();
            //     $("#otp").hide()
            //     $("#otp_verification").hide();
            //     $("#success-message").hide();
            //     $("#otp_verification").hide();
            // });
            //
            // $("#otp_verification").click(function() {
            //     if ($("#email-form").is(":visible")) {
            //         $("#otp").show();
            //         $("#radio").hide();
            //         $("#email").hide();
            //         $("#visible").hide();
            //         $("#success-message").hide();
            //     }
            // });

            $('.click_first_number_radio').click(function(){
                $("#email").fadeIn();
            })
            $('.click_veteran_radio').click(function(){
                $("#email").fadeIn();
            })
            $("#email-form").submit(function(e) {
                e.preventDefault();
                var email = $("#email-input").val();
                // console.log('email', $email);

                $.ajax({
                    type: "POST",
                    url: "{{ route('submit_email') }}",
                    data: { email: email },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $("#otp").fadeIn();
                        $('#radio').hide();
                        $('#email').hide();
                    },
                    error: function(error) {
                        toastr.error(error.responseJSON.message);
                    }
                });
            });

            $("#otp-form").submit(function(e) {
                e.preventDefault();
                var otp = $("#otp-input").val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('verify_otp') }}",
                    data: { otp: otp },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $("#otp").hide();
                        // $("#visible").hide();
                        $(".cancel_btn_hide").hide();
                        // $("#otp_verification").show();
                        $(".show_msg").show();
                        // $("#success-message").show();
                        window.location.href = "{{route('front.checkout')}}";
                    },
                    error: function(error) {
                        toastr.error(error.responseJSON.message);
                    }
                });
            });
        });
    </script>

@endsection
