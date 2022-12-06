<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="author" content="GeniusOcean">
    <!-- Title -->
    <title>{{$gs->title}}</title>
    <!-- favicon -->
    <link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}"/>

    @yield('styles')

  </head>
  <body>
  <section class="accountAccesSec">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-7">
                  <div class="whitebg">
                      <h2>{{ __('Login Now') }}</h2>
                      <h2>{{ __('Welcome back, please sign in below') }}</h2>
                      @include('alerts.admin.form-login')
                      <form id="loginform" action="{{ route('admin.login.submit') }}" class="formStyle form-row" method="post">
                          @csrf
                          <div class="input-group">
                              <label>Email<em>*</em></label>
                              <input type="text" name="email" class="form-control" placeholder="{{ __('Type Email Address') }}">
                          </div>
                          <div class="input-group">
                              <label>Password<em>*</em></label>
                              <input type="password" name="password" class="form-control" placeholder="{{ __('Type Password') }}">
                          </div>
                          {{--<div class="form-forgot-pass">
                              <div class="left">
                                  <input type="checkbox" name="remember"  id="rp" {{ old('remember') ? 'checked' : '' }}>
                                  <label for="rp">{{ __('Remember Password') }}</label>
                              </div>
                          </div>--}}
                          <div class="input-group justify-content-sm-between align-items-sm-center">
                              <input id="authdata" type="hidden"  value="{{ __('Authenticating...') }}">
                              <button type="submit" class="themeBtn rounded">{{ __('Login') }}</button>
                              {{--                                <a class="themeBtn rounded" href="{{route('user.login.submit')}}">Sign In</a>--}}
                              <a href="{{ route('admin.forgot') }}" class="forgetPass">Forgot my password</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
    <!-- Login and Sign up Area Start -->
   {{-- <section class="login-signup">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="login-area">
              <div class="header-area">
                <h4 class="title">{{ __('Login Now') }}</h4>
                <p class="text">{{ __('Welcome back, please sign in below') }}</p>
              </div>
              <div class="login-form">
                @include('alerts.admin.form-login')
                <form id="loginform" action="{{ route('admin.login.submit') }}" method="POST">
                  @csrf
                  <div class="form-input">
                    <input type="email" name="email" class="User Name" placeholder="{{ __('Type Email Address') }}" value="" required="" autofocus>
                    <i class="icofont-user-alt-5"></i>
                  </div>
                  <div class="form-input">
                    <input type="password" name="password" class="Password" placeholder="{{ __('Type Password') }}">
                    <i class="icofont-ui-password"></i>
                  </div>
                  <div class="form-forgot-pass">
                    <div class="left">
                      <input type="checkbox" name="remember"  id="rp" {{ old('remember') ? 'checked' : '' }}>
                      <label for="rp">{{ __('Remember Password') }}</label>
                    </div>
                    <div class="right">
                      <a href="{{ route('admin.forgot') }}">
                        {{ __('Forgot Password?') }}
                      </a>
                    </div>
                  </div>
                  <input id="authdata" type="hidden"  value="{{ __('Authenticating...') }}">
                  <button class="submit-btn">{{ __('Login') }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>--}}
    <!--Login and Sign up Area End -->


    <!-- Dashboard Core -->
    <script src="{{asset('assets/admin/js/vendors/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendors/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
    <!-- Fullside-menu Js-->
    <script src="{{asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/fullside-menu/waves.min.js')}}"></script>

    <script src="{{asset('assets/admin/js/plugin.js')}}"></script>
    <script src="{{asset('assets/admin/js/tag-it.js')}}"></script>
    <script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{asset('assets/admin/js/load.js')}}"></script>
    <!-- Custom Js-->
    <script src="{{asset('assets/admin/js/custom.js')}}"></script>
    <!-- AJAX Js-->
    <script src="{{asset('assets/admin/js/myscript.js')}}"></script>

  </body>

</html>
