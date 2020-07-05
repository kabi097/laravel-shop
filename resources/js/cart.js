$(document).ready(function () {
    var debounce = null;
    var cart = $("#cart");
    // cart.hide();
    $("#cart .cart-button").on('click', function () {
        cart.toggle();
    });
    
    function sendData() {
        var data = [];
        $("#cart .product").each(function () {
            data.push({ 
                'productId': $(this).data("product-id"),
                'quantity': $(this).find('.product-quantity').val()
            });
        });
        console.log(data);
    }

    $("#cart .product-plus").on('click', function() {
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

    $("#cart .product-minus").on('click', function() {
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

    $("#cart .product-delete").on('click', function () {
        $(this).parents('.product').fadeOut(400, function() {
            $(this).remove(); 
            sendData();
        });
    });

    $("#cart .product-quantity").change(function() {
        $(this).parent().parent().siblings(".product-price").text(parseInt($(this).parents(".product").data("price"),10) * parseInt($(this).val(), 10) + ' zł');
        var sum = 0;
        $(".product").each(function () {
            sum += parseInt($(this).data("price"), 10) * parseInt($(this).find(".product-quantity").val(), 10);
        });
        $("#product-summary").text(sum + " zł");
    });
});