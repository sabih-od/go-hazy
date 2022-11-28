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
                        <form action="{{route('user-register-submit')}}" class="formStyle form-row" method="post">
                            @csrf
                            <div class="input-group">
                                <label>First Name<em>*</em></label>
                                <input type="text" name="fname" class="form-control">
                            </div>
                            <div class="input-group">
                                <label>Last Name<em>*</em></label>
                                <input type="text" name="lname" class="form-control">
                            </div>
                            <div class="input-group">
                                <label>Email Address<em>*</em></label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="input-group">
                                <label>Password<em>*</em></label>
                                <input type="password" name="password" class="form-control" placeholder="At least 6 characters">
                            </div>
                            <div class="input-group">
                                <label>Re-enter password<em>*</em></label>
                                <input type="password" name="cnfrm_password" class="form-control" placeholder="At least 6 characters">
                            </div>
                            <div class="input-group justify-content-md-end">
{{--                                <input type="submit" value="Sign Up" class="themeBtn rounded">--}}
                                <button class="themeBtn rounded" type="submit">Sign Up</button>
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
