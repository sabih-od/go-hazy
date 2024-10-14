@extends('new-layout.layout.app')
@section('content')
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <section class="inner-banner">
        @if($data['cat']->image)

        <img src="{{asset('assets/images/categories/'.$data['cat']->image)}}" class="w-100 imginer" alt="img">
        @else
            <img src="{{asset('assets/new-layout/images/slidebg.webp')}}" class="w-100 imginer" alt="img">
       @endif
        <div class="overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3>Shop</h3>

                            <p>{{ $data['cat']->name ?? 'Shop' }}</p>


                    </div>
                    <div class="col-md-6">
                        @if($data['cat']->image)

                            <img src="#" class="w-100 imginer" >
                        @else
                            <figure><img src="{{asset('assets/new-layout/images/slideimg.webp')}}" class="img-fluid" alt="img"></figure>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="shop-page">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <div class="shop-filter">
                        <h2 class="heading">Filter By Price</h2>
                        <h3>Filter By Price</h3>
                        <div class="rabge-set">
                            <label for="amount">Price: $<span id="min-amount">0</span> — $<span id="max-amount">200</span></label>
                            <p>
                                <input type="text" id="amount" readonly>
                                <input type="text" id="amount1" readonly>
                            </p>
                            <div id="slider-range"></div>
                            <button class="anchorPriceFilter">Filter</button>
                        </div>
                    </div>

                    <div id="accordion" class="faq-content">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Deals & Discount <i class="fas fa-caret-down"></i>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="discount">
                                        <li><a href="#" class="discountedFilter" data-filter="discounted">All Discount</a></li>
                                        <li><a href="#">Today's Deals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingtwo">
                                <button class="btn" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                    Avg. Customer Review <i class="fas fa-caret-down"></i>
                                </button>
                            </div>
                            <div id="collapsetwo" class="collapse show" aria-labelledby="headingtwo" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="star">
                                        <li>
                                            <a href="#">
                                                <div class="reviewStars" data-filter="5">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span>& Up</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="reviewStars" data-filter="4">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span>& Up</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="reviewStars" data-filter="3">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span>& Up</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="reviewStars" data-filter="2" >
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span>& Up</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="reviewStars" data-filter="1">
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span>& Up</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingthre">
                                <button class="btn" data-toggle="collapse" data-target="#collapsethre" aria-expanded="true" aria-controls="collapsethre">
                                    Avg. Customer Review <i class="fas fa-caret-down"></i>
                                </button>
                            </div>
                            <div id="collapsethre" class="collapse show" aria-labelledby="headingthre" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="discount">
                                        <li><a href="#" class="highestToLowest" data-filter="highest">Highest to Lowest</a></li>
                                        <li><a href="#" class="lowestToHighest" data-filter="lowest">Lowest to Highest</a></li>
                                        <li><a href="#" class="bestSeller" data-filter="bestSeller">Best Sellers</a></li>
                                        <li><a href="#" class="newestArrivalFilter" data-filter="newest">Newest Arrival</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-9">
                    <div class="filter">
                        <div>
                            <ul>
                                <li>
                                    <a href="#"><i class="fas fa-th-large"></i></a>
                                </li>
                                <li><a href="#"><i class="fal fa-list"></i></a></li>
                            </ul>
                            <span>Showing 1–16 of 72 results</span>
                        </div>
                        <select>
                            <option>Short by Latest</option>
                        </select>
                    </div>

                        @include('frontend.ajax.filter-price')



                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
@push('script')
    <script type="text/javascript">
        (function ($) {
            "use strict";

            {{--var paginate = {!! json_encode(app('request')->input('page') ?? null) !!};--}}
            {{--$(function () {--}}
            {{--    $("#slider-range").slider({--}}
            {{--        range: true,--}}
            {{--        orientation: "horizontal",--}}
            {{--        min: 0,--}}
            {{--        max: 1500,--}}
            {{--        values: ['{{$data['min'] ?? 0}}', '{{$data['max'] ?? 0}}'],--}}
            {{--        step: 1,--}}

            {{--        slide: function (event, ui) {--}}
            {{--            if (ui.values[0] == ui.values[1]) {--}}
            {{--                return false;--}}
            {{--            }--}}

            {{--            $("#min_price").val(ui.values[0]);--}}
            {{--            $("#max_price").val(ui.values[1]);--}}
            {{--        }--}}
            {{--    });--}}

            {{--    $("#min_price").val($("#slider-range").slider("values", 0));--}}
            {{--    $("#max_price").val($("#slider-range").slider("values", 1));--}}

            {{--});--}}

            // $('.anchorPriceFilter') .on(click)
            $(function() {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 200,
                    values: [0, 200],
                    slide: function(event, ui) {
                        $("#amount").val("$" + ui.values[0]);
                        $("#amount1").val("$" + ui.values[1]);
                        $("#min-amount").text(ui.values[0]);
                        $("#max-amount").text(ui.values[1]);
                    }
                });

                $("#amount").val("$" + $("#slider-range").slider("values", 0));
                $("#amount1").val("$" + $("#slider-range").slider("values", 1));
            });

            $(document).on("click", ".anchorPriceFilter", function(e) {
                e.preventDefault();
                const minPrice = $("#slider-range").slider("values", 0);
                const maxPrice = $("#slider-range").slider("values", 1);

                $.ajax({
                    url: "{{ route('front.category', ['category'=> request()->route('category'), 'subcategory' => request()->route('subcategory'),'childcategory' => request()->route('childcategory')]) }}",
                    method: 'get',
                    data: {
                        min: minPrice,
                        max: maxPrice
                    },
                    success: function(result) {
                        $("#filterByPrice").html(result);
                    }
                });
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
                        // page: paginate,
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
{{--                    /*url: "{{ route('front.category',['category'=> request()->route('category' . '&page=' . $paginate), 'subcategory' => request()->route('subcategory' . '&page=' . $paginate),'childcategory' => request()->route('childcategory' . '&page=' . $paginate)]) }}",*/--}}
                    method: 'get',
                    data: {
                        lowest: lowest,
                        // page: paginate,
                    },
                    success: function (result) {
                        $("#filterByPrice").html(result);
                    }
                });
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
@endpush
