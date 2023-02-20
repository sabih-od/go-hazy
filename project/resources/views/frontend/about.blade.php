@extends('layouts.app')
@section('content')

    <!-- <div class="preLoader black">
        <img src="images/min1.png" alt="img">
    </div>
    <div class="preLoader white"></div> -->

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>About</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="aboutSec about-page">
        <img src="{{asset('assets/images/purpleshapedown.png')}}" class="img-fluid w-100 purpleshapedouwm" alt="img">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-left">
                    <figure>
                        <img src="{{asset('assets/images/about.jpg')}}" class="img-fluid w-100" alt="img">
                    </figure>
                </div>
                <div class="col-md-5">
                    <div class="refreshHeading white" data-aos="fade-up">
                        <h6>GO-HAZY</h6>
                        <h2>ABOUT STORE</h2>
                        <div class="abouticonContent">
                            <p>Go-Hazy is your go-to firm for apparel, beauty products, accessories, and consumer
                                electronics.</p>
                            <p>By combining cutting-edge design with an affordable price tag, we bring you the newest
                                styles
                                at an affordable price. </p>
                            <p>Our philosophy is pretty simple; we take fashion seriously. Let us keep you up to date
                                with
                                the latest trends and lifestyle news and show you the hottest styles before your
                                friends.
                                Keeping up with the latest trends is what we strive to provide for you. 24/7.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shirtSec about-page-end">
        <img src="{{asset('assets/images/organe-top.png')}}" class="img-fluid w-100 orangetop" alt="img">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="refreshHeading white" data-aos="fade-up">
                        <h6>GO-HAZY</h6>
                        <h2>WHY CHOOSE US?</h2>
                        <div class="abouticonContent">
                            <p><strong>Experience:</strong></p>
                            <p>With the help of our experience in this industry, we can provide you with professional
                                advice and avoid 95% of production problems, saving you time and cost.</p>
                            <p><strong>Professional:</strong></p>
                            <p>We host high-quality staff, skilled sewing technology, and rigorous treatment of work,
                                which is a process guarantee for product quality.</p>
                            <p><strong>Cost Control:</strong></p>
                            <p>By controlling the cost of expenditure from the source, you will be able to provide
                                yourself with more competitive pricing.</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <figure>
                        <img src="{{asset('assets/images/why-chose.png')}}" class="img-fluid w-100" alt="img">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="signupSec aboutSignup">
        <img src="{{asset('assets/images/newsleterimg.png')}}" class="img-fluid" alt="img">
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
