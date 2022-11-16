@extends('layouts.app')
@section('content')
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>create account</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">Create account</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="accountAccesSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="whitebg">
                        <h2><span>Create an Account</span></h2>
                        <form action="" class="formStyle form-row">
                            <div class="input-group">
                                <label>First Name<em>*</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group">
                                <label>Last Name<em>*</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group">
                                <label>Email Address<em>*</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group">
                                <label>Password<em>*</em></label>
                                <input type="text" class="form-control" placeholder="At least 6 characters">
                            </div>
                            <div class="input-group">
                                <label>Re-enter password<em>*</em></label>
                                <input type="text" class="form-control" placeholder="At least 6 characters">
                            </div>
                            <div class="input-group justify-content-md-end">
                                <button class="themeBtn rounded">Sign Up</button>
                            </div>
                        </form>
                        <div class="or"><span>or</span></div>
                        <ul class="list-unstyled socialIo justify-content-center mb-4">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                        <p>Already have an account? <a href="{{route('user.login.submit')}}">SignIn</a></p>
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
