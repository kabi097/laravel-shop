@extends('layouts.default')

@section('content')
    <form method="POST" action="{{ route('checkout') }}">
        @csrf
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <div class="card" id="summary">
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold border-bottom pb-2">Zamówienie</h4>
                                @if(!empty($cart))
                                <table class="table mt-2 table-borderless" id="product-table">
                                    <thead>
                                        <tr>
                                            <th>Produkt</th>
                                            <th>Cena</th>
                                            <th>Ilość</th>
                                            <th>Razem</th>
                                        </tr>
                                    </thead>
                                    <tbody class="summary-content">
                                    @foreach ($cart as $key => $product)
                                        <input type="hidden" name="products[{{ $key }}][id]" value="{{ $product['productId'] }}">
                                        <tr class="border-bottom product" data-product-id="{{ $product['productId'] }}" data-price="{{ $product['product']->price }}" data-quantity="{{ $product['product']->quantity }}">
                                            <td scope="row">
                                                <div class="d-flex">
                                                    <a href="{{ route('product', ['product' => $product['product']->id]) }}">    
                                                        @if (json_decode($product['product']->images))
                                                            <img src="{{ Voyager::image($product['product']->getThumbnail(json_decode($product['product']->images)[0], 'cropped')) }}" style="width: 100px; height: 100px;" class="d-none d-md-block rounded mr-3">
                                                        @else
                                                            <img src="https://via.placeholder.com/100x100" class="d-none d-md-block rounded mr-3" style="min-width: 100px">
                                                        @endif
                                                    </a>
                                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                                        <h5>
                                                            <a class="text-body text-decoration-none" href="{{ route('product', ['product' => $product['product']->id]) }}">{{ $product['product']->title }}</a>
                                                        </h5>
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
                                                    <input type="text" name="products[{{ $key }}][quantity]" class="form-control w-50 form-control-sm product-quantity" placeholder="Ilość" aria-label="Ilość" aria-describedby="btnGroupAddon" value="{{ $product['quantity'] }}" readonly>
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
                                @else
                                    <h4 class="p-4 text-center">Brak produktów w koszyku</h4>
                                @endif
                                @error('products.*')
                                    <span role="alert" class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if(!empty($cart))
                            <div class="card my-3" id="product-delivery">
                                <div class="card-body">
                                    <h4 class="card-title font-weight-bold border-bottom pb-2">Płatność i dostawa</h4>
                                    <p class="card-text">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name" class="font-weight-bold">Imię</label>
                                                <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" id="first_name" aria-describedby="first_name" placeholder="Imię">
                                                @error('first_name')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="last_name" class="font-weight-bold">Nazwisko</label>
                                                <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" id="last_name" aria-describedby="last_name" placeholder="Nazwisko">
                                                @error('last_name')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="street" class="font-weight-bold">Ulica</label>
                                                <input type="text" class="form-control" value="{{ old('street') }}" name="street" id="street" aria-describedby="street" placeholder="Ulica">
                                                @error('street')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="city" class="font-weight-bold">Miasto</label>
                                                <input type="text" class="form-control" value="{{ old('city') }}" name="city" id="city" aria-describedby="city" placeholder="Miasto">
                                                @error('city')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="postal_code" class="font-weight-bold">Kod pocztowy</label>
                                                <input type="text" class="form-control" value="{{ old('postal_code') }}" name="postal_code" id="postal_code" aria-describedby="postal_code" placeholder="Kod pocztkowy">
                                                @error('postal_code')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="font-weight-bold">E-mail</label>
                                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" aria-describedby="email" placeholder="E-mail">
                                                @error('email')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="nip" class="font-weight-bold">NIP</label>
                                                <input type="nip" class="form-control" value="{{ old('nip') }}" name="nip" id="nip" aria-describedby="nip" placeholder="NIP">
                                                @error('nip')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone_number" class="font-weight-bold">Numer telefonu</label>
                                                <input type="phone_number" class="form-control" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" aria-describedby="phone_number" placeholder="Numer telefonu">
                                                @error('phone_number')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="payment" class="font-weight-bold d-block">Płatność</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-primary payment-method {{ old('payment') ? 'active' : '' }} @if (!$errors->any()) 'active' @endif">
                                                        <input type="radio" name="payment" value="card" autocomplete="off" {{ old('payment')=="card" ? 'checked' : '' }}{{ old('payment')==null ? 'checked' : '' }}>
                                                        MasterCard / Visa
                                                    </label>
                                                    <label class="btn btn-primary payment-method {{ old('payment') ? 'active' : '' }}">
                                                        <input type="radio" name="payment" value="paypal" autocomplete="off" {{ old('payment')=="paypal" ? 'checked' : '' }}>
                                                        PayPal
                                                    </label>
                                                    <label class="btn btn-primary payment-method {{ old('payment') ? 'active' : '' }}">
                                                        <input type="radio" name="payment" value="payu" autocomplete="off" {{ old('payment')=="payu" ? 'checked' : '' }}>
                                                        PayU
                                                    </label>
                                                </div>
                                                @error('payment')
                                                    <small role="alert" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold border-bottom pb-2">Podsumowanie</h4>
                                <div class="card-text my-2" id="product-summary-table">
                                    @if(!empty($cart))
                                        <table class="table table-borderless mb-2">
                                            <tr>
                                                <td>Ilość</td>
                                                <td class="font-weight-bold text-nowrap" id="summary-quantity"></td>
                                            </tr>
                                            <tr>
                                                <td>Razem</td>
                                                <td class="font-weight-bold text-nowrap" id="summary-price"></td>
                                            </tr>
                                            <tr>
                                                <td>Metoda płatności</td>
                                                <td class="font-weight-bold" id="summary-payment"></td>
                                            </tr>
                                        </table>
                                    @endif
                                    <button type="submit" class="btn btn-block btn-success" @empty($cart) disabled @endempty>
                                        Kupuję i płacę
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
