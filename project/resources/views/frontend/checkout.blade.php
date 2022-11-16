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

    <!-- Begin: Step 2 -->
    <div class="checkOutStyle">
        <div class="container">
            <form action="{{route('front.checkout')}}" class="row justify-content-center formStyle">
                <div class="col-md-12">
                    <div class="title inner">
                        <h2>Billing Address</h2>
                        <h4>Fill the form below to complete your purchase</h4>
                        <p class="checkout-subheading"><span>Already Registered?</span> Click here to <a href="{{route('user.login.submit')}}">Login now</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>first Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>email address</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Phone</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>password</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>confirm password</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-12">
                    <label>address</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Country</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>city</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Zip/Postal code</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>State/Province</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-12">
                    <div class="checkbox">
                        <input type="checkbox" id="box-1">
                        <label for="box-1">Create an account for later use</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkbox">
                        <input type="checkbox" id="box-2">
                        <label for="box-2">Ship to the same address mentioned above </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row order-summery no-gutters">
                        <div class="col-md-12 title my-5 text-center">
                            <h2>Order Summary</h2>
                        </div>
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Subtotal (3 items)</span>
                            <strong>USD 75.00</strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Shipping fee</span>
                            <strong>USD 5.00</strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12">
                            <div class="applyCoupon">
                                <input type="text" class="form-control" placeholder="Enter Voucher Code">
                                <button class="btnStyle btn-block">Apply</button>
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <strong>USD 80.00</strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 text-center mt-4">
                            <a href="#" class="btnStyle">proceed to checkout</a>
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
                                <label for="box-2"><h5>save card</h5>information is encrypted and securely stored.</label>
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

    <!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section> -->


@endsection
