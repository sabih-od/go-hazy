@extends('layouts.app')
@section('content')
    <!--' <div class="preLoader black">
        <img src="images/min1.png" alt="img">
    </div>
    <div class="preLoader white"></div> '-->

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>{{ $page->title }}</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">{{ $page->slug }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="privacyPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! html_entity_decode($page->details) !!}
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
