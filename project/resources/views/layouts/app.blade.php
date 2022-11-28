<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
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
    <link rel="stylesheet" href="{{asset('assets/css/custom.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}"/>
    <!--    <link rel="stylesheet" href="css/responsive.css" />-->
    <title>Go Hazy</title>
</head>

<body>
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
@yield('content')


<!-- Begin: Footer -->
<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <p class="foterHazy">Go- Hazy is an American based, Veteran-owned online store.</p>
            </div>
            <div class="col-md-4">
                <div class="fotrLogo">
                    <a href="#" class="footerLogo"><img src="{{asset('assets/images/min1.png')}}" class="img-fluid"
                                                        alt="img"></a>
                    <p>Go-Hazy is an online store that sells high-quality men’s and women’s apparel – from clothing to
                        accessories, cosmetics, and consumer electronics – we offer it all. By combining cutting-edge
                        design
                        with an affordable price tag, we bring you the newest styles at an affordable price.</p>
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
                        <li><a href="">About Us</a></li>
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
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Return & Shipping</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="quickHead">
                    <h6>Get In Touch</h6>
                </div>
                <div class="calFoter">
                    <ul>
                        <li><a href="tel:{{$ps->phone}}"><i class="fas fa-phone-alt"></i><span>{{$ps->phone}}</span></a>
                        </li>
                        <li><a href="mailto:{{$ps->contact_email}}"><i
                                    class="fal fa-envelope"></i><span>{{$ps->contact_email}}</span></a></li>
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
                    <p>@ Copyright 2022 Go Hazy. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- END: Footer -->

<div id="search">
    <button class="close" type="button">×</button>
    <form>
        <input placeholder="SEARCH" type="search" value="">
        <div class="srch-btn">
            <a href="#" class="themeBtn">Search</a>
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/js/all.min.js')}}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>
<script src="{{asset('assets/js/gsap.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/scrollTrigger.js')}}"></script>
<script src="{{asset('assets/js/custom.min.js')}}"></script>


</body>

</html>