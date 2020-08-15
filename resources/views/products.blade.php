@extends('layouts.default')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            @if($category==null )
                <h3>Wszystkie produkty</h3>
            @else
                <h3>Produkty w kategorii <b>{{ $category->name }}</b></h3>
            @endif
        </div>
    </div>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-stretch">
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card text-left h-100">
                            @if(json_decode($product->images))
                                <img src="{{ Voyager::image($product->getThumbnail(json_decode($product->images)[0], 'cropped')) }}">
                            @else 
                                <img class="card-img-top" src="https://via.placeholder.com/300x220">
                            @endif
                            <div class="card-body d-flex flex-column">
        l                        <h4 class="card-title"><a class="text-body" href="{{ action("HomeController@product", $product) }}">{{ $product->title }}</a></h4>
                                <h6 class="card-subtitle text-muted mb-1"><a href="{{ action('HomeController@products', $product->category) }}">{{ $product->category->name }}</a></h6>
                                <p class="card-text text-justify">{{ Str::substr($product->description, 0, 50)."..." }}</p>
                                <div class="mt-auto">
                                    <a href="{{ action("HomeController@product", $product) }}" class="btn btn-outline-primary float-right self-align-end">Cena: {{ $product->price }} zł</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row align-items-stretch">
                <div class="mx-auto">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
@endsection
