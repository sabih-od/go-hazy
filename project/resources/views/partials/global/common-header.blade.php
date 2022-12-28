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
                    @php
                        use App\Models\Category;

                        $categories = Category::all();
                    @endphp
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('front.index')}}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item drop-down">
                                <a class="nav-link" href="{{route('front.category')}}">Shop</a>
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('front.category',$category->slug) }}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
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
                        </ul>
                        <div class="form-inline">
                            <ul>
                                <li><a href="#search"><i class="far fa-search"></i></a></li>
                                <li><a href="#"><i class="fal fa-shopping-cart"></i><span>0</span></a></li>
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
                </nav>
            </div>
        </div>
    </div>
</header>

<style>
    .table-responsive .table thead tr {
        background-color: var(--theme-color) !important;
    }

    .widget_categories ul li,
    .widget_categories ul li a {
        font-weight: 400 !important;
    }

    .widget_categories ul li a.active {
        font-weight: 600 !important;
        color: var(--theme-color) !important;
    }

    .themeBtn {
        padding: 1.25em 1em;
        font-size: 0.75rem;
        font-weight: 400;
    }

    .bannerPreview {
        width: 100%;
        height: 250px;
        background-color: #ddd;
        object-fit: contain;
    }

    .user-profile-details .elegant-pricing-tables {
        border: 1px solid #ddd;
        box-shadow: 0 0 5px #ddd;
        border-radius: 15px;
        margin: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .user-profile-details .elegant-pricing-tables .pricing-head {
        text-align: center;
        display: flex;
        background: var(--theme-color);
        align-items: center;
        justify-content: space-between;
        padding: 0.5rem 1rem;
    }

    .user-profile-details .elegant-pricing-tables .pricing-head .price {
        width: auto;
        height: auto;
        background: none;
        border: none;
        padding: 0;
        animation: none !important;
        color: #fff;
    }

    .user-profile-details .elegant-pricing-tables .pricing-head h3 {
        color: #fff;
    }

    .user-profile-details > .row [class *= 'col-'] {
        display: flex;
    }

    .user-profile-details > .row {
        gap: 2rem 0;
    }

    .user-profile-details .elegant-pricing-tables:hover {
        background: none;
    }

    .user-profile-details .elegant-pricing-tables .pricing-detail {
        padding: 0 1rem;
        text-align: center;
    }

    .user-profile-details .elegant-pricing-tables .pricing-detail ol,
    .user-profile-details .elegant-pricing-tables .pricing-detail ul {
        padding: 0;
        list-style: none;
        text-align: center;
    }

    .user-profile-details .elegant-pricing-tables .pricing-detail ol li,
    .user-profile-details .elegant-pricing-tables .pricing-detail ul li {
        background: none !important;
        margin: 0;
    }

    .user-profile-details .elegant-pricing-tables:hover .pricing-detail ol li,
    .user-profile-details .elegant-pricing-tables:hover .pricing-detail ul li {
        color: #000 !important;
    }

    .user-profile-details .elegant-pricing-tables .themeBtn {
        width: 100%;
        text-align: center;
    }

    .upload-file label {
        background: var(--theme-color) !important;
    }
</style>
<!-- END: Header -->
