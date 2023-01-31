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
{{--                @foreach($sub as $subcat)--}}
{{--                    {{ dd($sub) }}--}}
                    <div class="col-md-12">
                    <h6>{{ $subcat->name ?? 'Shop'}}</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">{{ $subcat->name ?? 'Shop'}}</a></li>
                    </ul>
                </div>
{{--                @endforeach--}}
            </div>
        </div>
    </section>

    <section class="proSec proPage">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-4">
                    <div class="shopNav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><span>/</span></li>
                            <li>{{ $subcat->name ?? 'Shop' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="shopLabel">
                        <ul>
                            <li>
                                <label>Show :</label>
                                <div class="pagination">
                                    <a href="#">9</a>
                                    <span>/</span>
                                    <a href="#">12</a>
                                    <span>/</span>
                                    <a href="#">18</a>
                                    <span>/</span>
                                    <a href="#">24</a>
                                </div>
                            </li>
                            {{ $subcat->name  ?? 'Shop'}}
                            <li>
                                <a href="#"><img src="{{asset('assets/images/bar1.png')}}" class="img-fluid" alt="img"></a>
                                <a href="#"><img src="{{asset('assets/images/bar2.png')}}" class="img-fluid" alt="img"></a>
                                <a href="#"><img src="{{asset('assets/images/bar3.png')}}" class="img-fluid" alt="img"></a>
                            </li>
                            <li>
                                <select>
                                    <option>Default Sorting</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
{{--                @forelse($data['prods'] as $item)--}}
{{--                    {{ dd($item) }}--}}
{{--                    <div class="col-lg-4 col-sm-6">--}}
{{--                        <div class="product-box" data-aos="fade-right">--}}
{{--                            <div class="pro-img">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}" alt="img">--}}
{{--                                </a>--}}
{{--                                @if (round((int)$item->offPercentage()) > 0)--}}
{{--                                    <div class="on-sale">- {{ round((int)$item->offPercentage() )}}%</div>--}}
{{--                                @endif--}}
{{--                                <div class="overlay">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#"><i class="far fa-search"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>--}}
{{--                                        <li><a href="{{ route('front.product', $item['slug']) }}">--}}
{{--                                                <i class="fal fa-shopping-cart"></i></a></li>--}}
{{--                                        <li><a href="{{ route('front.product', $item['slug']) }}"><img--}}
{{--                                                    src="{{asset('assets/images/products/'.$item->photo) ?? 'Shop'}}"--}}
{{--                                                    class="img-fluid" alt="img"></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h4>{{$item->name ?? 'Shop'}}</h4>--}}
{{--                            <p>{{$item->category->name ?? 'Shop'}}</p>--}}
{{--                            --}}{{--                            <span>${{$item->price ?? 'Shop'}}</span>--}}
{{--                            <span>{{ $item->setCurrency() ?? 'Shop' }}</span>--}}
{{--                            <del>{{ $item->showPreviousPrice() ?? 'Shop' }}</del>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    <p>There Are No Products</p>--}}
{{--                @endforelse--}}

                <div class="col-md-12">
                    <div class="pagination listPaginate">
{{--                        {{ $data['prods']->links() }}--}}
                        {{--                        <ul>--}}
                        {{--                            <li><a href="#" class="active">1</a></li>--}}
                        {{--                            <li><a href="">2</a></li>--}}
                        {{--                            <li><a href="#"><i class="fal fa-angle-right"></i></a></li>--}}
                        {{--                        </ul>--}}
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
