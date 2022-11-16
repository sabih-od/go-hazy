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
                <div class="col-md-1">
                    <img src="{{asset('assets/images/check.jpg')}}" alt="">
                </div>
                <div class="col-md-6 text-left">
                    <h4>antony</h4>
                </div>
                <div class="col-md-2">
                    <strong class="price">$37.95</strong>
                </div>
                <div class="col-md-2">
                    <div class="proCounter">
                        <span class="minus">-</span>
                        <input type="text" value="1" />
                        <span class="plus">+</span>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="#" class="delete"><i class="far fa-trash-alt"></i></a>
                </div>
            </div>
            <div class="row cartItemCard">
                <div class="col-md-1">
                    <img src="{{asset('assets/images/check.jpg')}}" alt="">
                </div>
                <div class="col-md-6 text-left">
                    <h4>antony print </h4>
                </div>
                <div class="col-md-2">
                    <strong class="price">$37.95</strong>
                </div>
                <div class="col-md-2">
                    <div class="proCounter">
                        <span class="minus">-</span>
                        <input type="text" value="1" />
                        <span class="plus">+</span>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="#" class="delete"><i class="far fa-trash-alt"></i></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <a href="{{route('front.checkout')}}" class="btnStyle my-5">Proceed To Pay</a>
{{--                        <button class="btnStyle my-5" onclick="window.location.href='{{route('front.checkout')}}'">Proceed To Pay</button>--}}
                    </div>
                    <ul class="shipping-billing-col">
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i> Marina, CA 93933
                                <a href="" class="edit">edit</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone"></i> <a href="tel:(831) 747-0564">(831) 747-0564</a> <a href="#" class="edit">edit</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i><a href="mailto:admin@hazycreations.com">  admin@hazycreations.com</a><a href="#" class="edit">edit</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Step 1 -->



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
