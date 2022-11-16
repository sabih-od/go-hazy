@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>sign in </h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">sign in</a></li>
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
                        <h2><span>Welcome back!</span>Sign in to your account</h2>
                        <form action="" class="formStyle form-row">
                            <div class="input-group">
                                <label>Email or Mobile<em>*</em></label>
                                <input type="text" class="form-control" placeholder="Enter your Email or Mobile">
                            </div>
                            <div class="input-group">
                                <label>Password<em>*</em></label>
                                <input type="password" class="form-control" placeholder="********">
                            </div>
                            <div class="input-group justify-content-sm-between align-items-sm-center">
                                <a class="themeBtn rounded" href="{{route('user.login.submit')}}">Sign In</a>
                                <a href="{{route('user.forgot')}}" class="forgetPass">Forgot my password</a>
                            </div>
                        </form>
                        <div class="or"><span>or</span></div>
                        <ul class="list-unstyled socialIo justify-content-center mb-4">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                        <p>Don’t have an account? <a href="{{route('user.register')}}">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
