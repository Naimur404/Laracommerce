/**
  * Template Name: Daily Shop
  * Version: 1.0
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS


  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER
  13. RELATED ITEM SLIDER (SLICK SLIDER)


**/

jQuery(function ($) {


    /* ----------------------------------------------------------- */
    /*  1. CARTBOX
    /* ----------------------------------------------------------- */

    jQuery(".aa-cartbox").hover(function () {
        jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
        , function () {
            jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
        }
    );

    /* ----------------------------------------------------------- */
    /*  2. TOOLTIP
    /* ----------------------------------------------------------- */
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

    /* ----------------------------------------------------------- */
    /*  3. PRODUCT VIEW SLIDER
    /* ----------------------------------------------------------- */

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

    /* ----------------------------------------------------------- */
    /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('.aa-popular-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    /* ----------------------------------------------------------- */
    /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /* ----------------------------------------------------------- */
    /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /* ----------------------------------------------------------- */
    /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('.aa-testimonial-slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    /* ----------------------------------------------------------- */
    /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /* ----------------------------------------------------------- */
    /*  9. PRICE SLIDER  (noUiSlider SLIDER)
    /* ----------------------------------------------------------- */

    jQuery(function () {

        if ($('body').is('.productPage')) {
            var skipSlider = document.getElementById('skipstep');
            var start = $('#filter_price_start').val();
            var end = $('#filter_price_end').val();
            if (start == '' || end == '') {
                var start = 100;
                var end = 1800;
            }
            noUiSlider.create(skipSlider, {
                range: {
                    'min': 0,
                    '10%': 100,
                    '20%': 300,
                    '30%': 500,
                    '40%': 700,
                    '50%': 900,
                    '60%': 1100,
                    '70%': 1300,
                    '80%': 1400,
                    '90%': 1600,
                    'max': 2000
                },
                snap: true,
                connect: true,
                start: [start, end]
            });
            // for value print
            var skipValues = [
                document.getElementById('skip-value-lower'),
                document.getElementById('skip-value-upper')
            ];

            skipSlider.noUiSlider.on('update', function (values, handle) {
                skipValues[handle].innerHTML = values[handle];
            });
        }
    });



    /* ----------------------------------------------------------- */
    /*  10. SCROLL TOP BUTTON
    /* ----------------------------------------------------------- */

    //Check to see if the window is top if not then display button

    jQuery(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top

    jQuery('.scrollToTop').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    /* ----------------------------------------------------------- */
    /*  11. PRELOADER
    /* ----------------------------------------------------------- */

    jQuery(window).load(function () { // makes sure the whole site is loaded
        jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out
    })

    /* ----------------------------------------------------------- */
    /*  12. GRID AND LIST LAYOUT CHANGER
    /* ----------------------------------------------------------- */

    jQuery("#list-catg").click(function (e) {
        e.preventDefault(e);
        jQuery(".aa-product-catg").addClass("list");
    });
    jQuery("#grid-catg").click(function (e) {
        e.preventDefault(e);
        jQuery(".aa-product-catg").removeClass("list");
    });


    /* ----------------------------------------------------------- */
    /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('.aa-related-item-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

});
function chnage_product_color_image(img, color) {
    $('#color_id').val(color);
    $('.simpleLens-big-image-container').html(`<a data-lens-image="${img}" class="simpleLens-lens-image"><img src="${img}" class="simpleLens-big-image"></a>`);
};
function showColor(size) {
    $('#size_id').val(size);
    $('.product_color').hide();
    $('.size_' + size).show();
    $('.size_link').css('border', '1px solid #ddd');
    $("#size_" + size).css('border', '1px solid black');

};
function home_add_to_cart(id, size_attr_id, color_attr_id) {
    $('#size_id').val(size_attr_id);
    $('#color_id').val(color_attr_id);
    add_to_cart(id, size_attr_id, color_attr_id);
}
function add_to_cart(id, size_attr_id, color_attr_id) {
    $('#add_to_cart_mgs').html('');
    var size = $('#size_id').val();
    var color = $('#color_id').val();
    if (size_attr_id == 0 && color_attr_id == 0) {
        size = 'no';
        color = 'no';
    }
    if (size == '' && size != 'no') {
        $('#add_to_cart_mgs').html('<div class="alert alert-danger fade in alert-dismissible mt10" ><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please Select Size</div>');

    } else if (color == '' && color != 'no') {
        $('#add_to_cart_mgs').html('<div class="alert alert-danger fade in alert-dismissible mt10" ><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please Select Color</div>');
    }

    else {
        $('#product_id').val(id);
        $('#pqty').val($('#qty').val());

        $.ajax({
            type: "Post",
            url: "/product/add_to_cart",
            data: $('#frmAddToCart').serialize(),

            success: function (result) {
                alertify.set('notifier', 'position', 'top-center');
                alertify.success('Product ' + result.msg);
                if (result.totalitems == 0) {
                    $('.aa-cart-notify').html('0');
                    $('.aa-cartbox-summary').remove();
                } else {
                    var toltalprice = 0;
                    $('.aa-cart-notify').html(result.totalitems);
                    var html = '<ul>'
                    //$.each jquery foreach
                    $.each(result.data, function (key, val) {

                        toltalprice = parseInt(toltalprice) + (parseInt(val.qty) * parseInt(val.price));
                        html += ' <li id="box_remove_' + val.attr_id + '"><a class="aa-cartbox-img" href=""><img src="' + ImagePath + '/' + val.image + '"alt="img"></a> <div class="aa-cartbox-info"><h4><a href="#">' + val.pname + '</a></h4><p>' + val.qty + ' x ৳ ' + val.price + '</p></div></li>';


                    });
                    html += ' <li><spanclass="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price"> ৳ ' + toltalprice + '</span></li>';
                    html += '</ul><a class="aa-cartbox-checkout aa-primary-btn" href="checkout">Checkout</a>';

                    $('.aa-cartbox-summary').html(html);

                }
            }
        });
    }
}

function updateQty(pid, size, color, attr_id, price) {
    $('#size_id').val(size);
    $('#color_id').val(color);
    var qty = $('#qty' + attr_id).val();
    $('#qty').val(qty);
    add_to_cart(pid, size, color, attr_id);
    $('#total_price_' + attr_id).html('৳ ' + qty * price);


}
function deleteCartProduct(pid, size, color, attr_id) {
    $('#size_id').val(size);
    $('#color_id').val(color);

    $('#qty').val(0);
    add_to_cart(pid, size, color, attr_id);
    $('#cart_box' + attr_id).remove();
    $('#box_remove_' + attr_id).remove();



}
function sort_by() {
    var sort_by_value = $('#sort_by_value').val();
    $('#sort').val(sort_by_value);
    $('#categoryfilter').submit();
}
function sort_by_price() {

    $('#filter_price_start').val($('#skip-value-lower').html());
    $('#filter_price_end').val($('#skip-value-upper').html());
    $('#categoryfilter').submit();


}
//code for color filter
function set_color(color, type) {
    var color_str = $('#color_filter').val();
    if (type == 1) {
        var new_color_str = color_str.replace(color + ':', '');

        $('#color_filter').val(new_color_str);
    } else {
        $('#color_filter').val(color + ':' + color_str);
        $('#categoryfilter').submit();
    }

    $('#categoryfilter').submit();
}
function pudsearch() {
    var search_str = $('#search_str').val();
    if (search_str != '' && search_str.length > 3) {
        window.location.href = '/search/' + search_str;
    }
}
//code for user registration
$('#frmRegistration').submit(function (e) {
    e.preventDefault();
    $('#field_error').html('');
    $.ajax({
        type: "Post",
        url: "user/registration_process",
        data: $('#frmRegistration').serialize(),

        success: function (result) {
            if (result.status == "error") {
                $.each(result.error, function (key, val) {
                    $('#' + key + '_error').html(val);


                });
            }
            if (result.status == "sucess") {
                $('#frmRegistration')[0].reset();
                $('.hello').remove();
                $('#sucess_mgs').html(result.msg);


            }


        }
    });

});
//code for login
$('#frmLogin').submit(function (e) {
    $('#login_msg').html("");
    e.preventDefault();


    $.ajax({
        type: "Post",
        url: "/user/login_process",
        data: $('#frmLogin').serialize(),

        success: function (result) {
            if (result.status == "error") {
                $('#login_msg').html(result.msg);
            }
            if (result.status == "sucess") {
                //for rederict
                window.location.href = window.location.href;

                // $('#frmLogin')[0].reset();
                // $('.hello').remove();
                // $('#sucess_mgs').html(result.msg);


            }


        }
    });

});

//code for forget password
function forgot_password() {
    $('#popup_forgot').show();
    $('#popup_login').hide();
}
function show_login_popup() {
    $('#popup_forgot').hide();
    $('#popup_login').show();
}

//ajax for forgot password

$('#frmForgot').submit(function (e) {
    $('#forgot_msg').html("Please Wait!!");
    e.preventDefault();


    $.ajax({
        type: "Post",
        url: "/forgot_password",
        data: $('#frmForgot').serialize(),

        success: function (result) {

            $('#forgot_msg').html(result.msg);



        }
    });

});
//password change code
$('#frmForgotPassword').submit(function (e) {
    $('#password_msg_change').html("");

    e.preventDefault();


    $.ajax({
        type: "Post",
        url: "/forgot_password_change_process",
        data: $('#frmForgotPassword').serialize(),

        success: function (result) {


            if (result.status == "error") {
                $('#password_msg_change').html(result.msg);
            }
            if (result.status == "sucess") {
                //for rederict
                // alertify.set('notifier','position', 'top-center');
                // alertify.success('Password Update Sucessfully');
                window.location.href = '/';
                // $('#frmLogin')[0].reset();
                // $('.hello').remove();
                // $('#sucess_mgs').html(result.msg);


            }

        }
    });

});
function applyCouponCode() {
    var coupon_code = $('#coupon_code').val();
    var sum = 40;
    if (coupon_code != '') {
        $.ajax({
            type: "post",
            url: "/apply_coupon_code",
            data: 'coupon_code=' + coupon_code + '&_token=' + $("[name='_token']").val(),

            success: function (result) {

                if (result.status == 'sucess') {
                    $('.show_coupon_box').removeClass('hide');
                    $('#coupon_code_str').html(coupon_code);
                    $('#subtotal_price').html('৳ ' + result.totalprice);
                    //   sum += parseInt(result.totalprice);
                    $('#total_price').html('৳ ' + parseInt(result.totalprice + 40));

                    $('.apply_coupon_code_box2').hide();

                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(result.msg);
                } else {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error(result.msg);
                }
            }
        });
    } else {
        $('#coupon_msg').html('Please Enter Coupon Code');
    }
}
function remove_coupon_code() {
    var coupon_code = $('#coupon_code').val();

    $('#coupon_code').val('');
    if (coupon_code != '') {
        $.ajax({
            type: "Post",
            url: "user/remove_coupon_code",
            data: 'coupon_code=' + coupon_code + '&_token=' + $("[name='_token']").val(),

            success: function (result) {

                if (result.status == 'sucess') {
                    $('.show_coupon_box').addClass('hide');
                    $('#coupon_code_str').html('');
                    $('#subtotal_price').html('৳ ' + result.totalprice);
                    $('#total_price').html('৳ ' + (result.totalprice + 40));

                    $('.apply_coupon_code_box2').show();

                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error(result.msg);

                }
            }
        });
    }

}


$('#frmPlaceOrder').submit(function (e) {


    e.preventDefault();


    $.ajax({
        type: "Post",
        url: "/place_order",
        data: $('#frmPlaceOrder').serialize(),

        success: function (result) {

            if (result.status == 'sucess') {
                if (result.url_final != '') {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(result.msg);
                     window.location.href= result.url_final;

                }else{
                alertify.set('notifier', 'position', 'top-center');
                alertify.success(result.msg);

                window.location.href= '/order_placed';
                }


            }else if(result.status == "errors")

            {
                $.each(result.error, function (key, val) {

                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error(val[0]);


                });

        }else if(result.status == "email_error")

        {


                alertify.set('notifier', 'position', 'top-center');
                alertify.error(result.error);




    }


            else {
                alertify.set('notifier', 'position', 'top-center');
                alertify.error(result.msg);


            }

        }
    });

});



