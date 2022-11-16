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
                    <div class="leftOne">
                        <div class="refreshHeading text-left" data-aos="fade-up">
                            <h5>INFORMATION QUESTIONS</h5>
                            <h2>FREQUENTLY ASKED<br>QUESTIONS</h2>
                        </div>
                        <div class="faqSec">
                            <div id="accordion">
                                <div class="card bg-yellow">
                                    <div id="headingOne ">
                                        <h5 class="mb-0 ">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne"><span>1.</span> How do I
                                                place an order?
                                                <i class="fal fa-angle-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Browse our categories to choose the one you like best. Check the products
                                                available. If it’s a clothing item, don’t forget to check your size
                                                before
                                                making the purchase. Add the item to the cart and show it away.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div id="headingTwo ">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                <span>2.</span>I have to return an item. What do I do?
                                                <i class="fal fa-angle-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <p>In case you are looking forward to a refund or return, get in touch with
                                                us.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div id="headingthre">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapsethre" aria-expanded="false"
                                                    aria-controls="collapsethre">
                                                <span>3.</span>Do you offer an exchange policy?
                                                <i class="fal fa-angle-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapsethre" class="collapse" aria-labelledby="headingthre"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <p>At the moment, we do not offer an exchange policy, but our customer
                                                satisfaction means the most to us. Please reach out to us so we can
                                                cater to
                                                you the best we can.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div id="headingfour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapsefour" aria-expanded="false"
                                                    aria-controls="collapsefour">
                                                <span>4.</span>How do I contact you?
                                                <i class="fal fa-angle-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Use our official contact information to get in touch with us.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rightOne">
                        <div class="refreshHeading text-left" data-aos="fade-up">
                            <h5>INFORMATION ABOUT US</h5>
                            <h2>CONTACT US FOR ANY<br>QUESTIONS</h2>
                        </div>
                        <form class="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Your Name</label>
                                    <input type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>Your Email</label>
                                    <input type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>Phone Number</label>
                                    <input type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>Company</label>
                                    <input type="text">
                                </div>
                                <div class="col-md-12">
                                    <label>Your Message</label>
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
