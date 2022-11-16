@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>product detail</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">product-detail</a></li>
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
                            <div>
                                <img src="{{asset('assets/images/pro111.jpg')}}" alt="">
                            </div>
                            <div>
                                <img src="{{asset('assets/images/pro111.jpg')}}" alt="">
                            </div>
                            <div>
                                <img src="{{asset('assets/images/pro111.jpg')}}" alt="">
                            </div>
                            <div>
                                <img src="{{asset('assets/images/pro111.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="product-detail-nav">
                            <div>
                                <img class="ml-10" src="{{asset('assets/images/pro22.jpg')}}" class="" alt="">
                            </div>
                            <div>
                                <img class="ml-10" src="{{asset('assets/images/pro22.jpg')}}" alt="">
                            </div>
                            <div>
                                <img class="ml-10" src="{{asset('assets/images/pro22.jpg')}}" alt="">
                            </div>
                            <div>
                                <img class="ml-10" src="{{asset('assets/images/pro22.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prodctdetailContent">
                        <h2>NVUS PRINT
                        </h2>
                        <span>$37.95 – $167.95
                        </span>
                        <p><span>Lorem Ipsum </span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="proCounter count mr-4">
                        <span class="minus"><i class="fa fa-angle-down"></i></span>
                        <input type="text" value="1" />
                        <span class="plus"><i class="fa fa-angle-up"></i></span>
                        <div class="cartBtn">
                            <a href="{{route('front.cart')}}" class="themeBtn">Add to Cart</a>
                        </div>
                    </div>
                    <div class="sku">
                        <p>SKU: HP5PK Category: <a href="#">Patches</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




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
