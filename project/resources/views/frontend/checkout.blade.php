@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>{{ __('Checkout') }}</h6>
                    <ul>
                        <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">{{ __('Checkout') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Begin: Step 2 -->
    <div class="checkOutStyle">
        <div class="container">
            <form class="row formStyle checkoutform" id="" action="" method="POST">
                <div class="col-md-12">
                    <div class="title inner">
                        <h2>Billing Address</h2>
                        <h4>Fill the form below to complete your purchase</h4>
                        <p class="checkout-subheading"><span>Already Registered?</span> Click here to <a
                                href="{{ route('user.login') }}" data-toggle="modal" data-target="#signIn">Login now</a>
                        </p>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="col-md-12">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="customer_name"
                           value="{{ Auth::check() ? Auth::user()->name : '' }}" {{ Auth::check() ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6">
                    <label>email address</label>
                    <input type="email" class="form-control" name="customer_email"
                           value="{{ Auth::check() ? Auth::user()->email : '' }}" {{ Auth::check() ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="customer_phone"
                           value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                </div>
                @if(!Auth::check())
                    <div class="col-md-12">
                        <div class="checkbox">
                            <input type="checkbox" id="box-1" name="pass_check">
                            <label for="box-1">Create an account for later use</label>
                        </div>
                    </div>
                    <div class="col-md-12" id="password_fields">
                        <div class="row">
                            <div class="col-md-6">
                                <label>password</label>
                                <input type="password" class="form-control" name="personal_pass">
                            </div>
                            <div class="col-md-6">
                                <label>confirm password</label>
                                <input type="password" class="form-control" name="personal_confirm">
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <input type="hidden" name="shipping" value="shipto">
                </div>
                <div class="col-md-12">
                    <label>address</label>
                    <input type="text" class="form-control" name="customer_address"
                           value="{{ Auth::check() ? Auth::user()->address : '' }}">
                </div>
                <div class="col-md-6">
                    <label>Country</label>
                    <select name="customer_country" id="country" class="form-control">
                        @include('includes.countries')
                    </select>
                </div>
                <div class="col-md-6">
                    <label>State/Province</label>
                    <input type="text" class="form-control" name="customer_state"
                           value="{{ Auth::check() ? Auth::user()->state : '' }}">
                </div>
                <div class="col-md-6">
                    <label>city</label>
                    <input type="text" class="form-control" name="customer_city"
                           value="{{ Auth::check() ? Auth::user()->city : '' }}">
                </div>
                <div class="col-md-6">
                    <label>Zip/Postal code</label>
                    <input type="text" class="form-control" name="customer_zip"
                           value="{{ Auth::check() ? Auth::user()->zip : '' }}">
                </div>

                {{--Ship to a different address start--}}
                <div class="col-md-12">
                    <div class="checkbox">
                        <input type="checkbox" id="ship_address" name="shipping_address_checked">
                        <label for="ship_address">Ship to a different address? </label>
                    </div>
                </div>

                <div class="col-md-12" id="shipping_address_form">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="shipping_address">ADDRESS</label>
                            <input type="text" class="form-control" name="shipping_address">
                        </div>
                        <div class="col-md-6">
                            <label for="">COUNTRY</label>
                            <select name="shipping_country" id="s_country"
                                    class="form-control requiredField ">
                                @include('includes.countries')
                            </select>
                            <small class="text-danger errorField" style="display: none"></small>
                        </div>
                        <div class="col-md-6">
                            <label for="">CITY</label>
                            <input type="text" name="shipping_city" id="s_city"
                                   class="form-control requiredField "
                                   value="">
                            <small class="text-danger errorField" style="display: none"></small>
                        </div>
                        <div class="col-md-6">
                            <label for="">ZIP/POSTAL CODE</label>
                            <input type="text" name="shipping_zip" id="s_zip_code"
                                   class="form-control requiredField "
                                   value="">
                            <small class="text-danger errorField" style="display: none"></small>
                        </div>
                        <div class="col-md-6">
                            <label for="">STATE/PROVINCE</label>
                            <input type="text" name="shipping_state" id="s_state"
                                   class="form-control requiredField "
                                   value="">
                            <small class="text-danger errorField" style="display: none"></small>
                        </div>
                    </div>
                </div>
                {{--Ship to a different address end--}}

                <div class="col-md-12">
                    <div class="checkbox">
                        <input type="checkbox" id="is_veteran"
                               name="is_veteran" value="is_veteran" {{ session()->has('is_veteran') ? 'checked' : '' }}
                            {{ session()->has('is_discount_coupon') ? 'disabled' : '' }}>
                        <label for="is_veteran">I am a Veteran.</label>
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" id="discount_coupon"
                               name="discount_coupon"
                               value="is_discount_coupon" {{ session()->has('is_discount_coupon') ? 'checked' : '' }}
                            {{ session()->has('is_veteran') ? 'disabled' : '' }}>
                        <label for="discount_coupon">Discount Coupon</label>
                    </div>

                    @include('frontend.includes.coupon')
                </div>

                <input type="hidden" id="shipping-cost" name="shipping_cost" value="0">
                <input type="hidden" id="packing-cost" name="packing_cost" value="0">
                <input type="hidden" id="shipping-title" name="shipping_title" value="0">
                <input type="hidden" id="packing-title" name="packing_title" value="0">
                <input type="hidden" name="dp" value="{{$digital}}">
                <input type="hidden" id="input_tax" name="tax" value="0">
                <input type="hidden" id="input_tax_type" name="tax_type" value="">
                <input type="hidden" name="totalQty" value="{{$totalQty}}">
                <input type="hidden" name="vendor_shipping_id" value="{{ $vendor_shipping_id }}">
                <input type="hidden" name="vendor_packing_id" value="{{ $vendor_packing_id }}">
                <input type="hidden" name="currency_sign" value="{{ $curr->sign }}">
                <input type="hidden" name="currency_name" value="{{ $curr->name }}">
                <input type="hidden" name="currency_value" value="{{ $curr->value }}">
                <input type="hidden" name="method" value="Cash On Delivery">
                @php
                    @endphp
                @if(Session::has('coupon_total'))
                    <input type="hidden" name="total" id="grandtotal"
                           value="{{round($totalPrice * $curr->value,2)}}">
                    <input type="hidden" id="tgrandtotal" value="{{ $totalPrice }}">
                @elseif(Session::has('coupon_total1'))
                    <input type="hidden" name="total" id="grandtotal"
                           value="{{ preg_replace("/[^0-9,.]/", "", Session::get('coupon_total1') ) }}">
                    <input type="hidden" id="tgrandtotal"
                           value="{{ preg_replace("/[^0-9,.]/", "", Session::get('coupon_total1') ) }}">
                @else
                    <input type="hidden" name="total" id="grandtotal"
                           value="{{round($totalPrice * $curr->value,2)}}">
                    <input type="hidden" id="tgrandtotal" value="{{round($totalPrice * $curr->value,2)}}">
                @endif
                <input type="hidden" id="original_tax" value="0">
                <input type="hidden" id="wallet-price" name="wallet_price" value="0">
                <input type="hidden" id="ttotal"
                       value="{{ $totalPrice }}">
                <input type="hidden" name="coupon_code" id="coupon_code"
                       value="{{ Session::has('coupon_code') ? Session::get('coupon_code') : '' }}">
                <input type="hidden" name="coupon_discount" id="coupon_discount"
                       value="{{ Session::has('coupon') ? Session::get('coupon') : '' }}">
                <input type="hidden" name="coupon_id" id="coupon_id"
                       value="{{ Session::has('coupon') ? Session::get('coupon_id') : '' }}">
                <input type="hidden" name="user_id" id="user_id"
                       value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->id : '' }}">

                <div class="payment-information mt-4">
                    <h4 class="title">
                        {{ __('Payment Info') }}
                    </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="nav flex-column" role="tablist"
                                 aria-orientation="vertical">
                                @foreach($gateways as $gt)
                                    @if($gt->type == 'manual')
                                        @if($digital == 0)
                                            <a class="nav-link payment" data-val=""
                                               data-show="{{$gt->showForm()}}"
                                               data-form="{{ $gt->showCheckoutLink() }}"
                                               data-href="{{ route('front.load.payment',['slug1' => $gt->showKeyword(),'slug2' => $gt->id]) }}"
                                               id="v-pills-tab{{ $gt->id }}-tab"
                                               data-toggle="pill"
                                               href="#v-pills-tab{{ $gt->id }}" role="tab"
                                               aria-controls="v-pills-tab{{ $gt->id }}"
                                               aria-selected="false">
                                                <div class="icon">
                                                    <span class="radio"></span>
                                                </div>
                                                <p>
                                                    {{ $gt->title }}
                                                    @if($gt->subtitle != null)
                                                        <small>
                                                            {{ $gt->subtitle }}
                                                        </small>
                                                    @endif
                                                </p>
                                            </a>
                                        @endif
                                    @else
                                        <a class="nav-link payment"
                                           data-val="{{ $gt->keyword }}"
                                           data-show="{{$gt->showForm()}}"
                                           data-form="{{ $gt->showCheckoutLink() }}"
                                           data-href="{{ route('front.load.payment',['slug1' => $gt->showKeyword(),'slug2' => $gt->id]) }}"
                                           id="v-pills-tab{{ $gt->id }}-tab"
                                           data-toggle="pill"
                                           href="#v-pills-tab{{ $gt->id }}" role="tab"
                                           aria-controls="v-pills-tab{{ $gt->id }}"
                                           aria-selected="false">
                                            <div class="icon">
                                                <span class="radio"></span>
                                            </div>
                                            <p>
                                                {{ $gt->name }}
                                                @if($gt->information != null)
                                                    <small>
                                                        {{ $gt->getAutoDataText() }}
                                                    </small>
                                                @endif
                                            </p>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="pay-area d-none">
                                <div class="tab-content" id="v-pills-tabContent">
                                    @foreach($gateways as $gt)
                                        @if($gt->type == 'manual')
                                            @if($digital == 0)
                                                <div class="tab-pane fade"
                                                     id="v-pills-tab{{ $gt->id }}"
                                                     role="tabpanel"
                                                     aria-labelledby="v-pills-tab{{ $gt->id }}-tab">
                                                </div>
                                            @endif
                                        @else
                                            <div class="tab-pane fade"
                                                 id="v-pills-tab{{ $gt->id }}"
                                                 role="tabpanel"
                                                 aria-labelledby="v-pills-tab{{ $gt->id }}-tab">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                    <button class="btnStyle" type="submit">proceed to checkout</button>
                </div>
            </form>
            {{--      @php--}}
            {{--          $data = Session::get('cart');--}}
            {{--          $total = 0;--}}
            {{--          foreach($data->items as $price)--}}
            {{--          {--}}
            {{--              $total = $total + $price['totalPrice'];--}}
            {{--          }--}}
            {{--      @endphp--}}
            @if(\App\Helpers\CartHelper::getCartTotalQty() > 0)
                <div class="col-md-12 title my-5 text-center">
                    <h2>Order Summary</h2>
                </div>
                <div class="col-md-12 order-summery">
                    <div class="row no-gutters">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Subtotal ({{ \App\Helpers\CartHelper::getCartTotalQty() }} items)</span>
                            <strong>{{ $totalPrice }} $</strong>
                            <input type="hidden" id="ttotal"
                                   value="{{ $totalPrice }}">
                        </div>
                        {{--                        <hr class="w-100">--}}
                        {{--                        <div class="col-md-12 d-flex align-items-center justify-content-between">--}}
                        {{--                            <span>Shipping fee</span>--}}
                        {{--                            <strong>USD 5.00</strong>--}}
                        {{--                        </div>--}}

                        <hr class="w-100">
                        {{--                        @php--}}
                        {{--                            $get_veteran_percentage = App\Models\VeteranDiscount::where('id', Session::get('discount_id'))->first();--}}
                        {{--                        @endphp--}}
                        {{--                        @dd(session()->get('coupon_total1'))--}}
                        <div class="col-md-12 d-flex align-items-center justify-content-between" id="discount-bar">
                            <span>Discounts</span>
                            <strong
                                id="discount_amount">{{ session()->get('coupon_deactive_total') ? 0
                                :  abs($totalPrice - $total_discount_price) }}
                                $</strong>
                            {{--                            @if(!is_null($get_veteran_percentage) && !is_null($get_veteran_percentage->percentage))--}}
                            {{--                                <strong id="discount_amount">{{ $get_veteran_percentage->percentage }}%</strong>--}}
                            {{--                            @else--}}
                            {{--                                <strong id="discount_amount">0%</strong>--}}
                            {{--                            @endif--}}
                        </div>
                        <hr class="w-100">
                        {{--                        @if(Session::has('cate_id'))--}}
                        {{--                            @php--}}
                        {{--                                $get_cate_id = Session::get('cate_id');--}}
                        {{--                                if(!is_null($get_cate_id)){--}}
                        {{--                                    $get_coupon_code =  App\Models\Coupon::where('category', $get_cate_id)->first();--}}
                        {{--                                    $show_coupon_code = $get_coupon_code ? $get_coupon_code->code : '0';--}}
                        {{--                                }--}}
                        {{--                                else {--}}
                        {{--                                    $show_coupon_code = '0';--}}
                        {{--                                }--}}
                        {{--                            @endphp--}}
                        {{--                        @endif--}}

                        {{--                        <div class="col-md-12 d-flex align-items-center justify-content-between" id="discount-bar">--}}
                        {{--                            <span>Coupon</span>--}}
                        {{--                            <strong id="discount_amount2">--}}
                        {{--                                {{ $show_coupon_code ?: 'Not Available' }}--}}
                        {{--                            </strong>--}}
                        {{--                        </div>--}}


                        {{--                        <hr class="w-100">--}}
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <strong
                                id="grand_total">
                                {{ $total_discount_price }} $

                                {{-- {{ Session::has('cart') ?--}}
                                {{--                                   Session::has('coupon') ?--}}
                                {{--                                   (App\Models\Product::convertPrice((int)(Session::get('cart')->totalPrice) - (int)Session::get('coupon'))) :--}}
                                {{--                                    App\Models\Product::convertPrice((int)Session::get('cart')->totalPrice) : '0.00' }}--}}
                            </strong>
                            {{--                            <strong--}}
                            {{--                                id="grand_total">--}}
                            {{--                                {{ Session::has('cart') ?--}}
                            {{--                                   Session::has('coupon') ?--}}
                            {{--                                   (App\Models\Product::convertPrice((Session::get('cart')->totalPrice) - Session::get('coupon'))) :--}}
                            {{--                                    App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0.00' }}--}}
                            {{--                            </strong>--}}
                        </div>
                        <hr class="w-100">
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Begin: End 2 -->

    <!-- Begin: Step 3 -->
    {{--    <div class="checkOutStyle">--}}
    {{--        <div class="container">--}}
    {{--            <form action="">--}}
    {{--                <div class="row justify-content-center">--}}
    {{--                    <div class="col-lg-12 col-md-12">--}}
    {{--                        <div class="title text-center">--}}
    {{--                            <h2>Payment Methods</h2>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-lg-8 col-md-12">--}}
    {{--                        <div class="row formStyle">--}}
    {{--                            <div class="col-md-12 mb-4 text-center">--}}
    {{--                                <img src="{{asset('assets/images/card-img.png')}}" alt="">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-6">--}}
    {{--                                <label>Card Number</label>--}}
    {{--                                <input type="text" class="form-control" placeholder="CARD NUMBER">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-6">--}}
    {{--                                <label>name on card</label>--}}
    {{--                                <input type="text" class="form-control" placeholder="CARD TITLE">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-4">--}}
    {{--                                <label>expiration date</label>--}}
    {{--                                <input type="text" class="form-control" placeholder="MM/YY">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-2">--}}
    {{--                                <label>CVV</label>--}}
    {{--                                <input type="text" class="form-control" placeholder="***">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-6">--}}
    {{--                                <div class="checkbox mt-4">--}}
    {{--                                    <input type="checkbox" id="box-2">--}}
    {{--                                    <label for="box-2"><h5>save card</h5>information is encrypted and securely--}}
    {{--                                        stored.</label>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-12 mt-4 text-center">--}}
    {{--                                <button type="submit" class="btnStyle">PLace Order</button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    @if(Session::has('cart'))--}}
    {{--        <div class="col-md-12 title my-5 text-center d-none">--}}
    {{--            <h2>Payment Info</h2>--}}
    {{--        </div>--}}
    {{--        <div class="col-md-12 order-summery d-none">--}}
    {{--            <div class="row no-gutters">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <div class="nav flex-column" role="tablist"--}}
    {{--                         aria-orientation="vertical">--}}
    {{--                        @foreach($gateways as $gt)--}}
    {{--                            @if($gt->type == 'manual')--}}
    {{--                                @if($digital == 0)--}}
    {{--                                    <a class="nav-link payment" data-val=""--}}
    {{--                                       data-show="{{$gt->showForm()}}"--}}
    {{--                                       data-form="{{ $gt->showCheckoutLink() }}"--}}
    {{--                                       data-href="{{ route('front.load.payment',['slug1' => $gt->showKeyword(),'slug2' => $gt->id]) }}"--}}
    {{--                                       id="v-pills-tab{{ $gt->id }}-tab"--}}
    {{--                                       data-toggle="pill"--}}
    {{--                                       href="#v-pills-tab{{ $gt->id }}" role="tab"--}}
    {{--                                       aria-controls="v-pills-tab{{ $gt->id }}"--}}
    {{--                                       aria-selected="false">--}}
    {{--                                        <div class="icon">--}}
    {{--                                            <span class="radio"></span>--}}
    {{--                                        </div>--}}
    {{--                                        <p>--}}
    {{--                                            {{ $gt->title }}--}}
    {{--                                            @if($gt->subtitle != null)--}}
    {{--                                                <small>--}}
    {{--                                                    {{ $gt->subtitle }}--}}
    {{--                                                </small>--}}
    {{--                                            @endif--}}
    {{--                                        </p>--}}
    {{--                                    </a>--}}
    {{--                                @endif--}}
    {{--                            @else--}}
    {{--                                <a class="nav-link payment"--}}
    {{--                                   data-val="{{ $gt->keyword }}"--}}
    {{--                                   data-show="{{$gt->showForm()}}"--}}
    {{--                                   data-form="{{ $gt->showCheckoutLink() }}"--}}
    {{--                                   data-href="{{ route('front.load.payment',['slug1' => $gt->showKeyword(),'slug2' => $gt->id]) }}"--}}
    {{--                                   id="v-pills-tab{{ $gt->id }}-tab"--}}
    {{--                                   data-toggle="pill"--}}
    {{--                                   href="#v-pills-tab{{ $gt->id }}" role="tab"--}}
    {{--                                   aria-controls="v-pills-tab{{ $gt->id }}"--}}
    {{--                                   aria-selected="false">--}}
    {{--                                    <div class="icon">--}}
    {{--                                        <span class="radio"></span>--}}
    {{--                                    </div>--}}
    {{--                                    <p>--}}
    {{--                                        {{ $gt->name }}--}}
    {{--                                        @if($gt->information != null)--}}
    {{--                                            <small>--}}
    {{--                                                {{ $gt->getAutoDataText() }}--}}
    {{--                                            </small>--}}
    {{--                                        @endif--}}
    {{--                                    </p>--}}
    {{--                                </a>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <!-- END: Step 2 -->

    <!-- Begin: End 3 -->

@endsection
@section('script')
    <script>
        $(function () {
            var mainurl = "<?php echo e(url('/')); ?>";

            // Get Selected payment gateway URL
            $('a.payment:first').addClass('active');
            $('.checkoutform').attr('action', $('a.payment:first').attr('data-form'));
            $($('a.payment:first').attr('href')).load($('a.payment:first').data('href'));

            var show = $('a.payment:first').data('show');
            if (show != 'no') {
                $('.pay-area').removeClass('d-none');
            } else {
                $('.pay-area').addClass('d-none');
            }
            $($('a.payment:first').attr('href')).addClass('active').addClass('show');

            // Hide Password and shipping Fields
            $('#password_fields').hide();
            $('#shipping_address_form').hide();

            //show password fields when create account is checked
            $('input[name="pass_check"]').on('click', function () {
                if ($(this).prop('checked')) {
                    $('#password_fields').fadeIn();
                } else {
                    $('#password_fields').hide();
                }
            });

            // Show shipping fields when ship to a diffent address is checked
            $('input[name="shipping_address_checked"]').on('click', function () {
                if ($(this).prop('checked')) {
                    $('#shipping_address_form').fadeIn();
                } else {
                    $('#shipping_address_form').hide();
                }
            });

            // Validate Coupon
            {{--$("#check-coupon-form").on('submit', function (e) {--}}
            {{--    e.preventDefault();--}}

            {{--    var val = $("#code").val();--}}
            {{--    var total = $("#total").val();--}}
            {{--    var ship = 0;--}}

            {{--    $.ajax({--}}
            {{--        type: "GET",--}}
            {{--        url: mainurl + "/carts/coupon/check",--}}
            {{--        data: {code: val, total: total, shipping_cost: ship},--}}
            {{--        success: function (data) {--}}
            {{--            console.log(data);--}}
            {{--            if (data == 0) {--}}
            {{--                toastr.error('{{__('Coupon not found')}}');--}}
            {{--                $("#code").val("");--}}
            {{--            } else if (data == 2) {--}}
            {{--                toastr.error('{{__('Coupon already have been taken')}}');--}}
            {{--                $("#code").val("");--}}
            {{--            } else {--}}
            {{--                // $("#check-coupon-form").toggle();--}}
            {{--                $("#discount-bar").removeClass('d-none');--}}
            {{--                $("#discount-bar").addClass('d-flex');--}}

            {{--                $('#grandtotal').val(data[0]);--}}
            {{--                $('#grand_total').html(data[0]);--}}
            {{--                $('#tgrandtotal').val(data[0]);--}}
            {{--                $('#coupon_code').val(data[1]);--}}
            {{--                $('#coupon_discount').val(data[2]);--}}
            {{--                $('#discount_amount').html(data[2] + '$');--}}
            {{--                if (data[4] != 0) {--}}
            {{--                    $('.dpercent').html('(' + data[4] + ')');--}}
            {{--                } else {--}}
            {{--                    $('.dpercent').html('');--}}
            {{--                }--}}
            {{--                // window.location.reload();--}}
            {{--                toastr.success("Coupon Activated");--}}
            {{--                $("#code").val("");--}}
            {{--            }--}}
            {{--        }--}}
            {{--    });--}}
            {{--    return false;--}}
            {{--});--}}
            $("#check-coupon-form button").on('click', function (e) {
                e.preventDefault();

                var val = $("#code").val();
                var total = $("#total").val();
                var ship = 0;
                var coupon_type = $('input[type="checkbox"]:checked').val()

                $.ajax({
                    type: "GET",
                    url: mainurl + "/carts/coupon/check",
                    data: {
                        code: val,
                        total: total,
                        shipping_cost: ship,
                        coupon_type: coupon_type
                    },
                    success: function (data) {
                        if (data.status === 'error') {
                            toastr.error(data.message);
                            // $("#code").val("");
                        } else if (data.status === 'success') {
                            toastr.success("Coupon Activated");
                            window.location.reload()
                            // location.reload(true);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle AJAX error, if needed
                        console.error(xhr.responseText);
                        toastr.error("Server Error!");
                    }
                });

                return false;
            });

            $('#is_veteran').on('change', function (e) {
                const check = $(this).prop('checked')
                console.log("check", check);

                if (check) {
                    $('#check-coupon-form').show()

                } else {

                    $('#check-coupon-form').hide()

                    var val = $("#code").val();
                    if (val) {
                        $.ajax({
                            type: "GET",
                            url: mainurl + "/carts/coupon/deactivate",
                            data: {
                                code: val,
                            },
                            success: function (data) {
                                if (data.status === 'error') {
                                    toastr.error(data.message);
                                    // $("#code").val("");
                                } else if (data.status === 'success') {
                                    toastr.success("Coupon Deactivated");
                                    window.location.reload()
                                    // location.reload(true);
                                }
                            },
                            error: function (xhr, status, error) {
                                // Handle AJAX error, if needed
                                console.error(xhr.responseText);
                                toastr.error("Server Error!");
                            }
                        });
                    }

                }

            })

            $('#discount_coupon').on('change', function (e) {
                const check = $(this).prop('checked')
                console.log("check", check);
                if (check) {
                    $('#check-coupon-form').show()

                } else {

                    $('#check-coupon-form').hide()

                    var val = $("#code").val();
                    if (val) {
                        $.ajax({
                            type: "GET",
                            url: mainurl + "/carts/coupon/deactivate",
                            data: {
                                code: val,
                            },
                            success: function (data) {
                                if (data.status === 'error') {
                                    toastr.error(data.message);
                                    // $("#code").val("");
                                } else if (data.status === 'success') {
                                    toastr.success("Coupon Deactivated");
                                    $total_discount_price = 0;
                                    window.location.reload()
                                    // location.reload(true);
                                }
                            },
                            error: function (xhr, status, error) {
                                // Handle AJAX error, if needed
                                console.error(xhr.responseText);
                                toastr.error("Server Error!");
                            }
                        });
                    }

                }

            })

            $('input[type="checkbox"]').click(function () {
                $('input[type="checkbox"]').not(this).prop('checked', false);
            });

        });
    </script>
@endsection
