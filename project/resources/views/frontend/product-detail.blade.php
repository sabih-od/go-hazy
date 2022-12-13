@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>{{ __('Product Details') }}</h6>
                    <ul>
                        <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">{{ __('Product Details') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="productDetail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="productImgMain">
                        <div class="product-detail-slider">
                            @foreach($productt->galleries as $gal)
                                <div>
                                    <img src="{{asset('assets/images/galleries/'.$gal->photo) ?? ''}}"
                                         alt="Thumb Image"/>
                                </div>
                            @endforeach
                        </div>
                        <div class="product-detail-nav">
                            @foreach($productt->galleries as $gal)
                                <div>
                                    <img class="ml-10" src="{{asset('assets/images/galleries/'.$gal->photo) ?? ''}}"
                                         alt="Thumb Image"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prodctdetailContent">
                        <h2>{{ $productt->category->name ?? '' }}
                        </h2>
                        <span>${{ $productt->price ?? '' }}
                        </span>
                        <p>{{ substr($productt->details, 0, 300) }}
                        </p>
                    </div>
                    <form action="{{ route('product.cart.quickadd', $productt->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ (int)$productt->id }}">
                        <div class="proCounter count mr-4">
                            <span class="minus" id="minus-qty"><i class="fa fa-angle-down"></i></span>
                            <input type="text" id="input-quantity" value="1"/>
                            <span class="plus" id="plus-qty"><i class="fa fa-angle-up"></i></span>
                            <div class="cartBtn">
                                <button type="submit" class="themeBtn">Add to Cart</button>
                            </div>
                        </div>
                    </form>
                    <div class="sku">
                        <p>SKU: {{ $productt->sku }} Category: <a href="#">{{ $productt->category->name }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
            <script>
                $(document).ready(function () {
                    //minus quantity
                    $('#minus-qty').css("margin-top");
                    $('#minus-qty').click(function () {
                        var cart = $(this).next('#input-quantity').val();
                        if (cart < 2) {
                            // alert('Quanty Must Be 1');
                            toastr.error('Quantity Must Be 1');
                        } else {
                            var cart = parseInt(cart) - parseInt(1);
                            //alert(cartval);
                            $(this).next('#input-quantity').append().val(cart);
                        }
                    });

                    //add quantity
                    $('#plus-qty').click(function () {
                        var cart = $(this).prev('#input-quantity').val();
                        var cart = parseInt(cart) + parseInt(1);
                        //alert(cartval);
                        toastr.success('Quantity Updated Successfully');
                        $(this).prev('#input-quantity').append().val(cart);
                    });
                });
            </script>
@endsection
