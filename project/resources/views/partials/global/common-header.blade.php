{{-- <!--==================== Header Section Start ====================-->--}}
{{-- <header class="ecommerce-header">--}}
{{--     --}}{{-- Top header currency and Language --}}
{{--      @include('partials.global.top-header')--}}
{{--   --}}{{-- Top header currency and Language  end--}}
{{--   @include('partials.global.responsive-menubar')--}}
{{--</header>--}}
{{--<!--==================== Header Section End ====================-->--}}

<!-- Begin: Header -->

<header class="">
    <div class="main-navigate">
        <div class="an-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <a class="navbar-brand" href="{{route('front.index')}}">
                        <img src="{{asset('assets/images/logo.png')}}" alt="img">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('front.index')}}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item drop-down">
                                <a class="nav-link" href="{{route('front.category')}}">Shop</a>
                                <ul>
                                    <li><a href="#">Clothing/ Apparel</a></li>
                                    <li><a href="#">Accessories Men/Women</a></li>
                                    <li><a href="#">Beauty & Cosmetics</a></li>
                                    <li><a href="#">Sports & Entertainment</a></li>
                                    <li><a href="#">Consumer Electronics</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('front.blog')}}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('front.contact')}}">Contact Us</a>
                            </li>
                        </ul>
                        <div class="form-inline">
                            <ul>
                                <li><a href="#search"><i class="far fa-search"></i></a></li>
                                <li><a href="#"><i class="fal fa-shopping-cart"></i><span>0</span></a></li>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li><a href="{{route('user-dashboard')}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                    </li>
                                @else
                                    <li><a href="{{route('user.login.submit')}}"><i class="fas fa-sign-in-alt"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- END: Header -->
