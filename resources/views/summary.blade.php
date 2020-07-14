@extends('layouts.default')

@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="card" id="summary">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold border-bottom pb-2">Zamówienie</h4>
                        @if(!empty($cart))
                        <table class="table mt-2 table-borderless">
                            <thead>
                                <tr>
                                    <th>Produkt</th>
                                    <th>Cena</th>
                                    <th>Ilość</th>
                                    <th>Razem</th>
                                </tr>
                            </thead>
                            <tbody class="summary-content">
                        @foreach ($cart as $product)
                            <tr class="border-bottom product" data-product-id="{{ $product['productId'] }}" data-price="{{ $product['product']->price }}" data-quantity="{{ $product['product']->quantity }}">
                                <td scope="row">
                                    <div class="d-flex">
                                        <img src="https://via.placeholder.com/100x100" class="img-fluid rounded mr-3" style="min-width: 100px">
                                        <div class="d-flex flex-column justify-content-between align-items-start">
                                            <h5>{{ $product['product']->title }}</h5>
                                            <button type="button" class="btn btn-sm btn-light product-delete">
                                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-center text-nowrap product-single-price">{{ $product['product']->price }} zł</p>
                                </td>
                                <td>
                                    <div class="btn-group w-50" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-info product-minus" @if($product['quantity']<=1) disabled @endif>
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                        </button>
                                        <input type="text" class="form-control w-50 form-control-sm product-quantity" placeholder="Ilość" aria-label="Ilość" aria-describedby="btnGroupAddon" value="{{ $product['quantity'] }}" readonly>
                                        <button type="button" class="btn btn-sm btn-outline-info product-plus" @if($product['quantity']>=$product['product']->quantity) disabled @endif>
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="text-center text-nowrap font-weight-bold product-price">
                                    {{ $product['product']->price * $product['quantity']}} zł
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                        <h4 class="float-right">
                            Razem: <span id="product-summary"></span>
                        </h4>
                        @endif
                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold border-bottom pb-2">Płatność i dostawa</h4>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title font-weight-bold border-bottom pb-2">Podsumowanie</h4>
                        <div class="card-text my-2">
                            <table class="table table-borderless mb-2">
                                <tr>
                                    <td>Ilość</td>
                                    <td class="font-weight-bold">4</td>
                                </tr>
                                <tr>
                                    <td>Razem</td>
                                    <td class="font-weight-bold">420 zł</td>
                                </tr>
                                <tr>
                                    <td>Metoda płatności</td>
                                    <td class="font-weight-bold">MasterCard</td>
                                </tr>
                            </table>
                            <button type="submit" name="" id="" class="btn btn-block btn-success" btn-lg btn-block">
                                Kupuję i płacę
                            </button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
