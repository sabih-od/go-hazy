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
                <div class="col-md-4">
                    <div class="blogCard">
                        <figure>
                            <img src="{{asset('assets/images/blog1.jpg')}}" class="img-fluid" alt="img">
                            <span>29 <small>aug</small></span>
                        </figure>
                        <div class="blogContent">
                            <h6>Let the Sunglasses Do the Talking!</h6>
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
                            <p>Let the Sunglasses Do the Talking!
                                Without accessories, no ensemble is complete. An outfit is a
                                work-in-progress,
                                an
                                incomplete projec...</p>
                            <a href="{{route('front.blog-detail')}}">Continue reading</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blogCard">
                        <figure>
                            <img src="{{asset('assets/images/blog2.jpg')}}" class="img-fluid" alt="img">
                            <span>29 <small>aug</small></span>
                        </figure>
                        <div class="blogContent">
                            <h6>How to Find That Perfect Pair of Jeans!</h6>
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
                            <p>How to Find That Perfect Pair of Jeans!
                                It can sometimes become a bit of a hassle to go shopping for a new pair of
                                pants. The
                                problem ...</p>
                            <a href="{{route('front.blog-detail')}}">Continue reading</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blogCard">
                        <figure>
                            <img src="{{asset('assets/images/blog3.jpg')}}" class="img-fluid" alt="img">
                            <span>29 <small>aug</small></span>
                        </figure>
                        <div class="blogContent">
                            <h6>How to Find the Right Lip Shade</h6>
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
                            <p>How to Find the Right Lip Shade
                                Your beauty shopping trip could seem more like a quest than a leisurely
                                outing
                                because
                                so many distinc...</p>
                            <a href="{{route('front.blog-detail')}}">Continue reading</a>
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
