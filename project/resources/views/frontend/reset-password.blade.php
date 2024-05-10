@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>forgot password</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">Reset password</a></li>
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
                        <h2><span>Reset Password</span></h2>
                        <form action="{{ route('user.change.password') }}" class="formStyle form-row" method="post">
                            @csrf
                            <input type="hidden" name="file_token" value="{{$token}}">
                            <div class="input-group">
                                <label>New Password<em>*</em></label>
                                <input type="password" name="password" class="form-control" placeholder="At least 6 characters">
                                @error('password')
                                <label class="btn-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label>Confirm Password<em>*</em></label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="At least 6 characters">
                                @error('password_confirmation')
                                <label class="btn-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="input-group justify-content-md-end">
                                <button type="submit" class="themeBtn rounded">Submit</button>
                            </div>
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
