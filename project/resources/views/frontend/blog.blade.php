@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Blog</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">Blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="blogSec blogPage">
        <div class="container">
            <div class="refreshHeading" data-aos="fade-up">
                <h1>Shoes Trends</h1>
                <h5>ANTONY GARCIA</h5>
                <h2>FEATURED BLOGS</h2>
                <span>Stay updated with what’s in and what’s out by our blogs</span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper blogSlider" data-aos="fade-right">
                        <div class="swiper-wrapper">
                            @foreach($blogs as $blog)
                                <div class="swiper-slide">
                                    <div class="blogCard my-5">
                                        <figure>
                                            <img src="{{ asset('assets/images/blogs/'.$blog->photo) ?? '' }}"
                                                 class="img-fluid" alt="img">
                                            <span>29 <small>aug</small></span>
                                        </figure>
                                        <div class="blogContent">
                                            <h6>{{$blog->title ?? ''}}</h6>
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
                                            <p>{!! substr($blog->details, 0, 150) ?? '' !!}</p>
                                            <a href="{{route('front.blog')}}">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
