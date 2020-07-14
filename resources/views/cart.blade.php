<div id="cart" class="card rounded" style="display: none;">
    <div class="card-body">
        <h5 class="text-center border-bottom pb-2 m-0">
            <i class="fa fa-shopping-cart mr-1" aria-hidden="true"></i>
            Twój koszyk
        </h5>
        <div class="cart-content">
        @if(!empty($cart))
            @foreach ($cart as $product)
                <div class="card-text d-flex align-items-center pb-3 border-bottom product mt-1" data-product-id="{{ $product['productId'] }}" data-price="{{ $product['product']->price }}" data-quantity="{{ $product['product']->quantity }}">
                    <div class="pl-1 mr-2 pt-1">
                        <button type="button" class="btn btn-outline product-delete">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div>
                        <p class="m-0 font-weight-bold">{{ $product['product']->title }}</p>
                        <div class="btn-group w-50" role="group">
                            <button type="button" class="btn btn-sm btn-outline-info product-minus" @if($product['quantity']<=1) disabled @endif>
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </button>
                            <input type="text" class="form-control w-50 form-control-sm product-quantity" placeholder="Ilość" aria-label="Ilość" aria-describedby="btnGroupAddon" value="{{ $product['quantity'] }}" readonly>
                            <button type="button" class="btn btn-sm btn-outline-info product-plus" @if($product['quantity']>=$product['product']->quantity) disabled @endif>
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-center mr-3 ml-auto font-weight-bold text-nowrap product-price">
                        {{ $product['product']->price * $product['quantity']}} zł
                    </div>
                </div>
            @endforeach
        @endif
        </div>
        <h5 class="text-center pt-4 cart-empty" @if(isset($cart) && $cart !== []) style="display: none;" @endif>Brak produktów w koszyku</h5>
        <div class="cart-summary" @if(empty($cart)) style="display: none;" @endif>
            <h5 class="p-2">
                <p class="float-left">Razem:</p>
                <p class="float-right font-weight-bold" id="product-summary"></p>
            </h5>
            <a href="{{ route('summary') }}" class="btn btn-primary btn-lg btn-block mt-4">
                <i class="fa fa-shopping-cart mr-1" aria-hidden="true"></i>
                Idź do kasy
            </a>
        </div>
    </div>
</div>