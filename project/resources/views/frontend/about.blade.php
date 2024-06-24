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
                        <h6>About Us</h6>
                        <h2>HAZY-BY-TONY</h2>
                        <div class="abouticonContent">
                            <p>Hazy-By-Tony is your one-stop shop for apparel, beauty products, accessories, consumer electronics, and many more items! </p>
                            <p>We offer the latest styles at affordable prices by blending cutting-edge design with affordability. With us, you can splurge and stock up on all your favorite items without breaking the bank.</p>
                            <p>Our philosophy is straightforward: we're serious about fashion and the quality we offer! So, let us keep you updated on the latest trends and lifestyle news and show you the hottest styles before anyone else. Keeping you in tune with the latest trends and providing exceptional and exclusive items for you is our priority at Hazy by Tony!</p>

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
                        <h6>HAZY BY TONY</h6>
                        <h2>WHY CHOOSE US?</h2>
                        <div class="abouticonContent">
                            <p><strong>Experience:</strong></p>
                            <p>Count on our industry expertise for professional advice, helping you steer clear of 95% of production problems and saving you valuable time and money.</p>
                            <p><strong>Professionalism:</strong></p>
                            <p>Our team comprises highly skilled staff, advanced sewing technology, and thorough work processes, ensuring top-notch product quality.</p>
                            <p><strong>Cost Management:</strong></p>
                            <p>Through careful cost control from the outset, we are able to offer our customers more competitive pricing. In this way, our customers can shop without being restricted by the budget. </p>

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
                        <h2 data-aos="fade-right">Sign Up For Our Newsletter!</h2>
                        <p data-aos="fade-up">SBy signing up for our newsletter, not only do you get 10% off your first order, but you also get to know about exciting offers, discounts, and new arrivals before others!</p>
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
