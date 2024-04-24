<div class="row">
    <div class="col-12">
        <div class="swiper popularSlider">
            <div class="swiper-wrapper">
                @foreach($new_categories as $new_category)
                    @php
                        $new_categoryImage = $new_category->image ? asset('assets/images/products/' . $new_category->image) : null;
                        if (!$new_categoryImage) {
                            $new_categoryImage = 'https://w0.peakpx.com/wallpaper/132/110/HD-wallpaper-404-not-found-error.jpg';
                        }
                      $firstProduct = $new_category->products->first();
                        if ($firstProduct && $firstProduct->photo) {
                            $productImage = asset('assets/images/products/' . $firstProduct->photo);
                        } else {
                            $productImage = $new_categoryImage;
                        }
                    @endphp
                    <div class="swiper-slide">
                        <div class="product-box" data-aos="fade-right">
                            <a href="{{ route('front.category', $new_category->slug) }}">
                                <div class="pro-img">
                                    <img src="{{ $productImage }}" alt="img">
                                </div>
                                <h4 data-id="{{ $new_category->id }}">{{ $new_category->name ?? 'Shop' }}</h4>
                            </a>
                            <p>({{ count($new_category->products) }}) Products</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

