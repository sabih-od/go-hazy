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
                <h5>HAZY BY TONY</h5>
                <h2>Our Blogs </h2>
                <span>Read our weekly blogs to stay updated about:</span>
                <div>
                    <ul>
                        <li>The latest trends in fashion.</li>
                        <li>How to style accessories for an elevated look?</li>
                        <li>Tips to find the perfect foundation according to your skin <type class=""></type></li>
                    </ul>
                </div>
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
                                            <span>{{ $blog->created_at->diffForHumans() }}</span>
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
                                            <a href="{{route('front.blogshow',$blog->id)}}">Continue reading</a>
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
