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
                                <form action="{{route('front.category')}}" method="GET">
                                    <div class="price-range-block">
                                        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                        <div class="livecount">
                                            $ <input type="number" name="min" min="0" oninput="" id="min_price"
                                                     value="{{$data['min'] ?? 0}}" class="price-range-field"/>
                                            <span>
                                        {{ __('To') }}
                                    </span>
                                            $ <input type="number" name="max" min="0" oninput="" id="max_price"
                                                     value="{{$data['max'] ?? 0}}" class="price-range-field"/>
                                        </div>
                                    </div>
                                    <button class="filter-btn btn btn-primary mt-3 mb-4"
                                            type="submit">{{ __('Search') }}</button>
                                </form>
                            </ul>
                        </div>
                        <div id="bigbazar-price-filter-list-1"
                             class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">
                            <h2 class="widget-title">{{ __('Price') }}</h2>
                            <ul class="price-filter-list">
                                <li>
                                    <a href="">Under $25</a>
                                </li>
                                <li>
                                    <a href="">$25 to $50</a>
                                </li>
                                <li>
                                    <a href="">$50 to $100</a>
                                </li>
                                <li>
                                    <a href="">$100 to $200</a>
                                </li>
                                <li>
                                    <a href="">$200 to Above</a>
                                </li>
                                <li>
                                    <form class="priceFilter" action="">
                                        <input type="number" min="0" name="" id="">
                                        <input type="number" min="0" name="" id="">
                                        <button>Go</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div id="bigbazar-price-filter-list-1"
                             class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">
                            <h2 class="widget-title">{{ __('Deals & Discount') }}</h2>
                            <ul class="price-filter-list">
                                <li>
                                    <a href="#">All Discount</a>
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
                                <li class="starCont">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>& Up</span>
                                </li>
                                <li class="starCont">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </li>
                                <li class="starCont">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </li>
                                <li class="starCont">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </li>
                                <li class="starCont">
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </li>
                            </ul>
                        </div>
                        <div id="bigbazar-price-filter-list-1"
                             class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">
                            <h2 class="widget-title">{{ __('New & Upcoming') }}</h2>
                            <ul class="price-filter-list">
                                <li>
                                    <a href="#">New Arrivals</a>
                                </li>
                                <li>
                                    <a href="#">Coming Soon</a>
                                </li>
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
                        <div class="col-md-8">
                            <div class="shopLabel">
                                <ul>
                                    <li>
                                        <label>Show :</label>
                                        <div class="pagination">
                                            @if(!empty(isset($category)))
                                                <span>/</span>
                                                <a href="{{ url()->current().'?pageby=9' }}">9</a>
                                                <span>/</span>
                                                <a href="{{ url()->current().'?pageby=12' }}">12</a>
                                                <span>/</span>
                                                <a href="{{ url()->current().'?pageby=18' }}">18</a>
                                                <span>/</span>
                                                <a href="{{ url()->current().'?pageby=24' }}">24</a>
                                                <span>/</span>
                                                <a href="{{ url()->current().'?pageby=30' }}">30</a>
                                            @else
                                                <a href="{{ route('front.category', ['pageby' => 9]) }}">9</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 12]) }}">12</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 18]) }}">18</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 24]) }}">24</a>
                                                <span>/</span>
                                                <a href="{{ route('front.category', ['pageby' => 30]) }}">30</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    @forelse($data['prods'] as $item)
                                        {{--                                        {{ dd($item) }}--}}
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-box">
                                                <div class="pro-img">
                                                    <a href="#">
                                                        <img
                                                            src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"
                                                            alt="img">
                                                    </a>

                                                    @if (round((int)$item->offPercentage()) > 0)
                                                        <div class="on-sale">- {{ round((int)$item->offPercentage() )}}
                                                            %
                                                        </div>
                                                    @endif
                                                    <div class="overlay">
                                                        <ul>
                                                            <li><a href="#"><i class="far fa-search"></i></a></li>
                                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                                            <li><a href="{{ route('front.product', $item['slug']) }}">
                                                                    <i class="fal fa-shopping-cart"></i></a></li>
                                                            <li>
                                                                <a href="{{ route('front.product', $item['slug']) }}"><img
                                                                        src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"
                                                                        class="img-fluid" alt="img"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4>{{$item->name ?? 'Shop'}}</h4>
                                                <p>{{$item->category->name ?? 'Shop'}}</p>
                                                {{--                                                {{ dd($item->price, $item->setCurrency()) }}--}}
                                                {{--                                                <span>${{$item->price ?? 'Shop'}}</span>--}}
                                                <span>{{ $item->setCurrency() ?? '0.00' }}</span>
                                                <del>{{ $item->showPreviousPrice() ?? '0.00' }}</del>
                                            </div>
                                        </div>
                                    @empty
                                        <p>There Are No Products</p>
                                    @endforelse
                                </div>
                                <div class="col-md-12">
                                    <div class="pagination listPaginate">
                                        {{--                                        {{ $data['prods']->links() . ($data['min'] ? '&min=' . $data['min'] : '') . ($data['max'] ? '&max=' . $data['max'] : '') }}--}}
                                        {{ $data['prods']->appends(request()->input())->links() }}
                                        {{--                        <ul>--}}
                                        {{--                            <li><a href="#" class="active">1</a></li>--}}
                                        {{--                            <li><a href="">2</a></li>--}}
                                        {{--                            <li><a href="#"><i class="fal fa-angle-right"></i></a></li>--}}
                                        {{--                        </ul>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
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
@section('script')

    <script type="text/javascript">
        (function ($) {
            "use strict";

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

        })(jQuery);

    </script>
@endsection
