@extends('layouts.admin')
@section('styles')

    <link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet"/>

@endsection
@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __("Product Bulk Zip Upload") }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __("Products") }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-index') }}">{{ __("All Products") }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-import') }}">{{ __("Bulk Zip Upload") }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- ZIP FILE FORM START --}}
        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12 p-5">

{{--                    <div class="gocover"--}}
{{--                         style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>--}}
{{--geniusform--}}
                    <form id="" action="{{route('admin.prod.upload.zip.bulk')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        @include('alerts.admin.form-both')

                        <div class="row text-center">

                            <div class="col-lg-12">
                                <div class="csv-icon">
                                    <i class="fas fa-file-zip"></i>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="left-area mr-4">
                                    <h4 class="heading">{{ __("Upload a Zip File") }} *</h4>
                                </div>
                                <span class="file-btn">
									<input type="file" id="zipfile" name="zipfile" required>
								</span>
                            </div>

                        </div>

                        <input type="hidden" name="type" value="Physical">
                        <div class="row">
                            <div class="col-lg-12 mt-4 text-center">
                                <button class="mybtn1 mr-5" type="submit">{{ __("Start Import") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- ZIP FILE FORM END --}}

    </div>



@endsection

@section('scripts')

    @include('partials.admin.product.product-scripts')
@endsection
