<div class="row" id = "filterByPrice">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                @forelse($data['prods'] as $item)
                    @php
                        $price = $item->getOriginal('price');
                    @endphp

                    <div class="col-lg-4 col-sm-6">
                        <div class="product-box">
                            <div class="pro-img">
                                <a href="{{ route('front.product', $item['slug']) }}">
                                    @if(!empty($item->photo) && file_exists(public_path('assets/images/products/'.$item->photo )))
                                    <img
                                        src="{{asset('assets/images/products/'.$item->photo)}}"
                                        alt="img">
                                    @else
                                        <img
                                            src="{{asset('assets/images/noimage.png')}}"
                                            alt="img">
                                    @endif
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
{{--                                                                            {{ dd($item->price, $item->setCurrency()) }}--}}
                            {{--                                                <span>${{$item->price ?? 'Shop'}}</span>--}}
{{--                            @dd($item->setCurrency())--}}
                            <span>${{ number_format($price, 2) }}</span>
                            <del>${{ ($item->showPreviousPrice() ?? 0.00) }}</del>
                        </div>
                    </div>
                @empty
                    <p>There Are No Products</p>
                @endforelse
            </div>
            <div class="col-md-12">
                <div class="pagination listPaginate">
                    {{ $data['prods']->appends($_GET)->links() }}
                    {{--{{ $prods->appends(request()->input())->links() }}--}}
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
