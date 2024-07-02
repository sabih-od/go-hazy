@extends('new-layout.layout.app')
@section('content')
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <section class="inner-banner">
        <img src="{{asset('assets/new-layout/images/slidebg.webp')}}" class="w-100 imginer" alt="img">
        <div class="overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3>Blog</h3>
                    </div>
                    <div class="col-md-6">
                        <figure><img src="{{asset('assets/new-layout/images/slideimg.webp')}}" class="img-fluid"
                                     alt="img"></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-page">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)

                    <div class="col-md-6">
                        <div class="blog-card">
                            <figure class="blog-card_img">
                                <img src="{{ asset('assets/images/blogs/'.$blog->photo) ?? '' }}" alt="image" class="img-fluid">
                            </figure>
                            <div class="blog-card__content">
                                <h5 class="sub-heading">{{ $blog->created_at->diffForHumans() }}</h5>
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
    </section>

@endsection
