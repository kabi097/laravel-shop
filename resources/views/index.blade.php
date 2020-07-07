@extends('layouts.default')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Witaj w naszym sklepie!</h1>
            <p class="lead">Zapoznaj się z naszą ofertą.</p>
            <hr class="my-2">
            <p class="lead mt-2">
                <a class="btn btn-primary btn-lg" href="{{ route('products') }}" role="button">Wszystkie produkty</a>
            </p>
        </div>
    </div>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-stretch">
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card text-left h-100">
                            <img class="card-img-top" src="https://via.placeholder.com/250x150">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title text-body"><a class="text-body" href="{{ action("HomeController@product", $product) }}">{{ $product->title }}</a></h4>
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
