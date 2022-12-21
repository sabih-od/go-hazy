@extends('layouts.app')
@section('content')


    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Contact us</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="contactPage">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    @foreach($faq as $key => $faqs)
                    <div class="leftOne">
                        <div class="refreshHeading text-left" data-aos="fade-up">
                            <h5>INFORMATION QUESTIONS</h5>
                            <h2>{{ $faqs->title }}</h2>
                        </div>
                        <div class="faqSec">
                            <div id="accordion">
                                <div class="card bg-yellow">

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{!! $faqs->details !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-md-6">
                    <div class="rightOne">
                        <div class="refreshHeading text-left" data-aos="fade-up">
                            <h5>INFORMATION ABOUT US</h5>
                            <h2>CONTACT US FOR ANY<br>QUESTIONS</h2>
                        </div>
                        <form class="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label>Website</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label>Number</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label>Fax</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label>Street Address</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label>Contact Us Email Address </label>
                                    <textarea></textarea>
                                    <button class="themeBtn">ASK A QUESTION</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mapSec p-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004069.896900944!2d-104.65611544442767!3d37.27565371492453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1667401638561!5m2!1sen!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
