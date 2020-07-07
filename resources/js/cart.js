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
        $("#cart .product").each(function () {
            products.push({ 
                "productId": $(this).data("product-id"),
                "quantity": parseInt($(this).find('.product-quantity').val(), 10)
            });
        });
        $.ajax({
            type: "post",
            url: '/add_to_cart',
            data: JSON.stringify(products),
            dataType: 'text',
            contentType: 'application/json',
            success: function(data)
            {
                $('#cart').replaceWith(data);
                $('#cart').show();
                calculateSum();
            }
        });
    }

    function calculateSum() {
        if ($("#cart .product").length > 0) {
            var sum = 0;
            $(".product").each(function () {
                sum += parseInt($(this).data("price"), 10) * parseInt($(this).find(".product-quantity").val(), 10);
            });
            $("#product-summary").text(sum + " zł");
            $("#cart-badge").show();
            $("#cart-badge").text($("#cart .product").length);
        } else {
            $("#cart-badge").hide();
        }
    }

    calculateSum();

    $("body").on('click', '#cart .product-plus', function() {
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

    $("body").on('click', '#cart .product-minus', function() {
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

    $("body").on('click', '#cart .product-delete', function () {
        $(this).parents('.product').fadeOut(400, function() {
            $(this).remove(); 
            sendData();
        });
    });

    $("#cart .product-quantity").change(function() {
        $(this).parent().parent().siblings(".product-price").text(parseInt($(this).parents(".product").data("price"),10) * parseInt($(this).val(), 10) + ' zł');
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
                $('#cart').replaceWith(data);
                $('#cart').show();
                calculateSum();
            }
        });
    });
});