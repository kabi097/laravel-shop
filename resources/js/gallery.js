$('.product-gallery .product-thumbnail img').click(function () {
    var url = $(this).attr('src').replace(/-(cropped|small|medium)\.(jpg|JPG|png|PNG|gif)/, ".$2");
    $('.product-image').attr('src', url);
});

function checkNavigation() {
    var filename = $('.product-image').attr('src').match(/([^\/]+)(?=\.\w+$)/)[0];
    var foundIndex = -1;
    $('.product-gallery .product-thumbnail').each(function (index, thumb) {
        if (thumb.children[0].src.includes(filename)) {
            foundIndex = index;
        }
    });
    if (foundIndex <= 0) {
        $('.image-previous').hide();
    }

    if (foundIndex >= $('.product-gallery .product-thumbnail').length-1) {
        $('.image-next').hide();
    }

    return foundIndex;
}

$('.product-gallery .product-image').click(function () {
    $('.product-gallery .fullscreen-dark').show();
    $('.product-gallery .fullscreen').show();
    checkNavigation();
});

$('.product-gallery .fullscreen-dark').click(function () {
    $('.product-gallery .fullscreen-dark').hide();
    $('.product-gallery .fullscreen').hide();
});

$('.product-gallery .image-previous').click(function () {
    var foundIndex = checkNavigation();
    if (foundIndex > 0) {
        var url = $('.product-gallery .product-thumbnail')[foundIndex-1].children[0].src.replace(/-(cropped|small|medium)\.(jpg|JPG|png|PNG|gif)/, ".$2");
        $('.product-image').attr('src', url);
        checkNavigation();
    }
});

$('.product-gallery .image-next').click(function () {
    var foundIndex = checkNavigation();
    if (foundIndex < $('.product-gallery .product-thumbnail').length-1) {
        var url = $('.product-gallery .product-thumbnail')[foundIndex+1].children[0].src.replace(/-(cropped|small|medium)\.(jpg|JPG|png|PNG|gif)/, ".$2");
        $('.product-image').attr('src', url);
        checkNavigation();
    }
});