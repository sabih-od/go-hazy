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
                        <h3>Contact Us</h3>
                    </div>
                    <div class="col-md-6">
                        <figure><img src="{{asset('assets/new-layout/images/slideimg.webp')}}" class="img-fluid" alt="img"></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="" class="contact-info text-center">
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        <h4>LOCATION</h4>
                        <h6 class="line">Get Location On Google map</h6>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="tel:+12345678901" class="contact-info text-center">
                        <span><i class="fas fa-phone-alt"></i></span>
                        <h4>Call us</h4>
                        <h6><strong>Phone Number:</strong> +123-4567-8901</h6>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="mailto:info@gmail.com" class="contact-info text-center">
                        <span><i class="fas fa-envelope"></i></span>
                        <h4>CONTACT</h4>
                        <h6>Email us: info@gmail.com</h6>
                    </a>
                </div>
            </div>
            <div class="contact-title my-5">
                <h3 class="heading text-center">Contact form</h3>
            </div>
            @if(session()->has('success'))
                <p class="text-success">{{ session()->get('success') }}</p>
            @elseif(session()->has('error'))
                <p class="text-danger">{{ session()->get('error') }}</p>
            @endif
            <form class="contactForm" method="post" action="{{route('front.contact.submit')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contactForm-group">
                            <input type="text" name="name" required placeholder="Full name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contactForm-group">
                            <input type="email" name="email" required placeholder="Email address">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contactForm-group">
                            <input type="tel"  name="number" required placeholder="Phone number">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contactForm-group">
                            <input type="text" name="address" required placeholder="Address">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="contactForm-group">
                            <textarea name="inquiry" placeholder="Inquiry" rows="6"></textarea>
                        </div>
                        <div class="contactForm-btn">
                            <button type="submit" class="themeBtn d-block">Ask a Question</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="map p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4551329.176174696!2d-103.46272993425949!3d40.54695586853851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1719490816923!5m2!1sen!2s" width="100%" height="612" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
