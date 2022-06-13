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

jQuery(function($){


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX
  /* ----------------------------------------------------------- */

     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
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

    jQuery(function(){

      if($('body').is('.productPage')){
       var skipSlider = document.getElementById('skipstep');
       var start = $('#filter_price_start').val();
       var end = $('#filter_price_end').val();
       if(start=='' || end == ''){
        var start = 100;
         var end= 1800;
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

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });



  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });

    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });

  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
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
function chnage_product_color_image(img,color){
    $('#color_id').val(color);
    $('.simpleLens-big-image-container').html(`<a data-lens-image="${img}" class="simpleLens-lens-image"><img src="${img}" class="simpleLens-big-image"></a>`);
};
function showColor(size){
    $('#size_id').val(size);
    $('.product_color').hide();
    $('.size_'+size).show();
    $('.size_link').css('border', '1px solid #ddd');
    $("#size_"+size).css('border', '1px solid black');

};
function home_add_to_cart(id,size_attr_id,color_attr_id){
    $('#size_id').val(size_attr_id);
    $('#color_id').val(color_attr_id);
    add_to_cart(id,size_attr_id,color_attr_id);
}
function add_to_cart(id,size_attr_id,color_attr_id){
    $('#add_to_cart_mgs').html('');
 var size= $('#size_id').val();
  var color =$('#color_id').val();
  if(size_attr_id ==0 && color_attr_id ==0){
      size = 'no';
      color ='no';
  }
  if(size == '' && size!='no'){
  $('#add_to_cart_mgs').html('<div class="alert alert-danger fade in alert-dismissible mt10" ><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please Select Size</div>');

 }else if(color == '' && color!= 'no'){
    $('#add_to_cart_mgs').html('<div class="alert alert-danger fade in alert-dismissible mt10" ><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please Select Color</div>');
  }

  else{
$('#product_id').val(id);
$('#pqty').val($('#qty').val());

$.ajax({
    type: "Post",
    url: "/product/add_to_cart",
    data: $('#frmAddToCart').serialize(),

    success: function (result) {
        alert('product '+result.msg);
        if(result.totalitems == 0){
            $('.aa-cart-notify').html('0');
            $('.aa-cartbox-summary').remove();
        }else{
            var toltalprice=0;
            $('.aa-cart-notify').html(result.totalitems);
            var html = '<ul>'
            //$.each jquery foreach
            $.each(result.data, function(key,val){

                toltalprice = parseInt(toltalprice)+(parseInt(val.qty)* parseInt(val.price));
                html+=' <li id="box_remove_'+val.attr_id+'"><a class="aa-cartbox-img" href=""><img src="'+ImagePath+'/'+val.image+'"alt="img"></a> <div class="aa-cartbox-info"><h4><a href="#">'+val.name+'</a></h4><p>'+val.qty+' x ৳ '+val.price+'</p></div></li>';


            });
            html+=' <li><spanclass="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price"> ৳ '+toltalprice+'</span></li>';
            html+='</ul><a class="aa-cartbox-checkout aa-primary-btn" href="checkout">Checkout</a>';

            $('.aa-cartbox-summary').html(html);

            }
        }
    });
}
}

function updateQty(pid,size,color,attr_id,price){
    $('#size_id').val(size);
    $('#color_id').val(color);
    var qty =$('#qty'+attr_id).val();
    $('#qty').val(qty);
    add_to_cart(pid,size,color,attr_id);
    $('#total_price_'+attr_id).html('৳ '+qty*price);


}
function deleteCartProduct(pid,size,color,attr_id){
    $('#size_id').val(size);
    $('#color_id').val(color);

    $('#qty').val(0);
    add_to_cart(pid,size,color,attr_id);
    $('#cart_box'+attr_id).remove();
    $('#box_remove_'+attr_id).remove();



}
function sort_by(){
   var sort_by_value=$('#sort_by_value').val();
   $('#sort').val(sort_by_value);
   $('#categoryfilter').submit();
}
function sort_by_price(){

   $('#filter_price_start').val($('#skip-value-lower').html());
   $('#filter_price_end').val($('#skip-value-upper').html());
   $('#categoryfilter').submit();


}
function set_color(color,type){
    var color_str = $('#color_filter').val();
    if(type==1){
        var  new_color_str = color_str.replace(color+':','');
        
        $('#color_filter').val(new_color_str);
    }else{
        $('#color_filter').val(color+':'+color_str);
        $('#categoryfilter').submit();
    }

    $('#categoryfilter').submit();
}
