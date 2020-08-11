@extends('layouts.default')

@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 product-gallery">
                            @if(json_decode($product->images))
                                <div class="fullscreen-dark"></div>
                                <div class="fullscreen shadow-lg border rounded">
                                    <div class="image-previous">
                                        <i class="fa fa-arrow-circle-o-left fa-2x text-white-50" aria-hidden="true"></i>
                                    </div>
                                    <div class="image-next">
                                        <i class="fa fa-arrow-circle-o-right fa-2x text-white-50" aria-hidden="true"></i>
                                    </div>
                                    <img class="img-fluid rounded product-image" src="{{ asset('storage/'.json_decode($product->images)[0]) }}" alt="">        
                                </div>
                                <img class="img-fluid rounded product-image" src="{{ asset('storage/'.json_decode($product->images)[0]) }}" alt="">
                                <div class="row justify-content-start mb-4">
                                    @foreach(json_decode($product->images) as $image)
                                        <div class="col-4 col-md-3 mt-2 mr-0 ml-0 product-thumbnail">
                                            <img src="{{ Voyager::image($product->getThumbnail($image, 'cropped')) }}" style="cursor: pointer; width: 100%">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <img class="img-fluid rounded" src="https://via.placeholder.com/500x400" alt="">
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <h3 class="mt-1 font-weight-bold">{{ $product->title }}</h3>
                            <h5 class="mt-4 text-danger font-weight-bold">Cena: {{ $product->price }} zł</h5>
                            <h5 class="mb-4">Ilość: {{ $product->quantity > 1 ? $product->quantity . ' sztuk' : $product->quantity . ' sztuka' }} </h5>
                            <h5 class="mb-4">Data: <b>{{ $product->date }}</b></h5>
                            <p class="card-text">{{ $product->description }}</p>                            
                            <form class="form-group" id="product_form" method="POST" action="{{ route("add_to_cart") }}">
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary float-left mr-3 mb-3">Dodaj do koszyka</button>
                                <div class="float-left">
                                    <input type="number" class="form-control" name="quantity" min=1 max={{ $product->quantity }} value=1 aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Ilość sztuk</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
