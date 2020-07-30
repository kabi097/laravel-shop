$(document).ready(function () {
    var debounce = null;
    $("body").on('click', '#cart-button', function () {
        $("#cart").toggle();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function sendData() {
        var products = [];
        $(".product").each(function () {
            products.push({ 
                "productId": $(this).data("product-id"),
                "quantity": parseInt($(this).find('.product-quantity').val(), 10)
            });
        });
        $.ajax({
            type: "post",
            url: '/add_to_cart',
            data: JSON.stringify(products),
            dataType: 'json',
            contentType: 'application/json',
            success: function(data)
            {
                if ($('#cart').length > 0) refreshCart(data);
                if ($('#summary').length > 0) refreshSummary(data);
            }
        });
    }

    function calculateSum() {
        if ($(".product").length > 0) {
            var sum = 0;
            $(".product").each(function () {
                sum += parseInt($(this).data("price"), 10) * parseInt($(this).find(".product-quantity").val(), 10);
            });
            $("#product-summary").text(sum + " zł");
            $("#cart-badge").show();
            $("#cart-badge").text($(".product").length);
            $('#summary-price').text(sum + " zł");
            $("#summary-quantity").text($(".product").length);
            if ($("#summary-payment").length > 0) { 
                $('#summary-payment').text($('input[type=radio][name=payment]:checked').parent().text().trim());
            }
        } else {
            $("#cart-badge").hide();
        }
    }

    function refreshSummary(data) {
        if (data.length > 0) {
            var html = `<tbody class="summary-content">`;
            data.forEach((product, index) => {
                html += `<input type="hidden" name="products[${ index }][id]" value="${ product.productId }">
                <tr class="border-bottom product" data-product-id="${ product.productId }" data-price="${ product.product.price }}" data-quantity="${ product.product.quantity }">
                <td scope="row">
                    <div class="d-flex">
                        <img src="https://via.placeholder.com/100x100" class="img-fluid rounded mr-3" style="min-width: 100px">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5>${ product.product.title }</h5>
                            <button type="button" class="btn btn-sm btn-light product-delete">
                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-center text-nowrap product-single-price">${ product.product.price } zł</p>
                </td>
                <td>
                <div class="btn-group w-50" role="group">
                <button type="button" class="btn btn-sm btn-outline-info product-minus" ${ (product.quantity <= 1) ? 'disabled' : '' }>
                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                </button>
                <input type="text" name="products[${ index }][quantity]" class="form-control w-50 form-control-sm product-quantity" placeholder="Ilość" aria-label="Ilość" aria-describedby="btnGroupAddon" value="${ product.quantity }" readonly>
                <button type="button" class="btn btn-sm btn-outline-info product-plus" ${ (product.quantity >= product.product.quantity) ? 'disabled' : '' }>
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </button>
                </div>
                </td>
                <td class="text-center text-nowrap font-weight-bold product-price">
                    ${ product.product.price * product.quantity } zł
                </td>
                </tr>`;
            });
            html += `</tbody>`;
            $('#summary .summary-content').replaceWith(html);
            calculateSum();
        } else {
            $('#product-table').hide();
            $("#product-summary").parent().hide();
            $("#product-delivery").hide();
            $("#product-summary-table table").hide();
            $("#product-summary-table button").prop('disabled', true);
            $("#summary .card-body").append('<h4 class="p-4 text-center">Brak produktów w koszyku</h4>');
        }
    }

    function refreshCart(data) {
        var html = `<div class="cart-content">`;
        data.forEach(product => {
            html += `<div class="card-text d-flex align-items-center pb-3 border-bottom product mt-1" data-product-id="${ product.productId }" data-price="${ product.product.price }" data-quantity="${ product.product.quantity }">
            <div class="pl-1 mr-2 pt-1">
                <button type="button" class="btn btn-outline product-delete">
                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                </button>
            </div>
            <div>
                <p class="m-0 font-weight-bold">${ product.product.title }</p>
                <div class="btn-group w-50" role="group">
                    <button type="button" class="btn btn-sm btn-outline-info product-minus" ${ (product.quantity <= 1) ? 'disabled' : '' }>
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                    </button>
                    <input type="text" class="form-control w-50 form-control-sm product-quantity" placeholder="Ilość" aria-label="Ilość" aria-describedby="btnGroupAddon" value="${ product.quantity }" readonly>
                    <button type="button" class="btn btn-sm btn-outline-info product-plus" ${ (product.quantity >= product.product.quantity) ? 'disabled' : '' }>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="text-center mr-3 ml-auto font-weight-bold text-nowrap product-price">
                ${ product.product.price * product.quantity } zł
            </div>
            </div>`;
        });
        html += `</div>`;
        $('#cart .cart-content').replaceWith(html);
        $('#cart').show();
        if (data.length > 0) {
            $('#cart .cart-summary').show();
            $('#cart .cart-empty').hide();
        } else {
            $('#cart .cart-summary').hide();
            $('#cart .cart-empty').show();
        }
        calculateSum();
    }

    calculateSum();

    $("body").on('click', '.product-plus', function() {
        $(this).siblings('.product-quantity').val(function (i, oldval) {
            if (parseInt( oldval, 10) < $(this).parents(".product").data("quantity")) {
                clearTimeout(debounce);
                debounce = setTimeout(sendData, 600);
                return parseInt(oldval, 10) + 1;
            } else {
                return oldval;
            }
        }).change();
    });

    $("body").on('click', '.product-minus', function() {
        $(this).siblings('.product-quantity').val(function (i, oldval) {
            if (parseInt( oldval, 10) > 1) {
                clearTimeout(debounce);
                debounce = setTimeout(sendData, 600);
                return parseInt(oldval, 10) - 1;
            } else {
                return oldval;
            }
        }).change();
    });

    $("body").on('click', '.product-delete', function () {
        $(this).parents('.product').fadeOut(400, function() {
            $(this).remove(); 
            sendData();
        });
    });

    $(".product-quantity").change(function() {
        $(this).parent().parent().siblings(".product-price").text(parseInt($(this).parents(".product").data("price"),10) * parseInt($(this).val(), 10) + ' zł');
        calculateSum();
    });

    $('.payment-method').change(function () {
        calculateSum();
    });

    $("body").on('submit', '#product_form', function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data)
            {
                if ($('#cart').length > 0) refreshCart(data);
                // if ($('#summary').length > 0) refreshSummary(data);
            }
        });
    });
});