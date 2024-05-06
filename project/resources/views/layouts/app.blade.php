<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<style>
    .logoSlider-img img {
        display: block;
        width: 200px;
        aspect-ratio: 3/2;
        object-fit: contain;
        margin: 0 auto;
    }
</style>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>


    @if(isset($page->meta_tag) && isset($page->meta_description))

        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">

        <title>{{$gs->title}}</title>

    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))

        <meta property="og:title" content="{{$blog->title}}"/>
        <meta property="og:description"
              content="{{ $blog->meta_description != null ? $blog->meta_description : strip_tags($blog->meta_description) }}"/>
        <meta property="og:image" content="{{asset('assets/images/blogs/'.$blog->photo)}}"/>
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
        <title>{{$gs->title}}</title>

    @elseif(isset($productt))

        <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">
        <meta name="description"
              content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">
        <meta property="og:title" content="{{$productt->name}}"/>
        <meta property="og:description"
              content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}"/>
        <meta property="og:image" content="{{asset('assets/images/thumbnails/'.$productt->thumbnail)}}"/>
        <meta name="author" content="GeniusOcean">
        <title>{{substr($productt->name, 0,11)."-"}}{{$gs->title}}</title>

    @else

        <meta property="og:title" content="{{$gs->title}}"/>
        <meta property="og:image" content="{{asset('assets/images/'.$gs->logo)}}"/>
        <meta name="keywords" content="{{ $seo->meta_keys }}">
        <meta name="author" content="GeniusOcean">
        <title>{{$gs->title}}</title>

    @endif

    @if(!empty($seo->google_analytics))
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', '{{ $seo->google_analytics }}');
        </script>
    @endif
    @if(!empty($seo->facebook_pixel))
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $seo->facebook_pixel }}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id={{ $seo->facebook_pixel }}&ev=PageView&noscript=1"/>
        </noscript>
@endif

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/magnify.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/custom.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--    <link rel="stylesheet" href="css/responsive.css" />-->
    <title>Hazy By Tony</title>
</head>

<body>
<!-- Begin: Header -->
@php
    use App\Models\Category;
    use App\Models\Subcategory;

    $categories = Category::all();
    $sub = Subcategory::all();
@endphp
<header class="">
    <div class="main-navigate">
        <div class="an-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <a class="navbar-brand" href="{{route('front.index')}}">
                        <img src="{{asset('assets/images/logo.png')}}" alt="img">
{{--                        <video src="{{asset('assets/images/logo.mp4')}}" autoplay loop muted alt="img"></video>--}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="header-main__nav">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('front.index')}}">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.blog')}}">Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.about')}}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.contact')}}">Contact Us</a>
                                </li>
{{--                                <li>--}}
{{--                                    <div id="search">--}}
{{--                                        <button class="close" type="button">×</button>--}}
{{--                                        <form method="GET" action="{{route('front.category')}}">--}}
{{--                                            @csrf--}}
{{--                                            <input placeholder="SEARCH" type="search" value="" name="title">--}}
{{--                                            <div class="srch-btn">--}}
{{--                                                <button href="#" class="themeBtn" type="submit">Search</button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}

{{--                                </li>--}}
                            </ul>
                            <div class="searchForm">
                                <div class="deliver text-center">deliver to <span class="d-block"><i class="fas fa-map-marker-alt"></i> USA</span></div>
                                <form method="GET" action="{{route('front.category')}}">
                                    @csrf
                                    <input type="text" placeholder="Search here..." value="" name="title">
                                    <div class="srch-btn">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="form-inline">
                            <ul>
                                {{--                                <li><a href="#search"><i class="far fa-search"></i></a></li>--}}
                                <li><a href="{{route('front.cart')}}"><i class="fal fa-shopping-cart"></i>
                                        <span>
                                            {{ \App\Helpers\CartHelper::getCartTotalQty() }}
                                        </span></a>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li>
                                        <a href="{{route('user-dashboard')}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                    </li>
                                @else
                                    <li><a href="{{route('user.login.submit')}}"><i class="fas fa-sign-in-alt"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div id="google_translate_element" class="menuDropdown"></div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- END: Header -->
@yield('content')


<!-- Begin: Footer -->
<footer>

    <section class="logo-section">
        <div class="container">
            <div class="swiper logoSlider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Armani.png')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Calvin Klein Wordmark.svg')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Chanel.png')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Dior 2022.svg')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Jordan Air.png')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Maybelline New York.svg')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Prada.svg')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Sephora.svg')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Target Old.svg')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Walmart.svg')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="logoSlider-img">
                            <img src="{{asset('assets/images/brandlogos/Zara New 2020.png')}}" alt="img" class="img-fluid">
                        </figure>
                    </div>
{{--                    <div class="swiper-slide">--}}
{{--                        <figure class="logoSlider-img">--}}
{{--                            <img src="{{asset('assets/images/brandlogos/logo12.png')}}" alt="img" class="img-fluid">--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure class="logoSlider-img">--}}
{{--                            <img src="{{asset('assets/images/brandlogos/logo13.png')}}" alt="img" class="img-fluid">--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure class="logoSlider-img">--}}
{{--                            <img src="{{asset('assets/images/brandlogos/logo14.png')}}" alt="img" class="img-fluid">--}}
{{--                        </figure>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row align-items-baseline justify-content-between">
            {{--<div class="col-md-12">
                <p class="foterHazy">Go- Hazy is an American based, Veteran-owned online store.</p>
            </div>--}}
            <div class="col-12">
                <div class="fotrLogo">
{{--                    <video src="{{asset('assets/images/logo.mp4')}}" autoplay loop muted alt="img"></video>--}}
                    <img src="{{asset('assets/images/logo.png')}}" alt="image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="fotrLogo">
                    {{--                    <a href="#" class="footerLogo"><img src="{{asset('assets/images/min1.png')}}" class="img-fluid"--}}
                    {{--                                                        alt="img"></a>--}}
                    <p>Hazy By Tony is a Veteran-owned online store, offering high-quality men’s and women’s apparel, including clothing, accessories, cosmetics, and consumer electronics. We blend innovative design with affordability, bringing you the latest styles at great prices.</p>
                    {{--<p>Go-Hazy is an online store that sells high-quality men’s and women’s apparel – from clothing to
                        accessories, cosmetics, and consumer electronics – we offer it all. By combining cutting-edge
                        design
                        with an affordable price tag, we bring you the newest styles at an affordable price.</p>--}}
                    <p></p>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="quickHead">
                    <h6>Useful Links</h6>
                    <ul>
                        @if($ps->home == 1)
                            <li><a href="{{route('front.index')}}">Home</a></li>
                        @endif
                        <li><a href="{{route('front.about')}}">About Us</a></li>
                        @if($ps->category == 1)
                            <li><a href="{{route('front.category')}}">Shop</a></li>
                        @endif
                        @if($ps->blog == 1)
                            <li><a href="{{route('front.blog')}}">Blogs</a></li>
                        @endif
                        @if($ps->contact == 1)
                            <li><a href="{{route('front.contact')}}">Contact Us</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="quickHead">
                    <h6>Information</h6>
                    <ul>
                        <li><a href="{{route('front.vendor', 'privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('front.vendor', 'return')}}">Return & Shipping</a></li>
                        <li><a href="{{route('front.vendor', 'terms')}}">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="quickHead">
                    <h6>Get In Touch</h6>
                </div>
                <div class="calFoter">
                    <ul>
{{--                        <li><a href="tel:{{$ps->phone}}"><i class="fas fa-phone-alt"></i><span>{{$ps->phone}}</span></a>--}}
                        </li>
{{--                        <li><a href="mailto:{{$ps->contact_email}}"><i--}}
{{--                                    class="fal fa-envelope"></i><span>{{$ps->contact_email}}</span></a></li>--}}
                        <li><a href="#"><i class="far fa-map-marker-alt"></i><span>Location: {{$ps->street}}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyRight">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>@ Copyright 2023 Hazy By Tony. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- END: Footer -->


    {{--<div id="search">--}}
    {{--    <button class="close" type="button">×</button>--}}
    {{--    <form method="GET" action="{{route('front.category')}}">--}}
    {{--        @csrf--}}
    {{--        <input placeholder="SEARCH" type="search" value="" name="title">--}}
    {{--        <div class="srch-btn">--}}
    {{--            <button href="#" class="themeBtn" type="submit">Search</button>--}}
    {{--        </div>--}}
    {{--    </form>--}}
    {{--</div>--}}

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/all.min.js')}}"></script>
<script src="{{ asset('assets/front/js/jquery-ui.min.js') }}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>
<script src="{{asset('assets/js/gsap.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/scrollTrigger.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnify.js')}}"></script>
<script src="{{asset('assets/js/custom.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/' + '{{ $gs->talkto }}' + '/1gm1htanl';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
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
{{-- Translator --}}
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,ja,es,ru,de,tl'
        }, 'google_translate_element');
    }
</script>


<script>
    $(document).ready(function () {
        /*$('#shopWomen').find('.category_element').hover(function () {
            var category_id = $(this).data('id');

            $('#shopWomen').find('.sub_category_element').each(function () {
                if ($(this).data('parent') != category_id) {
                    $(this).prop('hidden', true);
                } else {
                    $(this).prop('hidden', false);
                }
            });
        });*/
        setTimeout(function () {
            $('option[value="tl"]').text('Tagalog')
        }, 1000);
    });

</script>
@yield('script')

<script src="https://service.demowebsitelinks.com/ada_plugin/" type="text/javascript"></script>


</body>

</html>
