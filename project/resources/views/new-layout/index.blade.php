@extends('new-layout.layout.app')
@section('content')

    <div class="preLoader">
        <div class="line"></div>
        <div class="counter">
            <span>0</span>
        </div>
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <section class="mainSlider">
        <div class="swiper swiper-container heroSlider">
            <div class="swiper-wrapper">
                @foreach($data['sliders'] as $slider)
                    {{--                                @dd($slider)--}}
                    <div class="swiper-slide">
                        <img src="{{asset('assets/images/sliders/'.($slider->photo ?? ''))}}"
                             class="w-100 radius-img" alt="img">
                        {{--                                    <img src="{{asset('assets/new-layout/images/slidebg1.webp')}}"--}}
                        {{--                                         class="w-100 radius-img" alt="img">--}}
                        <div class="slide-inner">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="slideOne">
                                            @php
                                                $subtitleText = $slider->subtitle_text;
                                                 $words = explode(' ', $subtitleText);

        $firstPart = implode(' ', array_slice($words, 0, 2));
        $secondPart = implode(' ', array_slice($words, 2));
                                            @endphp

                                            @if($firstPart != 'Welcome to')
                                                <h3>{{$firstPart ?? ''}}</h3>
                                            @else
                                                <h2>{{$firstPart ?? ''}}</h2>

                                            @endif
                                            <h3>{{$secondPart ?? ''}}</h3>
                                            <p>{{$slider->title_text ?? ''}}</p>
                                            <div>
                                                <a href="{{route('front.category')}}"
                                                   class="themeBtn borderBtn">See All Products</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if($slider->subtitle_text == 'Welcome to Hazy by Tony!')
                                        <div class="col-md-6">
                                            <figure><img
                                                    src="{{asset('assets/new-layout/images/slideimg.webp')}}"
                                                    class="img-fluid" alt="img"></figure>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section class="explore-main">
        <div class="container">
            <div class="title text-center mb-4">
                <h2 class="sub-heading" data-aos="fade-up">Categories</h2>
                <h3 class="heading" data-aos="fade-up">Explore Our Collections</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper exploreSlider" data-aos="fade-up">
                        <div class="swiper-wrapper">

                            @foreach($categories as $category)

                                <div class="swiper-slide">
                                    <div class="explore-card">
                                        <figure>
                                            <img src="{{asset('assets/images/categories/'.$category->image ?? ' ')}}"
                                                 class="img-fluid" alt="img">
                                            <a href="{{ route('front.category', $category->slug) }}"
                                               class="themeBtn borderBtn">{{$category->name ?? ''}}</a>
                                        </figure>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-md-12 text-center mt-5" data-aos="fade-up">
                    <a href="{{route('front.category')}}" class="themeBtn">View All Categories</a>
                </div>
            </div>
        </div>
    </section>

    <section class="arrival-main">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="arrival-content">
                        <div class="rightway">
                            <h2 class="heading" data-aos="fade-up">New Arrivals</h2>
                            <p data-aos="fade-up">It is a long established fact that a reader will be distracted by the
                                read able content
                                of a page when looking at its layout. </p>
                            <ul data-aos="fade-up">
                                <li><a href="#">All</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                            <div data-aos="fade-up">
                                <a href="{{route('front.category')}}" class="themeBtn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1" data-aos="fade">
                    <div class="swiper-container trendSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <span>New Trends.</span>
                            </div>
                            <div class="swiper-slide">
                                <span>New Trends.</span>
                            </div>
                            <div class="swiper-slide">
                                <span>New Trends.</span>
                            </div>
                            <div class="swiper-slide">
                                <span>New Trends.</span>
                            </div>
                            <div class="swiper-slide">
                                <span>New Trends.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="swiper-container arrivalimgSlider1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <figure><img src="{{asset('assets/new-layout/images/arrival1.webp')}}" class="img-fluid"
                                             alt="img"></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure><img src="{{asset('assets/new-layout/images/arrival2.webp')}}" class="img-fluid"
                                             alt="img"></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure><img src="{{asset('assets/new-layout/images/arrival3.webp')}}" class="img-fluid"
                                             alt="img"></figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade">
                    <div class="swiper-container arrivalimgSlider2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <figure><img src="{{asset('assets/new-layout/images/arrival4.webp')}}" class="img-fluid"
                                             alt="img"></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure><img src="{{asset('assets/new-layout/images/arrival5.webp')}}" class="img-fluid"
                                             alt="img"></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure><img src="{{asset('assets/new-layout/images/arrival6.webp')}}" class="img-fluid"
                                             alt="img"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="best-seller">
        <div class="container">
            <div class="botom-set">
                <div class="title text-left">
                    <h2 class="sub-heading" data-aos="fade-up">Shop</h2>
                    <h3 class="heading" data-aos="fade-up">Best Seller</h3>
                </div>
                <div class="arrow">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row align-items-end">
                <div class="col-md-7">
                    <div class="swiper sellerSlider" data-aos="fade-right">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="seller-card">
                                    <figure>
                                        <img src="{{asset('assets/new-layout/images/seller1.webp')}}" class="img-fluid"
                                             alt="img">
                                        <a href="#" class="heart">
                                            <i class="fal fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </figure>
                                    <div class="seller-content">
                                        <h2>Beanbag sofa</h2>
                                        <p>Home, Pet & Appliances</p>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>(4.5)</span>
                                        </div>
                                        <h4>$1.31</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="seller-card">
                                    <figure>
                                        <img src="{{asset('assets/new-layout/images/seller2.webp')}}" class="img-fluid"
                                             alt="img">
                                        <a href="#" class="heart">
                                            <i class="fal fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </figure>
                                    <div class="seller-content">
                                        <h2>New Large Shark Hair Claw Clip...</h2>
                                        <p>Women's Fashion</p>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>(4.5)</span>
                                        </div>
                                        <h4>$3.31</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="seller-card">
                                    <figure>
                                        <img src="{{asset('assets/new-layout/images/seller3.webp')}}" class="img-fluid"
                                             alt="img">
                                        <a href="#" class="heart">
                                            <i class="fal fa-heart"></i>
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </figure>
                                    <div class="seller-content">
                                        <h2>Classic Elegant Metal Round Frame...</h2>
                                        <p>Women's Fashion</p>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>(4.5)</span>
                                        </div>
                                        <h4>$1.48</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <figure class="overflow-hidden">
                        <img src="{{asset('assets/new-layout/images/sellerimg.webp')}}" class="img-fluid" alt="img"
                             data-aos="zoom-out">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-pro">
        <div class="container-fluid">
            <div class="title text-center mb-4">
                <h2 class="sub-heading" data-aos="fade-up">Shop Now</h2>
                <h3 class="heading" data-aos="fade-up">Featured Products</h3>
            </div>
            <div class="feature-tab" data-aos="fade-up">
                <ul class="nav nav-tabs border-0 mb-5 justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                           aria-controls="all" aria-selected="true">All</a>
                    </li>
                    @foreach($categories->take(6) as $category)
                        <li class="nav-item">
                            <a class="nav-link" id="tab-{{$category->id}}" data-category-id="{{$category->id}}"
                               data-toggle="tab"
                               href="#category-{{$category->id}}" role="tab"
                               aria-controls="category-{{$category->id}}" aria-selected="false">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="swiper featureSlider">
                                <div class="swiper-wrapper">
                                    @foreach($data['products']->take(12) as $product)
                                        <div class="swiper-slide">
                                            <div class="seller-card">
                                                <figure>
                                                    @if(!empty($product->photo) && file_exists(public_path('assets/images/products/'.$product->photo )))
                                                        <img src="{{asset('assets/images/products/'.$product->photo)}}"
                                                             class="img-fluid" alt="img">
                                                    @else
                                                        <img src="{{asset('assets/images/noimage.png')}}"
                                                             class="img-fluid" alt="img">
                                                    @endif
                                                </figure>
                                                <div class="seller-content">
                                                    <h2>{{$product->name}}</h2>
                                                    <p>{{$product->category->name}}</p>
                                                    <div class="star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        {{--                                                        <span>({{$product->ratings ?? ''}})</span>--}}
                                                    </div>
                                                    <h4>${{$product->price}}</h4>
                                                    <div>
                                                        <a href="{{ route('front.product', $product->slug) }}"
                                                           class="themeBtn">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @foreach($categories->take(6) as $category)
                            <div class="tab-pane fade" id="category-{{$category->id}}" role="tabpanel"
                                 aria-labelledby="tab-{{$category->id}}">
                                <div class="swiper featureSlider">
                                    <div class="swiper-wrapper" id="category-products-{{$category->id}}">
                                        <!-- Products for this category will be loaded here -->
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="what-we-offer pb-0">
        <div class="container">
            <div class="title text-center mb-4">
                <h2 class="sub-heading" data-aos="fade-up">Shop Now</h2>
                <h3 class="heading" data-aos="fade-up">What We Offer At Hazy by Tony</h3>
            </div>
            <div class="row justify-content-center">
                @php
                    $beauty = \App\Models\Category::where('slug','beauty-health-hair')->first();

                @endphp
                <div class="col-lg-4" data-aos="zoom-in">
                    <div class="offer-card">
                        <a href="{{route('front.category',$beauty->slug)}}">
                            <figure class="offer-card__icon"><img
                                    src="{{asset('assets/new-layout/images/offer-icon1.webp')}}" alt="image"
                                    class="img-fluid"></figure>
                        </a>
                        <div class="offer-card__content">
                            <h4>Beauty & Cosmetics:</h4>
                            <p>Embrace confidence and good looks with our beauty and cosmetics range.</p>
                        </div>
                    </div>
                </div>
                @php
                    $menWomen = \App\Models\Category::where('slug','mens-fashion')->first();

                @endphp
                <div class="col-lg-4" data-aos="zoom-in">
                    <div class="offer-card">
                        <a href="{{route('front.category',$menWomen->slug)}}">
                            <figure class="offer-card__icon"><img
                                    src="{{asset('assets/new-layout/images/offer-icon2.webp')}}" alt="image"
                                    class="img-fluid"></figure>
                        </a>
                        <div class="offer-card__content">
                            <h4>Men and Women Apparel:</h4>
                            <p>
                                Discover your authentic style with our stylish and high-quality men's and women's
                                apparel.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="zoom-in">
                    <div class="offer-card">
                        @php
                            $accessories = \App\Models\Category::where('slug','jewelry-watches')->first();

                        @endphp
                        <a href="{{route('front.category',$accessories->slug)}}">
                            <figure class="offer-card__icon"><img
                                    src="{{asset('assets/new-layout/images/offer-icon3.webp')}}" alt="image"
                                    class="img-fluid"></figure>
                        </a>
                        <div class="offer-card__content">
                            <h4>Accessories:</h4>
                            <p>
                                Complete your look from head to toe with accessories from Hazy by Tony.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="zoom-in">
                    <div class="offer-card">
                        @php
                            $sports = \App\Models\Category::where('slug','outdoor-fun-sports')->first();

                        @endphp
                        <a href="{{route('front.category',$sports->slug)}}">
                            <figure class="offer-card__icon"><img
                                    src="{{asset('assets/new-layout/images/offer-icon4.webp')}}" alt="image"
                                    class="img-fluid"></figure>
                        </a>
                        <div class="offer-card__content">
                            <h4>Sports & Entertainment:</h4>
                            <p>
                                Find top-notch sports gear from our sports and entertainment section.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="zoom-in">
                    <div class="offer-card">
                        @php
                            $electronics = \App\Models\Category::where('slug','consumer-electronics')->first();

                        @endphp
                        <a href="{{route('front.category',$electronics->slug)}}">
                            <figure class="offer-card__icon"><img
                                    src="{{asset('assets/new-layout/images/offer-icon5.webp')}}" alt="image"
                                    class="img-fluid"></figure>
                        </a>
                        <div class="offer-card__content">
                            <h4>Consumer Electronics:</h4>
                            <p>
                                Seeking durable electronics? Count on Hazy by Tony to deliver just that!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <figure class="what-we-offer-img mt-5" data-aos="zoom-out">
                <img src="{{asset('assets/new-layout/images/what-we-offer-img.png')}}" alt="image" class="img-fluid">
            </figure>
        </div>
    </section>

    <section class="our-blogs">
        <div class="container">
            <div class="title-wrap d-flex align-items-end justify-content-between mb-5">
                <div class="title text-left">
                    <h2 class="sub-heading" data-aos="fade-up">HAZY BY TONY</h2>
                    <h3 class="heading" data-aos="fade-up">Our Blogs</h3>
                </div>
                <div data-aos="fade-left">
                    <a href="{{route('front.blog')}}" class="themeBtn">View all Bogs</a>
                </div>
            </div>
        </div>
        <div class="swiper blogSlider" data-aos="fade-up">
            <div class="swiper-wrapper">
                @foreach($data['blogs'] as $blog)
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <figure class="blog-card_img">
                                <img src="{{asset('assets/images/blogs/'.$blog->photo) ?? ''}}" alt="image"
                                     class="img-fluid">
                            </figure>
                            <div class="blog-card__content">
                                <h5 class="sub-heading">{{$blog->created_at->diffForHumans() ?? ''}}</h5>
                                <h4>{{$blog->title ?? ''}}</h4>
                                <p>
                                    {!! \Illuminate\Support\Str::limit($blog->details, 500, '...')  !!}
                                </p>
                                <div>
                                    <a href="{{route('front.blogshow',$blog->id)}}">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="blogSlider-btn">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section class="how-it-work">
        <div class="container">
            <div class="title text-center mb-4">
                <h2 class="sub-heading" data-aos="fade-up">Process</h2>
                <h3 class="heading" data-aos="fade-up">How It Work</h3>
            </div>
            <div class="work-card-wrap">
                <div class="work-card" data-aos="zoom-in">
                    <figure class="work-card__icon text-center">
                        <img src="{{asset('assets/new-layout/images/work-icon1.webp')}}" alt="image" class="img-fluid">
                    </figure>
                    <div class="work-card__content">
                        <h4 class="sub-heading">Safe 256Bit Encription</h4>
                    </div>
                </div>
                <div class="work-card" data-aos="zoom-in">
                    <figure class="work-card__icon text-center">
                        <img src="{{asset('assets/new-layout/images/work-icon2.webp')}}" alt="image" class="img-fluid">
                    </figure>
                    <div class="work-card__content">
                        <h4 class="sub-heading">Safe & Fast Delivery</h4>
                    </div>
                </div>
                <div class="work-card" data-aos="zoom-in">
                    <figure class="work-card__icon text-center">
                        <img src="{{asset('assets/new-layout/images/work-icon3.webp')}}" alt="image" class="img-fluid">
                    </figure>
                    <div class="work-card__content">
                        <h4 class="sub-heading">International Shipping</h4>
                    </div>
                </div>
                <div class="work-card" data-aos="zoom-in">
                    <figure class="work-card__icon text-center">
                        <img src="{{asset('assets/new-layout/images/work-icon4.webp')}}" alt="image" class="img-fluid">
                    </figure>
                    <div class="work-card__content">
                        <h4 class="sub-heading">24 Hours Services</h4>
                    </div>
                </div>
                <div class="work-card" data-aos="zoom-in">
                    <figure class="work-card__icon text-center">
                        <img src="{{asset('assets/new-layout/images/work-icon5.webp')}}" alt="image" class="img-fluid">
                    </figure>
                    <div class="work-card__content">
                        <h4 class="sub-heading">Factory Sealed Package</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@push('script')
    <script>
        $(document).ready(function () {
            // Initialize Swiper for the default "All" tab with two rows
            var allSwiper = new Swiper('.featureSlider', {
                slidesPerView: 2, // Number of slides per row
                spaceBetween: 20,
                loop: true,
                grid: {
                    rows: 2, // Number of rows
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1, // Single slide per row on smaller screens
                        grid: {rows: 2},
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2, // Two slides per row on medium screens
                        grid: {rows: 2},
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 4, // Four slides per row on larger screens
                        grid: {rows: 2},
                        spaceBetween: 20,
                    },
                },
            });

            // Handle tab click and load products dynamically
            $('.nav-link').on('click', function () {
                var categoryId = $(this).data('category-id');
                if (categoryId) {
                    $.ajax({
                        url: "{{ route('category.products') }}",
                        method: 'GET',
                        data: {category_id: categoryId},
                        success: function (response) {
                            var productsHtml = '';
                            response.forEach(function (product) {
                                var imageUrl = product.photo ? "{{ asset('assets/images/products/') }}/" + product.photo : "{{ asset('assets/images/noimage.png') }}";

                                productsHtml += `
                                <div class="swiper-slide">
                                    <div class="seller-card">
                                        <figure>
                                            <img src="${imageUrl}" class="img-fluid" alt="img">
                                        </figure>
                                        <div class="seller-content">
                                            <h2>${product.name}</h2>
                                            <p>${product.category.name}</p>
                                            <div class="star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(${product.ratings || ''})</span>
                                            </div>
                                            <h4>$${product.price}</h4>
                                            <div>
                                                <a href="{{ route('front.product', '') }}/${product.slug}" class="themeBtn">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            });
                            $('#category-products-' + categoryId).html(productsHtml);

                            // Destroy any existing Swiper instance for this tab
                            if (typeof categorySwiper !== 'undefined') {
                                categorySwiper.destroy(true, true);
                            }

                            // Reinitialize Swiper for the newly loaded content with two rows
                            categorySwiper = new Swiper('#category-products-' + categoryId + ' .swiper', {
                                slidesPerView: 2, // Number of slides per row
                                spaceBetween: 20,
                                loop: true,
                                grid: {
                                    rows: 2, // Number of rows
                                },
                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev',
                                },
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true,
                                },
                                breakpoints: {
                                    320: {
                                        slidesPerView: 1, // Single slide per row on smaller screens
                                        grid: {rows: 2},
                                        spaceBetween: 10,
                                    },
                                    768: {
                                        slidesPerView: 2, // Two slides per row on medium screens
                                        grid: {rows: 2},
                                        spaceBetween: 15,
                                    },
                                    1024: {
                                        slidesPerView: 4, // Four slides per row on larger screens
                                        grid: {rows: 2},
                                        spaceBetween: 20,
                                    },
                                },
                            });
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
