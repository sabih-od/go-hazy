<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/new-layout/css/all.min.css')}}"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets/new-layout/css/custom.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/new-layout/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/new-layout/css/slider.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<!-- Begin: Header -->
@php
    use App\Models\Category;
    use App\Models\Subcategory;

    $categories = Category::all();
    $sub = Subcategory::all();
@endphp
<header class="">
    <div class="main-navigate">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <ul class="top-menu">
                    <li><a href="{{route('front.index')}}" class="nav-item">Home</a></li>
                    <li><a href="{{route('front.about')}}" class="nav-item">About Us</a></li>
                    <li class="dropdown">
                        <a class="av-link dropdown-toggle"
                           onclick="window.location.href='{{route('front.category')}}'"
                           href="{{route('front.category')}}" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Shop
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid d-block p-0">
                                <div class="row no-gutters">
                                    <div class="col-3">
                                        <div class="mainCat">
                                            <h4>Store Category</h4>
                                            <ul class="nav flex-column">
                                                @foreach($categories as $category)
                                                    <li class="nav-item category_element"
                                                    ><a
                                                            href="{{ route('front.category', $category->slug) }}"
                                                            class="nav-link"
                                                            data-id="as{{$category->id}}">{{$category->name ?? ''}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        @foreach($categories as $category)
                                            <div class="subCat" id="as{{$category->id}}">
                                                <div class="container-fluid d-block">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="container-fluid d-block">
                                                                <div class="row">
                                                                    @foreach($category->subs as $subscategory)
                                                                        <div
                                                                            class="col-md-3 sub_category_element"
                                                                            data-parent="{{$category->id}}">
                                                                            <a href="{{ route('front.category', [$category->slug,$subscategory->slug]) }}"><span
                                                                                    class="text-uppercase text-white">{{ $subscategory->name ?? '' }}</span></a>
                                                                            @if(isset($subscategory->childs) != null)
                                                                                <ul class="nav flex-column">
                                                                                    @foreach($subscategory->childs as $child)
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link active"
                                                                                               href="{{ route('front.category', [$category->slug, $subscategory->slug, $child->slug]) }}">
                                                                                                {{ $child->name ?? '' }}</a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{route('front.blog')}}" class="nav-item">Blog</a></li>
                    <li><a href="{{route('front.contact')}}" class="nav-item">Contact Us</a></li>
                </ul>
                <p class="headline">FREE SHIPPING & FREE RETURNS!</p>
                <ul class="deliver">
                    <li>
                        <a href="#">Deliver To</a>
                    </li>
                    <li>
                        <div class="dropdown dropdown1">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('assets/new-layout/images/flag.webp')}}" class="img-fluid"
                                     alt="img">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="an-navbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="search">
                        <div class="input-group">
                            <form method="GET" action="{{route('front.category')}}">
                                @csrf
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All
                                        Category
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Search here"
                                       aria-label="Text input with dropdown button" name="title">
                                <a href="#" class="searchs"><i class="fas fa-search"></i></a>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{route('front.index')}}" class="top-logo"><img
                            src="{{asset('assets/new-layout/images/logo.webp')}}" class="img-fluid" alt="img"></a>
                </div>
                <div class="col-md-4">
                    <div class="cart-box">
                        <ul class="cart-list">
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <li><a href="{{route('user-dashboard')}}"><i class="fas fa-user"  style="color: green"></i></a></li>
                            @else
                                <li><a href="{{route('user.login.submit')}}"><i class="fas fa-user"></i></a></li>
                            @endif
                            <li><a href="{{route('front.cart')}}"><i class="fas fa-shopping-cart"></i> <span>
                                            {{ \App\Helpers\CartHelper::getCartTotalQty() }}
                                        </span></a></li>
                        </ul>
                        <div class="menuBar">
                            <button class="btn btn-menu ml-auto">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<menu class="menulist">
    <ul>
        <li class="active">
            <a href="{{route('front.index')}}">Home</a>
        </li>
        <li>
            <a href="{{route('front.about')}}">About Us</a>
        </li>
        <li>
            <a href="{{route('front.category')}}">Shop</a>
        </li>
        <li>
            <a href="{{route('front.blog')}}">Blog</a>
        </li>
        <li>
            <a href="{{route('front.contact')}}">Contact Us</a>
        </li>
    </ul>
</menu>
<body>
<!-- END: Header -->

@yield('content')


<section class="brands-logo">
    <div class="swiper logoSlider-one" data-aos="fade">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo1.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo2.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo3.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo4.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo5.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo6.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo7.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
        </div>
    </div>
    <div class="swiper logoSlider-two" data-aos="fade">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo8.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo9.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo10.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo11.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo12.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo13.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="brand-logo-img">
                    <img src="{{asset('assets/new-layout/images/brnadlogo14.webp')}}" alt="image" class="img-fluid">
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="insta-section">
    <div class="container-fluid">
        <div class="title text-center mb-4">
            <h2 class="sub-heading" data-aos="fade-up">Instagram</h2>
            <h3 class="heading" data-aos="fade-up">@Shop By Instagram</h3>
        </div>
        <div class="swiper instaSlider" data-aos="fade">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <figure class="insta-img"><img src="{{asset('assets/new-layout/images/insta-img1.webp')}}"
                                                   alt="image" class="img-fluid">
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="insta-img"><img src="{{asset('assets/new-layout/images/insta-img2.webp')}}"
                                                   alt="image" class="img-fluid">
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="insta-img"><img src="{{asset('assets/new-layout/images/insta-img3.webp')}}"
                                                   alt="image" class="img-fluid">
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="insta-img"><img src="{{asset('assets/new-layout/images/insta-img4.webp')}}"
                                                   alt="image" class="img-fluid">
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="insta-img"><img src="{{asset('assets/new-layout/images/insta-img5.webp')}}"
                                                   alt="image" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="newsletter-section pb-0">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <figure class="newsletter-img h-100" data-aos="zoom-out">
                    <img src="{{asset('assets/new-layout/images/newsletter-img1.webp')}}" alt="image"
                         class="img-fluid w-100 h-100">
                </figure>
            </div>
            <div class="col-md-7">
                <div class="newsletter-box" data-aos="zoom-in">
                    <div class="title text-center mb-4">
                        <h2 class="sub-heading text-white">STAY UPTO DATE</h2>
                        <h3 class="heading text-white">Sign Up For Our Newsletter!</h3>
                        <p class="text-white">
                            By signing up for our newsletter, not only do you get 10% off your first order, but you
                            also get to know about exciting offers, discounts, and new arrivals before others!
                        </p>
                    </div>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Email address">
                        <button class="themeBtn border-0">Subscribe Now</button>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <figure class="newsletter-img h-100" data-aos="zoom-out">
                    <img src="{{asset('assets/new-layout/images/newsletter-img2.webp')}}" alt="image"
                         class="img-fluid w-100 h-100">
                </figure>
            </div>
        </div>
    </div>
</section>
<!-- Begin: Footer -->
<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-2">
                <a href="" class="footerLogo d-block">
                    <img src="{{asset('assets/new-layout/images/footerlogo.webp')}}" alt="image" class="img-fluid">
                </a>
            </div>
            <div class="col-lg-2">
                <div class="footerLinks">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li><a href="{{route('front.about')}}">About Us</a></li>
                        <li><a href="{{route('front.category')}}">Shop</a></li>
                        <li><a href="{{route('front.blog')}}">Blog</a></li>
                        <li><a href="{{route('front.contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footerLinks">
                    <h3>Contact Us</h3>
                    <ul>
                        @if(\Illuminate\Support\Facades\Auth::check())
                        <li><a href="{{route('user-dashboard')}}">My Account</a></li>
                        <li><a href="{{route('user-order-track')}}">Track Order</a></li>
                        @else
                            <li><a href="{{route('user.login')}}">My Account</a></li>
                            <li><a href="{{route('user.login')}}">Track Order</a></li>
                        @endif
                        <li><a href="">Returns & Exchanges</a></li>
                        <li><a href="{{route('front.vendor', 'return')}}">Shipping Protection Policy</a></li>
                        <li><a href="{{route('front.contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footerInfo">
                    <h3>Sign Up For Email</h3>
                    <p>
                        Get 20% off your first purchase
                    </p>
                    <form class="signUp-form">
                        <div class="options d-flex align-items-center justify-content-between mb-2">
                            <div class="radio d-flex align-items-baseline justify-content-start">
                                <input type="radio" id="radio1" name="option" value="MEN">
                                <label for="radio1" class="ml-2 mb-0">MEN</label>
                            </div>
                            <div class="radio d-flex align-items-baseline justify-content-start">
                                <input type="radio" id="radio2" name="option" value="WOMEN">
                                <label for="radio2" class="ml-2 mb-0">WOMEN</label>
                            </div>
                            <div class="radio d-flex align-items-baseline justify-content-start">
                                <input type="radio" id="radio3" name="option" value="WOMEN">
                                <label for="radio3" class="ml-2 mb-0">WOMEN</label>
                            </div>
                        </div>
                        <div class="signUp-input">
                            <input type="email" placeholder="Email address">
                            <button type="submit" class="border-0 bg-transparent"><i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                    <ul class="footerSocial-links d-flex align-items-center justify-content-start">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyRight text-center">
            <p class="mb-0">Copyright© 2024 All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- END: Footer -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/new-layout/js/all.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
<script src="{{asset('assets/new-layout/js/custom.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('script')
<script>
    @if(session()->has('error'))
    toastr.error('{{ session()->get('error') }}');
    {{--toastr.success('{{ session()->get('
    --}}
    @endif
    @if(session()->has('success'))
    toastr.success('{{ session()->get('success') }}');
    @endif
</script>
<script>
    function menuShow() {
        let dropdownToggle = document.querySelectorAll('.dropdown-toggle')
        // console.clear()
        let menuItems = document.querySelectorAll('.mainCat .nav-item .nav-link')
        let shopMenuItems = document.querySelectorAll('.categoriesCont ul li a')

        $(dropdownToggle).mouseenter(function () {
            $('.subCat:first-of-type').addClass('active');
            $('.mainCat .nav-item:first-of-type .nav-link').addClass('active');
        })

        menuItems.forEach((btn) => {
            $(btn).mouseenter(function () {
                // console.log('#' + $(this).data('id'))
                $(menuItems).removeClass('active')
                $(this).addClass('active');
                $('.subCat').removeClass('active');
                $('#' + $(this).data('id')).addClass('active');
            });
            $(btn).mouseleave(function () {
                // $('#' + $(this).data('id')).removeClass('active');
            });
        })
        shopMenuItems.forEach((item) => {
            $(item).mouseenter(function () {
                $(shopMenuItems).removeClass('active')
                $(this).addClass('active');
                $('#' + $(this).data('id')).addClass('active');
            });
            $(item).mouseleave(function () {
                $('#' + $(this).data('id')).removeClass('active');
            });
        })
    }

    menuShow()
</script>


</body>

</html>
