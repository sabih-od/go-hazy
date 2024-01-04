@extends('layouts.app')
@section('content')
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #f25a29;
            border-color: #f25a29;
        }
    </style>
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    {{--@dd($data);--}}
    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $category = !empty(request()->segment(4)) ? request()->segment(4) : (!empty(request()->segment(3)) ? request()->segment(3) : request()->segment(2)) ;
                    @endphp

                    @if(!empty($category))
                        <h6>{{ ucfirst(str_replace('-', ' ', $category)) }}</h6>
                    @else
                        <h6>{{ ucfirst(str_replace('-', ' ', 'Shop')) }}</h6>
                    @endif

                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">{{ $data['cat']->name ?? 'Shop' }}</a></li>
                        @if(isset($data['subcat']))
                            <li><span>/</span></li>
                            <li><a href="#">{{ $data['subcat']->name ?? 'Shop'}}</a></li>
                            @if(isset($data['childcat']))
                                <li><span>/</span></li>
                                <li><a href="#">{{ $data['childcat']->name ?? 'Shop'}}</a></li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="proSec proPage">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div id="sidebar" class="widget-title-bordered-full">
                        <div id="bigbazar-price-filter-list-1"
                             class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">
                            <h2 class="widget-title">{{ __('Filter by Price') }}</h2>
                            <ul class="price-filter-list">
                                <li>
                                    <a href="" class="anchorPriceFilter" data-min="0" data-max="25">Under $25</a>
                                </li>
                                <li>
                                    <a href="" class="anchorPriceFilter" data-min="25" data-max="50">$25 to $50</a>
                                </li>
                                <li>
                                    <a href="" class="anchorPriceFilter" data-min="50" data-max="100">$50 to $100</a>
                                </li>
                                <li>
                                    <a href="" class="anchorPriceFilter" data-min="100" data-max="200">$100 to $200</a>
                                </li>
                                <li>
                                    <a href="" class="anchorPriceFilter" data-min="200" data-max="99999">$200 to
                                        Above</a>
                                </li>
                                <li>
                                    {{--                                    <form class="priceFilter" action="">--}}
                                    {{--                                        <input type="number" min="0" placeholder="Min" name="" id="">--}}
                                    {{--                                        <input type="number" min="0" placeholder="Max" name="" id="">--}}
                                    {{--                                        <button>Go</button>--}}
                                    {{--                                    </form>--}}
                                    <form class="priceFilter" action="">
                                        <input type="number" min="0" placeholder="Min" name="minPrice" id="minPrice">
                                        <input type="number" min="0" placeholder="Max" name="maxPrice" id="maxPrice">
                                        <button id="filterButton">Go</button>
                                    </form>
                                </li>
                                {{--                                <form action="{{route('front.category')}}" method="GET">--}}
                                {{--                                    <div class="price-range-block">--}}
                                {{--                                        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>--}}
                                {{--                                        <div class="livecount">--}}
                                {{--                                            $ <input type="number" name="min" min="0" oninput="" id="min_price"--}}
                                {{--                                                     value="{{$data['min'] ?? 0}}" class="price-range-field"/>--}}
                                {{--                                            <span>--}}
                                {{--                                        {{ __('To') }}--}}
                                {{--                                    </span>--}}
                                {{--                                            $ <input type="number" name="max" min="0" oninput="" id="max_price"--}}
                                {{--                                                     value="{{$data['max'] ?? 0}}" class="price-range-field"/>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <button class="filter-btn btn btn-primary mt-3 mb-4"--}}
                                {{--                                            type="submit">{{ __('Search') }}</button>--}}
                                {{--                                </form>--}}
                            </ul>
                        </div>
                        <div id="bigbazar-price-filter-list-1"
                             class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">
                            <h2 class="widget-title">{{ __('Deals & Discount') }}</h2>
                            <ul class="price-filter-list">
                                <li>
                                    <a href="#" class="discountedFilter" data-filter="discounted">All Discount</a>
                                </li>
                                <li>
                                    <a href="#">Today's Deals</a>
                                </li>
                            </ul>
                        </div>
                        <div id="bigbazar-price-filter-list-1"
                             class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">
                            <h2 class="widget-title">{{ __('Avg. Customer Review') }}</h2>
                            <ul class="price-filter-list">
                                <a href="" class="reviewStars" data-filter="5">
                                    <li class="starCont">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>& Up</span>
                                    </li>
                                </a>
                                <a href="" class="reviewStars" data-filter="4">
                                    <li class="starCont">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span>& Up</span>
                                    </li>
                                </a>
                                <a href="" class="reviewStars" data-filter="3">
                                    <li class="starCont">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span>& Up</span>
                                    </li>
                                </a>
                                <a href="" class="reviewStars" data-filter="2">
                                    <li class="starCont">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span>& Up</span>
                                    </li>
                                </a>
                                <a href="" class="reviewStars" data-filter="1">
                                    <li class="starCont">
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span>& Up</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <div id="bigbazar-price-filter-list-1"
                             class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">
                            <h2 class="widget-title">{{ __('New & Upcoming') }}</h2>
                            <ul class="price-filter-list">
                                <li>
                                    <a href="#" class="highestToLowest" data-filter="highest">Highest to Lowest </a>
                                </li>
                                <li>
                                    <a href="#" class="lowestToHighest" data-filter="lowest">Lowest to Highest</a>
                                </li>
                                <li>
                                    <a href="#" class="bestSeller" data-filter="bestSeller">Best Sellers</a>
                                </li>
                                <li>
                                    <a href="#" class="newestArrivalFilter" data-filter="newest">Newest Arrival</a>
                                </li>
                                {{--                                <li>--}}
                                {{--                                    <a href="#">Customer Reviews</a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-4">
                            <div class="shopNav">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><span>/</span></li>
                                    <li>{{ $data['cat']->name ?? 'Shop' }}</li>
                                    @if(isset($data['subcat']))
                                        <li><span>/</span></li>
                                        <li>{{ $data['subcat']->name ?? 'Shop' }}</li>
                                    @endif
                                    @if(isset($data['childcat']))
                                        <li><span>/</span></li>
                                        <li>{{ $data['childcat']->name ?? 'Shop' }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @php
                            $currentUrl = url()->current();
                            $paginate = app('request')->input('page');
                        @endphp
                        <div class="col-md-8">
                            <div class="shopLabel">
                                <ul>
                                    <li>
                                        <label>Show :</label>
                                        <div class="pagination">
                                            @if(!empty(isset($category)))
                                                <span>/</span>
                                                <a href="{{ $currentUrl.'?pageby=9' . '&page=' . $paginate }}">9</a>
                                                <span>/</span>
                                                <a href="{{ $currentUrl.'?pageby=12' . '&page=' . $paginate }}">12</a>
                                                <span>/</span>
                                                <a href="{{ $currentUrl.'?pageby=18' . '&page=' . $paginate }}">18</a>
                                                <span>/</span>
                                                <a href="{{ $currentUrl.'?pageby=24' . '&page=' . $paginate }}">24</a>
                                                <span>/</span>
                                                <a href="{{ $currentUrl.'?pageby=30' . '&page=' . $paginate }}">30</a>
                                            @else
                                                <a href="{{ route('front.category', ['pageby' => 9, 'page' => $paginate]) }}">9</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 12, 'page' => $paginate]) }}">12</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 18, 'page' => $paginate]) }}">18</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 24, 'page' => $paginate]) }}">24</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 30, 'page' => $paginate]) }}">30</a>
                                            @endif

                                        </div>
                                    </li>
                                    {{--                            {{ $data['cat']->name  ?? 'Shop'}}--}}
                                    {{--                            @if(isset($data['subcat']))--}}
                                    {{--                                /--}}
                                    {{--                                {{ $data['subcat']->name ?? 'Shop' }}--}}
                                    {{--                            @endif--}}
                                    {{--                            @if(isset($data['childcat']))--}}
                                    {{--                                /--}}
                                    {{--                                {{ $data['childcat']->name ?? 'Shop' }}--}}
                                    {{--                            @endif--}}
                                    {{--                            <li>--}}
                                    {{--                                <a href="#"><img src="{{asset('assets/images/bar1.png')}}" class="img-fluid" alt="img"></a>--}}
                                    {{--                                <a href="#"><img src="{{asset('assets/images/bar2.png')}}" class="img-fluid" alt="img"></a>--}}
                                    {{--                                <a href="#"><img src="{{asset('assets/images/bar3.png')}}" class="img-fluid" alt="img"></a>--}}
                                    {{--                            </li>--}}
                                    {{--                            <li>--}}
                                    {{--                                <select>--}}
                                    {{--                                    <option>Default Sorting</option>--}}
                                    {{--                                </select>--}}
                                    {{--                            </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{--{{ dd($data['cat']) }}--}}
                    @php
                        use App\Models\Category;

                        $categories = Category::all();
                        $sort = 'ASC';
                    @endphp
                    @include('frontend.ajax.filter-price')
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md-12">--}}
                    {{--                            <div class="container">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    @forelse($data['prods'] as $item)--}}
                    {{--                                        --}}{{--                                        {{ dd($item) }}--}}
                    {{--                                        <div class="col-lg-4 col-sm-6">--}}
                    {{--                                            <div class="product-box">--}}
                    {{--                                                <div class="pro-img">--}}
                    {{--                                                    <a href="#">--}}
                    {{--                                                        <img--}}
                    {{--                                                            src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"--}}
                    {{--                                                            alt="img">--}}
                    {{--                                                    </a>--}}

                    {{--                                                    @if (round((int)$item->offPercentage()) > 0)--}}
                    {{--                                                        <div class="on-sale">- {{ round((int)$item->offPercentage() )}}--}}
                    {{--                                                            %--}}
                    {{--                                                        </div>--}}
                    {{--                                                    @endif--}}
                    {{--                                                    <div class="overlay">--}}
                    {{--                                                        <ul>--}}
                    {{--                                                            <li><a href="#"><i class="far fa-search"></i></a></li>--}}
                    {{--                                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>--}}
                    {{--                                                            <li><a href="{{ route('front.product', $item['slug']) }}">--}}
                    {{--                                                                    <i class="fal fa-shopping-cart"></i></a></li>--}}
                    {{--                                                            <li>--}}
                    {{--                                                                <a href="{{ route('front.product', $item['slug']) }}"><img--}}
                    {{--                                                                        src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"--}}
                    {{--                                                                        class="img-fluid" alt="img"></a></li>--}}
                    {{--                                                        </ul>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <h4>{{$item->name ?? 'Shop'}}</h4>--}}
                    {{--                                                <p>{{$item->category->name ?? 'Shop'}}</p>--}}
                    {{--                                                --}}{{--                                                {{ dd($item->price, $item->setCurrency()) }}--}}
                    {{--                                                --}}{{--                                                <span>${{$item->price ?? 'Shop'}}</span>--}}
                    {{--                                                <span>{{ $item->setCurrency() ?? '0.00' }}</span>--}}
                    {{--                                                <del>{{ $item->showPreviousPrice() ?? '0.00' }}</del>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    @empty--}}
                    {{--                                        <p>There Are No Products</p>--}}
                    {{--                                    @endforelse--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-md-12">--}}
                    {{--                                    <div class="pagination listPaginate">--}}
                    {{--                                        --}}{{--                                        {{ $data['prods']->links() . ($data['min'] ? '&min=' . $data['min'] : '') . ($data['max'] ? '&max=' . $data['max'] : '') }}--}}
                    {{--                                        {{ $data['prods']->appends(request()->input())->links() }}--}}
                    {{--                                        --}}{{--                        <ul>--}}
                    {{--                                        --}}{{--                            <li><a href="#" class="active">1</a></li>--}}
                    {{--                                        --}}{{--                            <li><a href="">2</a></li>--}}
                    {{--                                        --}}{{--                            <li><a href="#"><i class="fal fa-angle-right"></i></a></li>--}}
                    {{--                                        --}}{{--                        </ul>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
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
@section('script')

    <script type="text/javascript">
        (function ($) {
            "use strict";

            var paginate = {!! json_encode(app('request')->input('page') ?? null) !!};
            $(function () {
                $("#slider-range").slider({
                    range: true,
                    orientation: "horizontal",
                    min: 0,
                    max: 1500,
                    values: ['{{$data['min'] ?? 0}}', '{{$data['max'] ?? 0}}'],
                    step: 1,

                    slide: function (event, ui) {
                        if (ui.values[0] == ui.values[1]) {
                            return false;
                        }

                        $("#min_price").val(ui.values[0]);
                        $("#max_price").val(ui.values[1]);
                    }
                });

                // $("#min_price").val($("#slider-range").slider("values", 0));
                // $("#max_price").val($("#slider-range").slider("values", 1));

            });

            // $('.anchorPriceFilter') .on(click)
            $(document).on("click", ".anchorPriceFilter", function (e) {
                e.preventDefault();
                const minPrice = $(this).data('min');
                const maxPrice = $(this).data('max');
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: "{{ route('front.category',['category'=> request()->route('category'), 'subcategory' => request()->route('subcategory'),'childcategory' => request()->route('childcategory')]) }}",
                    method: 'get',
                    data: {
                        min: minPrice,
                        max: maxPrice
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

            $(document).on("click", ".reviewStars", function (e) {
                e.preventDefault();
                const reviewStars = $(this).data('filter');
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: "{{route('front.category',['category'=> request()->route('category'), 'subcategory' => request()->route('subcategory'),'childcategory' => request()->route('childcategory')])}}",
                    method: 'get',
                    data: {
                        reviewStars: reviewStars
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

            $(document).on("click", ".discountedFilter", function (e) {
                e.preventDefault();
                const discount = $(this).data('filter');
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: "{{ route('front.category',['category'=> request()->route('category'), 'subcategory' => request()->route('subcategory'),'childcategory' => request()->route('childcategory')]) }}",
                    method: 'get',
                    data: {
                        discount: discount
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

            $(document).on("click", ".newestArrivalFilter", function (e) {
                e.preventDefault();
                const newest = $(this).data('filter');
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: "{{ route('front.category',['category'=> request()->route('category'), 'subcategory' => request()->route('subcategory'),'childcategory' => request()->route('childcategory')]) }}",
                    method: 'get',
                    data: {
                        newest: newest
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

            $(document).on("click", ".highestToLowest", function (e) {
                e.preventDefault();
                var currentURL = window.location.href;
                var category = currentURL.split('/').pop();
                const highest = $(this).data('filter');
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: category,
                    method: 'get',
                    data: {
                        highest: highest,
                        page: paginate,
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

            $(document).on("click", ".lowestToHighest", function (e) {
                e.preventDefault();
                var currentURL = window.location.href;
                var category = currentURL.split('/').pop();
                const lowest = $(this).data('filter');
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: category,
                    /*url: "{{ route('front.category',['category'=> request()->route('category' . '&page=' . $paginate), 'subcategory' => request()->route('subcategory' . '&page=' . $paginate),'childcategory' => request()->route('childcategory' . '&page=' . $paginate)]) }}",*/
                    method: 'get',
                    data: {
                        lowest: lowest,
                        page: paginate,
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

            $(document).on("click", ".filterButton", function (e) {
                e.preventDefault();
                const minPrice = $('#minPrice').val();
                const maxPrice = $('#maxPrice').val();
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: "{{ route('front.category',['category'=> request()->route('category'), 'subcategory' => request()->route('subcategory'),'childcategory' => request()->route('childcategory')]) }}",
                    method: 'get',
                    data: {
                        minPrice: minPrice,
                        maxPrice: maxPrice
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

            $(document).on("click", ".bestSeller", function (e) {
                e.preventDefault();
                const bestSeller = $(this).data('filter');
                // const filterPrice = $( this ).data('query');
                $.ajax({
                    url: "{{route('front.category',['category'=> request()->route('category'), 'subcategory' => request()->route('subcategory'),'childcategory' => request()->route('childcategory')])}}",
                    method: 'get',
                    data: {
                        bestSeller: bestSeller
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
                // console.log( $( this ).data('query'));
            });

        })(jQuery);

        // function applyFilter(event, minPrice,maxPrice){
        //     event.preventDefault();
        //     fetch('/filter', {
        //         method: 'post',
        //         headers: {
        //
        //         },
        //         body: JSON.stringify({min:minPrice, max:maxPrice})
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //
        //     })
        // }
    </script>
@endsection
