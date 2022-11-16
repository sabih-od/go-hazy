@extends('layouts.app')
@section('content')

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>


    <section class="innerBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Shop</h6>
                </div>
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
                            <li>Shop</li>
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
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-right">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro1.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Accessories Men/Women, Clothing/ Apparel</p>
                        <span>$200.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-up">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro2.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-down">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro3.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Accessories Men/Women, Clothing/ Apparel</p>
                        <span>$200.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-left">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro4.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$67.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-right">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro5.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-up">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro6.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-down">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro7.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-left">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro8.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-left">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro9.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-left">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro10.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-left">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro11.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-box" data-aos="fade-left">
                        <div class="pro-img">
                            <a href="#">
                                <img src="{{asset('assets/images/pro8.jpg')}}" alt="img">
                            </a>
                            <div class="overlay">
                                <ul>
                                    <li><a href="#"><i class="far fa-search"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><img src="{{asset('assets/images/compare.png')}}" class="img-fluid" alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Product</h4>
                        <p>Clothing/ Apparel</p>
                        <span>$55.00</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pagination listPaginate">
                        <ul>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#"><i class="fal fa-angle-right"></i></a></li>
                        </ul>
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
