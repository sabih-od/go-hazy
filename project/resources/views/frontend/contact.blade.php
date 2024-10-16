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
            <div class="row justify-content-center">
                {{--                <div class="col-md-6">--}}
                {{--                    @foreach($faq as $key => $faqs)--}}
                {{--                    <div class="leftOne">--}}
                {{--                        <div class="refreshHeading text-left" data-aos="fade-up">--}}
                {{--                            <h5>INFORMATION QUESTIONS</h5>--}}
                {{--                            <h2>{{ $faqs->title }}</h2>--}}
                {{--                        </div>--}}
                {{--                        <div class="faqSec">--}}
                {{--                            <div id="accordion">--}}
                {{--                                <div class="card bg-yellow">--}}

                {{--                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"--}}
                {{--                                         data-parent="#accordion">--}}
                {{--                                        <div class="card-body">--}}
                {{--                                            <p>{!! $faqs->details !!}</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}

                <div class="col-md-6">

                    <div class="refreshHeading text-left" data-aos="fade-up">
                        {{--                            <h5>INFORMATION ABOUT US</h5>--}}
                        <h2><h2>Feel Free to Contact Us For Any <br>Questions and Queries!</h2></h2>
                        @if(session()->has('success'))
                            <p class="text-success">{{ session()->get('success') }}</p>
                        @elseif(session()->has('error'))
                            <p class="text-danger">{{ session()->get('error') }}</p>
                        @endif

                    </div>
                    <form class="contactForm" method="post" action="{{route('front.contact.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-12">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-12">
                                <label>Phone Number</label>
                                <input type="number" class="form-control" name="number" required>
                            </div>
                            <div class="col-md-12">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            {{--                                <div class="col-md-12">--}}
                            {{--                                    <label>Street Address</label>--}}
                            {{--                                    <input type="text" class="form-control">--}}
                            {{--                                </div>--}}
                            <div class="col-md-12">
                                <label>Inquiry </label>
                                <textarea type="text" name="inquiry" required></textarea>
                                <button class="themeBtn" id="submit">ASK A QUESTION</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="mapSec p-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.967410377096!2d-111.89998968453055!3d33.31966746342457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDE5JzEwLjgiTiAxMTHCsDUzJzUyLjEiVw!5e0!3m2!1sen!2sus!4v1516690469899"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">>
        </iframe>

            {{--<div style="width: 100%; overflow: hidden; height: 300px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.967410377096!2d-111.89998968453055!3d33.31966746342457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDE5JzEwLjgiTiAxMTHCsDUzJzUyLjEiVw!5e0!3m2!1sen!2sus!4v1516690469899" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>--}}
                {{--<iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004069.896900944!2d-104.65611544442767!3d37.27565371492453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1667401638561!5m2!1sen!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
    </section>



    {{--    <script>--}}
    {{--        $(document).ready(function() {--}}

    {{--            // show when page load--}}
    {{--            toastr.info('Page Loaded!');--}}

    {{--            $('#submit').click(function() {--}}
    {{--                // show when the button is clicked--}}
    {{--                toastr.success('Success');--}}

    {{--            });--}}

    {{--        });--}}
    {{--    </script>--}}

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

