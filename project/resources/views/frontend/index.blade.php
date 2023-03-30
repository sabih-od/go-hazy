@extends('layouts.app')

@section('content')

    <div class="preLoader black">
        <img src="{{asset('assets/images/min1.png')}}" alt="img">
    </div>
    <div class="preLoader white"></div>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    @if($ps->slider == 1)
        <section class="mainSlider">
            <div class="swiper-container homeSlider">
                <div class="swiper-wrapper">
                    @foreach($sliders as $data)
                        <div class="swiper-slide">
                            <div class="slide-inner bg-image">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <div class="slideContent slideOne">
                                                <h5>{{$data->subtitle_text}}</h5>
                                                <h2 class="headingOne">{{$data->title_text}}</h2>
                                                <h1 class="headingTwo">{{$data->details_text}}</h1>
                                                <a href="{{route('front.category')}}" class="themeBtn skyBtn">
                                                    see all product</a>
                                                {{--                                                <a href="{{$data->link}}" class="themeBtn skyBtn">see sale product</a>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-5 imgSet">
                                            <figure>
                                                <img src="{{asset('assets/images/sliders/'.$data->photo) ?? ''}}"
                                                     alt="img">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- end swiper-wrapper -->
                <!-- <div class="swiper-pagination"></div> -->
                <!-- end swiper-pagination -->
                <div class="swiper-button-next"><i class="fal fa-angle-right"></i></div>
                <!-- end swiper-button-next -->
                <div class="swiper-button-prev"><i class="fal fa-angle-left"></i></div>
            </div>
        </section>
    @endif


    <section class="refreshSec">
        <div class="container">
            <div class="refreshHeading" data-aos="fade-up">
                <h1>New Arrivals</h1>
                <h5>GO-HAZY</h5>
                <h2>Our Popular Products</h2>
                <h6>Looks for the season ahead</h6>
                <span>Shop Featured Categories.</span>
            </div>
            <div class="row">
                @foreach($products as $key => $item)
                    {{--                    {{ dd($category->photo) }}--}}
                    @if($key > 2)
                        @break
                    @endif
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-box" data-aos="fade-right">
                            <div class="pro-img">
                                <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}" alt="img">
                            </div>
                            <h4>{{$item->category->name ?? 'Shop'}}</h4>
                            <p>{{$item->category->count()}} Products</p>
                        </div>
                    </div>
                @endforeach
                {{--                @forelse($products as $item)--}}
                {{--                    {{ dd($item->photo) }}--}}
                {{--                    <div class="col-lg-4 col-sm-6">--}}
                {{--                        <div class="product-box" data-aos="fade-right">--}}
                {{--                            <div class="pro-img">--}}
                {{--                                <a href="#">--}}
                {{--                                    <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}" alt="img">--}}
                {{--                                </a>--}}
                {{--                            </div>--}}
                {{--                            <h4>{{$item->name ?? 'Shop'}}</h4>--}}
                {{--                            <p>{{$item->category->name ?? 'Shop'}}</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                @endforelse--}}
            </div>
        </div>
    </section>

    <section class="aboutSec">
        <img src="{{asset('assets/images/shapebg1.jpg')}}" class="img-fluid w-100 oneShape" alt="img">
        <img src="{{asset('assets/images/shapebg2.png')}}" class="img-fluid w-100 twoShape" alt="img">
        <div class="container">
            <div class="refreshHeading white" data-aos="fade-up">
                <h2>ABOUT GO-HAZY</h2>
                <h6>Elevate Your Wardrobe</h6>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12" data-aos="fade-right">
                            <div class="aboutIcon">
                                <figure>
                                    <img src="{{asset('assets/images/abouticon1.png')}}" class="img-fluid" alt="img">
                                </figure>
                                <div class="abouticonContent">
                                    <h5>Beauty & Cosmetics:</h5>
                                    <p>Be bold. Be daring. Be<br>Beautiful.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" data-aos="fade-left">
                            <div class="aboutIcon">
                                <figure>
                                    <img src="{{asset('assets/images/abouticon3.png')}}" class="img-fluid" alt="img">
                                </figure>
                                <div class="abouticonContent">
                                    <h5>Men and Women<br>Apparel:</h5>
                                    <p>Explore Your True Style.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" data-aos="fade-right">
                            <div class="aboutIcon">
                                <figure>
                                    <img src="{{asset('assets/images/abouticon2.png')}}" class="img-fluid" alt="img">
                                </figure>
                                <div class="abouticonContent">
                                    <h5>Accessories:</h5>
                                    <p>Accessorize from Head<br>to Toe.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" data-aos="fade-left">
                            <div class="aboutIcon">
                                <figure>
                                    <img src="{{asset('assets/images/abouticon5.png')}}" class="img-fluid" alt="img">
                                </figure>
                                <div class="abouticonContent">
                                    <h5>Sports &<br>Entertainment:</h5>
                                    <p>Get your hands on top-notch sports items at Antony Garcia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" data-aos="fade-right">
                            <div class="aboutIcon">
                                <figure>
                                    <img src="{{asset('assets/images/abouticon3.png')}}" class="img-fluid" alt="img">
                                </figure>
                                <div class="abouticonContent">
                                    <h5>Consumer Electronics:</h5>
                                    <p>Looking for a piece of electronics that lasts long? We’re here to get you exactly
                                        that.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 chairImg" data-aos="fade-left">
                    <figure>
                        <img src="{{asset('assets/images/aboutchair.png')}}" class="img-fluid" alt="img">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="freeDelivery about-page-delivery">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="deliveryBox red" data-aos="fade-right">
                        <div class="deliveryContent">
                            <h5>Antony’s Best Collection</h5>
                            <p>Shopping with us is as easy as it gets. We renew our collection every month to ensure
                                you get the best, latest and trendiest products at all times.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="deliveryBox purple" data-aos="fade-left">
                        <div class="deliveryContent">
                            <h5>JOIN US</h5>
                            <p>Do you have what it takes to join Antony Garcia? Reach out to us today, and let’s get to
                                work.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--BEST SELLERS FOR THE
    BEST VERSION OF YOU START--}}

    {{--<section class="proSec">
        <div class="container">
            <div class="refreshHeading" data-aos="fade-up">
                <h1>Top Tranding</h1>
                <h5>GO-HAZY</h5>
                <h2>BEST SELLERS FOR THE<br>BEST VERSION OF YOU.</h2>
                <span>Shop Best Sellers.</span>
            </div>
            <div class="row">
                @foreach($products as $key => $prod)
                    --}}{{--                    {{ dd($products) }}--}}{{--
                    @if($key > 7)
                        @break
                    @endif
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-box" data-aos="fade-right">
                            <div class="pro-img">
                                <a href="{{ route('front.product', $prod->slug) }}"><img
                                        src="{{asset('assets/images/products/'.$prod->photo) ?? ''}}" alt="img"></a>
                                <div class="overlay">
                                    <ul>
                                        <li><a href="#">
                                                <i class="far fa-search"></i></a></li>
                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                        <li><a href="{{route('front.product',$prod->slug) ?? ''}}">
                                                <i class="fal fa-shopping-cart"></i></a></li>
                                        <li><a href="#"><img src="{{asset('assets/images/compare.png') ?? ''}}"
                                                             class="img-fluid"
                                                             alt="img"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h4>{{$prod->name ?? ''}}</h4>
                            <p>{{$prod->category->name ?? ''}}</p>
                            <span>${{$prod->price ?? ''}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>--}}

    {{--BEST SELLERS FOR THE
    BEST VERSION OF YOU END--}}


    {{--SHIRT SECTION START--}}

    {{--<section class="shirtSec">
        <img src="{{asset('assets/images/orangeshpae1.png')}}" class="img-fluid w-100 oneShape" alt="img">
        <img src="{{asset('assets/images/orangeshpae2.png')}}" class="img-fluid w-100 twoShape" alt="img">
        <div class="container">
            <div class="row">
                @foreach($products as $key => $item)
                    @if($key > 4)
                        @break
                    @else
                        @if($key == 0)
                            <div class="col-md-6" data-aos="fade-right">
                                <div class="shirtBox">
                                    <figure>
                                        <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"
                                             class="img-fluid" alt="img">
                                        <a href="{{route('front.product',$item->slug) ?? ''}}">{{$item->category->name ?? 'Shop'}}</a>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @elseif($key < 3)
                                    @if($key == 1)
                                        <div class="shirtBox" data-aos="fade-left">
                                            <figure>
                                                <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"
                                                     class="img-fluid" alt="img">
                                                <a href="{{route('front.product',$item->slug)}}">{{$item->category->name ?? 'Shop'}}</a>
                                            </figure>
                                        </div>
                                    @elseif($key == 2)
                                        <div class="shirtBox" data-aos="fade-up">
                                            <figure>
                                                <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"
                                                     class="img-fluid" alt="img">
                                                <a href="{{route('front.product',$item->slug)}}">{{$item->category->name ?? 'Shop'}}</a>
                                            </figure>
                                        </div>
                            </div>
                            <div class="col-md-3">
                                @endif
                                @elseif($key < 5)
                                    @if($key == 3)
                                        <div class="shirtBox" data-aos="fade-right">
                                            <figure>
                                                <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"
                                                     class="img-fluid" alt="img">
                                                <a href="{{route('front.product',$item->slug)}}">{{$item->category->name ?? 'Shop'}}</a>
                                            </figure>
                                        </div>
                                    @else
                                        <div class="shirtBox" data-aos="fade-up">
                                            <figure>
                                                <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"
                                                     class="img-fluid" alt="img">
                                                <a href="{{route('front.product',$item->slug)}}">{{$item->category->name ?? 'Shop'}}</a>
                                            </figure>
                                        </div>
                            </div>
                        @endif
                    @endif
                    @endif
                @endforeach

                --}}{{--SHIRT SECTION 2 START--}}{{--

                --}}{{--                @foreach($products as $key => $item)--}}{{--
                --}}{{--                    --}}{{----}}{{--                    {{ dd($category->photo) }}--}}{{--
                --}}{{--                    @if($key > 2)--}}{{--
                --}}{{--                        @break--}}{{--
                --}}{{--                    @endif--}}{{--
                --}}{{--                    <div class="col-lg-4 col-sm-6">--}}{{--
                --}}{{--                        <div class="product-box" data-aos="fade-right">--}}{{--
                --}}{{--                            <div class="pro-img">--}}{{--
                --}}{{--                                <a href="#">--}}{{--
                --}}{{--                                    <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}" alt="img">--}}{{--
                --}}{{--                                </a>--}}{{--
                --}}{{--                            </div>--}}{{--
                --}}{{--                            <h4>{{$item->category->name ?? 'Shop'}}</h4>--}}{{--
                --}}{{--                            <p>{{$item->category->count()}} Products</p>--}}{{--
                --}}{{--                        </div>--}}{{--
                --}}{{--                    </div>--}}{{--
                --}}{{--                @endforeach--}}{{--

                --}}{{--<div class="col-md-6" data-aos="fade-right">
                    <div class="shirtBox">
                        <figure>
                            <img src="{{asset('assets/images/tshrt-dres.jpg')}}" class="img-fluid" alt="img">
                            <a href="{{route('front.category')}}">T-Shirt<br>Dresss</a>
                        </figure>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shirtBox" data-aos="fade-left">
                        <figure>
                            <img src="{{asset('assets/images/fancy-staf.jpg')}}" class="img-fluid" alt="img">
                            <a href="{{route('front.category')}}">Fancy<br>Staff</a>
                        </figure>
                    </div>
                    <div class="shirtBox" data-aos="fade-up">
                        <figure>
                            <img src="{{asset('assets/images/ladies-jeans.jpg')}}" class="img-fluid" alt="img">
                            <a href="{{route('front.category')}}">Ladies<br>Jeans</a>
                        </figure>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shirtBox" data-aos="fade-right">
                        <figure>
                            <img src="{{asset('assets/images/party-dres.jpg')}}" class="img-fluid" alt="img">
                            <a href="{{route('front.category')}}">Party<br>Dress</a>
                        </figure>
                    </div>
                    <div class="shirtBox" data-aos="fade-up">
                        <figure>
                            <img src="{{asset('assets/images/sport-wear.jpg')}}" class="img-fluid" alt="img">
                            <a href="{{route('front.category')}}">Sport<br>Wear</a>
                        </figure>
                    </div>
                </div>--}}{{--

                    --}}{{--SHIRT SECTION 2 END--}}{{--

            </div>
        </div>
    </section>--}}


    {{--    <section class="proSec">--}}
    {{--        <div class="container">--}}
    {{--            <div class="refreshHeading" data-aos="fade-up">--}}
    {{--                <h1>Best Sellers</h1>--}}
    {{--                <h5>GO-HAZY</h5>--}}
    {{--                <h2>BEST SELLERS FOR THE<br>BEST VERSION OF YOU.</h2>--}}
    {{--                <span>Shop Best Sellers.</span>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <div class="swiper shopSlider" data-aos="fade-right">--}}
    {{--                        <div class="swiper-wrapper">--}}
    {{--                            @foreach($products as $key => $prod)--}}
    {{--                                @if($key > 3)--}}
    {{--                                    @break--}}
    {{--                                @endif--}}
    {{--                                <div class="swiper-slide">--}}
    {{--                                    <div class="product-box">--}}
    {{--                                        <div class="pro-img">--}}
    {{--                                            <a href="#"><img--}}
    {{--                                                    src="{{asset('assets/images/products/'.$prod->photo) ?? ''}}"--}}
    {{--                                                    alt="img"></a>--}}
    {{--                                            <div class="overlay">--}}
    {{--                                                <ul>--}}
    {{--                                                    <li><a href="#"><i class="far fa-search"></i></a></li>--}}
    {{--                                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>--}}
    {{--                                                    <li><a href="{{route('front.product',$prod->slug) ?? ''}}">--}}
    {{--                                                            <i class="fal fa-shopping-cart"></i></a></li>--}}
    {{--                                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}"--}}
    {{--                                                                         class="img-fluid"--}}
    {{--                                                                         alt="img"></a>--}}
    {{--                                                    </li>--}}
    {{--                                                </ul>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                        <h4>{{$prod->name ?? ''}}</h4>--}}
    {{--                                        <p>{{$prod->category->name ?? ''}}</p>--}}
    {{--                                        <span>${{$prod->price ?? ''}}</span>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endforeach--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="swiper-button-next"></div>--}}
    {{--                    <!-- end swiper-button-next -->--}}
    {{--                    <div class="swiper-button-prev"></div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--SHIRT SECTION START--}}

    {{--CATEGORY SECTION START--}}

    {{--<section class="categorySec">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    --}}{{--                                                        {{ dd($category->products) }}--}}{{--
                    @if(count($category->subs) > 0)
                        <div class="col-md-4">
                            <div class="mainCatBox">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="btnCont">
                                                <h3 class="mainHeading">{{ $category->name ?? '' }}</h3>
                                                @if(count($category->subs) > 0)
                                                    <a href="{{ route('front.category',$category->slug) }}"
                                                       class="moreBtn">See All...</a>
                                                @else

                                                @endif
                                            </div>
                                        </div>
                                        @foreach($category->subs as $subcategory)
                                            @if($loop->iteration > 4) @break @endif
                                            <div class="col-6">
                                                <a href="{{ route('front.category', [$category->slug,$subcategory->slug]) }}"
                                                   class="catBox">
                                                    @php
                                                    $subCatImg = $subcategory->image ? asset('assets/images/categories/'.$subcategory->image):asset('assets/images/' . ('products/' . ($subcategory->products()->first() && $subcategory->products()->first()->photo ? $subcategory->products()->first()->photo : 'noimage.png')));
                                                    @endphp
                                                    <figure>
                                                        <img
                                                            src="{{ $subCatImg }}"
                                                            alt="">
                                                    </figure>
                                                    <div class="overlayContent">
                                                        <h3>{{ $subcategory->name ?? ''}}</h3>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>--}}

    {{--CATEGORY SECTION END--}}

    <section class="signupSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="refreshHeading white">
                        <h2 data-aos="fade-right">SIGN UP FOR OUR NEWSLETTER</h2>
                        <p data-aos="fade-up">Subscribe to our newsletter and get 10% off your first order –<br>Plus, be
                            the first to hear
                            about news, offers, and deals.</p>
                        <form action="" data-aos="fade-left">
                            <input type="text" placeholder="Your email address">
                            <button class="themeBtn">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blogSec">
        <div class="container">
            <div class="refreshHeading" data-aos="fade-up">
                <h1>Shoes Trends</h1>
                <h5>GO-HAZY</h5>
                <h2>FEATURED BLOGS</h2>
                <span>Stay updated with what’s in and what’s out by our blogs</span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper blogSlider" data-aos="fade-right">
                        <div class="swiper-wrapper">
                            @foreach($blogs as $blog)
                                <div class="swiper-slide">
                                    <div class="blogCard">
                                        <figure>
                                            <img src="{{asset('assets/images/blogs/'.$blog->photo) ?? ''}}"
                                                 class="img-fluid" alt="img"/>
                                            <span>29 <small>aug</small></span>
                                        </figure>
                                        <div class="blogContent">
                                            <h6>{{ $blog->title }}</h6>
                                            <div class="share">
                                                <span><i class="fal fa-share-alt"></i></span>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                    <li><a href="#"><i class="fad fa-paper-plane"></i></a></li>
                                                </ul>
                                            </div>
                                            <p>{!! substr($blog->details, 0 , 150) !!}</p>
                                            <a href="{{route('front.blog')}}">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="freeDelivery">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="deliveryBox red" data-aos="fade-right">
                        <div class="deliveryContent">
                            <h5>Free Delivery:</h5>
                            <h6>AVAIL FREE DELIVERY ON ORDERS OVER
                                $60.</h6>
                        </div>
                        <figure>
                            <img src="{{asset('assets/images/van.png')}}" class="img-fluid" alt="img">
                        </figure>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="deliveryBox purple" data-aos="fade-left">
                        <div class="deliveryContent">
                            <h5>Our Social:</h5>
                            <h6>FOLLOW US ON INSTAGRAM AND STRIKE A POSE TO BE FEATURED.</h6>
                        </div>
                        <figure>
                            <img src="{{asset('assets/images/insta.png')}}" class="img-fluid" alt="img">
                        </figure>
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
