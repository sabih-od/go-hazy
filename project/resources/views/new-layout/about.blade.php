@extends('new-layout.layout.app')
@section('content')
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <section class="inner-banner">
        <img src="{{asset('assets/new-layout/images/slidebg.webp')}}" class="w-100 imginer" alt="img">
        <div class="overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3>About Us</h3>
                    </div>
                    <div class="col-md-6">
                        <figure><img src="{{asset('assets/new-layout/images/slideimg.webp')}}" class="img-fluid" alt="img"></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <figure class="radius-img">
                        <img src="{{asset('assets/new-layout/images/abtimg.webp')}}" class="img-fluid" alt="img">
                    </figure>
                </div>
                <div class="col-md-6">
                    <div class="aboutpg-content">
                        <h2 class="sub-heading">About Us</h2>
                        <h3 class="heading">HAZY-BY-TONY</h3>
                        <p>Hazy-By-Tony is your one-stop shop for apparel, beauty products, accessories, consumer electronics, and many more items! </p>
                        <p>We offer the latest styles at affordable prices by blending cutting-edge design with affordability. With us, you can splurge and stock up on all your favorite items without breaking the bank.</p>
                        <p>Our philosophy is straightforward: we're serious about fashion and the quality we offer! So, let us keep you updated on the latest trends and lifestyle news and show you the hottest styles before anyone else. Keeping you in tune with the latest trends and providing exceptional and exclusive items for you is our priority at Hazy by Tony!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="abtpg-choose">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="whychose-content">
                        <h2 class="sub-heading text-white">HAZY BY TONY</h2>
                        <h3 class="heading text-white">WHY CHOOSE US?</h3>
                        <p><strong>Experience:</strong></p>
                        <p>Count on our industry expertise for professional advice, helping you steer clear of 95% of production problems and saving you valuable time and money.</p>
                        <p><strong>Professionalism:</strong></p>
                        <p>Our team comprises highly skilled staff, advanced sewing technology, and thorough work processes, ensuring top-notch product quality.</p>
                        <p><strong>Cost Management:</strong></p>
                        <p>Through careful cost control from the outset, we are able to offer our customers more competitive pricing. In this way, our customers can shop without being restricted by the budget. </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/new-layout/images/chooseimg.webp')}}" class="img-fluid" alt="img">
                </div>
            </div>
        </div>
    </section>

@endsection
