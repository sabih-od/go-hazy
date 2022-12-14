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

    <div class="checkOutStyle">
        <div class="container">
            <form action="#" class="row justify-content-center formStyle">
                <div class="col-md-12">
                    <div class="title inner">
                        <h2>Billing Address</h2>
                        <h4>Fill the form below to complete your purchase</h4>
                        <p class="checkout-subheading"><span>Already Registered?</span> Click here to <a
                                href="{{route('user.login.submit')}}">Login now</a></p>
                    </div>
                </div>

                <!-- Start: Step 1 -->
                <div class="col-md-12">
                    <h5 class="title">
                        {{ __('Personal Information') }}
                    </h5>
                </div>
                <div class="col-md-6">
                    <label>first Name</label>
                    <input type="text" id="personal_name" class="form-control" name="personal_name"
                           placeholder="{{ __('Enter Your Name')}}"
                           value="{{ Auth::check() ? Auth::user()->name : '' }}"
                        {{Auth::check() ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6">
                    <label>Last Name</label>
                    <input type="text" id="personal_name" class="form-control" name="personal_name"
                           placeholder="{{ __('Enter Your Name')}}"
                           value="{{ Auth::check() ? Auth::user()->name : '' }}"
                        {{Auth::check() ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6">
                    <label>email address</label>
                    <input type="text" id="personal-email" class="form-control"
                           name="personal_email" placeholder="{{ __('Enter Your Email') }}"
                           value="{{ Auth::check() ? Auth::user()->email : '' }}" {{Auth::check() ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6">
                    <label>Phone</label>
                    <input type="text" id="personal-phone" class="form-control"
                           name="personal_phone" placeholder="{{ __('Phone') }}"
                           value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                </div>
                @if(!Auth::check())
                    <div class="col-md-12">
                        <div class="checkbox">
                            <input type="checkbox" id="open-pass" value="1" name="pass_check">
                            <label for="open-pass">{{ __('Create an account ?') }}</label>
                        </div>
                    </div>
                    <div class="col-lg-6 set-account-pass d-none">
                        <input type="password" name="personal_pass"
                               id="personal-pass"
                               class="form-control"
                               placeholder="{{ __('Enter Your Password') }}">
                    </div>
                    <div class="col-lg-6 set-account-pass d-none">
                        <input type="password" name="personal_confirm"
                               id="personal-pass-confirm" class="form-control"
                               placeholder="{{ __('Confirm Your Password') }}">
                    </div>
                @endif
                <div class="col-md-12">
                    <h5 class="title">
                        {{ __('Billing Details') }}
                    </h5>
                </div>
                <div class="col-md-12">
                    <label>address</label>
                    <input type="text" class="form-control" name="customer_address" placeholder="{{ __('Address') }}"
                           required="" value="{{ Auth::check() ? Auth::user()->address : '' }}">
                </div>
                <div class="col-md-6">
                    <label>Country</label>
                    <select type="text" class="form-control" id="select_country" name="customer_country"
                            required="">
                        @include('includes.countries')
                    </select>
                </div>
                <div class="col-md-6">
                    <label>city</label>
                    <input type="text" class="form-control" name="customer_city" placeholder="{{ __('City') }}"
                           required="" value="{{ Auth::check() ? Auth::user()->city : '' }}">
                </div>
                <div class="col-lg-6">
                    <label>Zip/Postal code</label>
                    <input class="form-control" type="text" name="customer_zip"
                           placeholder="{{ __('Postal Code') }}" required=""
                           value="{{ Auth::check() ? Auth::user()->zip : '' }}">
                </div>
                <div class="col-md-6 ">
                    <label>State/Province</label>
                    <select type="text" class="form-control" id="show_state" name="customer_state"></select>
                </div>

                {{--Another Address--}}
                <div class="col-lg-12 {{ $digital == 1 ? 'd-none' : '' }}">
                    <div class="checkbox">
                        <input type="checkbox" id="ship-diff-address" value="value1">
                        <label for="ship-diff-address">{{ __('Ship to a Different Address?') }}</label>
                    </div>
                    <div class="ship-diff-addres-area d-none">
                        <h5 class="title">
                            {{ __('Shipping Details') }}
                        </h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control ship_input" type="text"
                                       name="shipping_name" id="shippingFull_name"
                                       placeholder="{{ __('Full Name') }}">
                                <input type="hidden" name="shipping_email" value="">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control ship_input" type="text"
                                       name="shipping_phone" id="shipingPhone_number"
                                       placeholder="{{ __('Phone Number') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control ship_input" type="text"
                                       name="shipping_address" id="shipping_address"
                                       placeholder="{{ __('Address') }}">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control ship_input" type="text"
                                       name="shipping_zip"
                                       id="shippingPostal_code"
                                       placeholder="{{ __('Postal Code') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control ship_input" type="text"
                                       name="shipping_city" id="shipping_city"
                                       placeholder="{{ __('City') }}">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control ship_input" type="text"
                                       name="shipping_state"
                                       id="shipping_state" placeholder="{{ __('State') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <select class="form-control ship_input" name="shipping_country">
                                    @include('partials.user.countries')
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Step 1 -->

                <!-- Start: Step 2 -->
                <div class="col-md-6">
                    <div class="row order-summery no-gutters">
                        <div class="col-md-12 title my-5 text-center">
                            <h2>Order Summary</h2>
                        </div>
                        @foreach($products as $item)
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Subtotal ({{ $item['qty'] }} items)</span>
                            <strong>USD {{ $item['price'] }}.00</strong>
                        </div>
                        @endforeach
                        <hr class="w-100">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Tax</span>
                            <strong>USD 0.00</strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12">
                            <div class="applyCoupon cupon-box" >
                                <div id="coupon-link">
                                    <img src="{{ asset('assets/front/images/tag.png') }}">
                                </div>
                                <form id="check-coupon-form" class="coupon">
                                    <input type="text" class="form-control"
                                           placeholder="{{ __('Coupon Code') }}"
                                           id="code" required=""
                                           autocomplete="off">
                                    <button type="submit" class="btnStyle btn-block">{{ __('Apply') }}</button>
                                </form>
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Discount</span>
                            <strong>USD 0.00</strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <strong>USD 0.00</strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 text-center mt-4">
                            <button type="submit" class="btnStyle">proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END: Step 2 -->

    <!-- START: Step 3 -->
    <div class="checkOutStyle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="title text-center">
                        <h2>Payment Methods</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <form class="row formStyle">
                        <div class="col-md-12 mb-4 text-center">
                            <img src="{{asset('assets/images/card-img.png')}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <label>Card Number</label>
                            <input type="text" class="form-control" placeholder="CARD NUMBER">
                        </div>
                        <div class="col-md-6">
                            <label>name on card</label>
                            <input type="text" class="form-control" placeholder="CARD TITLE">
                        </div>
                        <div class="col-md-4">
                            <label>expiration date</label>
                            <input type="text" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="col-md-2">
                            <label>CVV</label>
                            <input type="text" class="form-control" placeholder="***">
                        </div>
                        <div class="col-md-6">
                            <div class="checkbox mt-4">
                                <input type="checkbox" id="box-2">
                                <label for="box-2"><h5>save card</h5>information is encrypted and securely
                                    stored.</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 text-center">
                            <button class="btnStyle">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Step 3 -->

@endsection
@section('script')
    <script>
        // Password Checking

        $("#open-pass").on("change", function () {
            if (this.checked) {
                $('.set-account-pass').removeClass('d-none');
                $('.set-account-pass input').prop('required', true);
                $('#personal-email').prop('required', true);
                $('#personal-name').prop('required', true);
            } else {
                $('.set-account-pass').addClass('d-none');
                $('.set-account-pass input').prop('required', false);
                $('#personal-email').prop('required', false);
                $('#personal-name').prop('required', false);

            }
        });

        // Password Checking Ends

        // Shipping Address Checking


        $("#ship-diff-address").on("change", function () {
            if (this.checked) {
                $('.ship-diff-addres-area').removeClass('d-none');
                $('.ship-diff-addres-area input, .ship-diff-addres-area select').prop('required', true);
            } else {
                $('.ship-diff-addres-area').addClass('d-none');
                $('.ship-diff-addres-area input, .ship-diff-addres-area select').prop('required', false);
            }

        });


        // Shipping Address Checking Ends

    </script>
@endsection
