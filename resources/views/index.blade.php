@extends('layouts.default')

@section('content')
    @if ($success = Session::get('success'))
        <div class="bg-success w-100 text-white">
            <div class="text-right">
                <i class="fa fa-times info-close pr-2 pt-2" style="cursor: pointer;" aria-hidden="true" onclick="$(this).parent().parent().remove();"></i>
            </div>
            <h3 class="text-center m-0 pb-5 pt-4">
                <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>{{ $success }}
            </h3>
        </div>
    @endif
    <div id="carouselProduct" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($featuredProducts as $key => $featuredProduct)
                <li data-target="#carouselProduct" data-slide-to="{{ $key }}" class="{{ ($key==0) ? 'active' : ''}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($featuredProducts as $key => $featuredProduct)
                <div class="carousel-item {{ ($key==0) ? 'active' : ''}}">
                    <div class="product-image-carousel" style="background-image: url({{ asset('storage/'.json_decode($featuredProduct->images)[0]) }})"> </div>
                    <div class="carousel-caption d-md-block">
                        <a href="{{ route("product", ['product' => $featuredProduct->id]) }}" class="text-white text-decoration-none">
                            <h4 class="font-weight-bold">{{ $featuredProduct->title }}</h4>
                            <h5>Cena: <strong>{{ $featuredProduct->price }} zł</strong></h5>
                            <p>{{ substr($featuredProduct->description, 0, 200) }}...</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselProduct" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="py-5 bg-light">
        <div class="container">
            <h4 class="mb-3">Ostatnio dodane</h4>
            <div class="row justify-content-center align-content-center">
                @foreach ($lastProducts as $product)
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card text-left h-100 mx-2">
                                @if(json_decode($product->images))
                                    <img src="{{ Voyager::image($product->getThumbnail(json_decode($product->images)[0], 'cropped')) }}">
                                @else 
                                    <img class="card-img-top" src="https://via.placeholder.com/300x220">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title"><a class="text-body" href="{{ action("HomeController@product", $product) }}">{{ $product->title }}</a></h4>
                                    <h6 class="card-subtitle text-muted mb-1"><a href="{{ action('HomeController@products', $product->category) }}">{{ $product->category->name }}</a></h6>
                                    <p class="card-text text-justify">{{ Str::substr($product->description, 0, 50)."..." }}</p>
                                    <div class="mt-auto">
                                        <a href="{{ action("HomeController@product", $product) }}" class="btn btn-outline-primary float-right self-align-end">Cena: {{ $product->price }} zł</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                <a class="btn btn-primary mx-auto mt-4" href="{{ route('products') }}" role="button">Zobacz więcej</a>
            </div>
        </div>
    </div>
@endsection
