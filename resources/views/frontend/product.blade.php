@extends('frontend.layout')
@section('title',$product[0]->name)
@section('index')

<section id="aa-catg-head-banner">
    <img src="{{ asset('front_asset/img/fashion/fashion-header-bg-8.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">

      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>{{ $product[0]->name }}</h2>
         <ol class="breadcrumb">
           <li><a href="index.html">Home</a></li>
           <li><a href="#">Product</a></li>
           <li class="active">{{ $product[0]->name }}</li>
         </ol>
       </div>
      </div>
    </div>
   </section>

   <!-- / catg header banner section -->

   <!-- product category -->
   <section id="aa-product-details">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="aa-product-details-area">
             <div class="aa-product-details-content">
               <div class="row">
                 <!-- Modal view slider -->
                 <div class="col-md-5 col-sm-5 col-xs-12">
                   <div class="aa-product-view-slider">
                     <div id="demo-1" class="simpleLens-gallery-container">
                       <div class="simpleLens-container">
                         <div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('storage/media/' . $product[0]->image ) }}" class="simpleLens-lens-image"><img src="{{ asset('storage/media/' . $product[0]->image ) }}" alt="{{ $product[0]->name }}" class="simpleLens-big-image"></a></div>
                       </div>
                       <div class="simpleLens-thumbnails-container">
                           @if(isset($product_images[$product[0]->id][0]))
                           @foreach ($product_images[$product[0]->id] as $list )

                           <a data-big-image="{{ asset('storage/media/' . $list->images ) }}" data-lens-image="{{ asset('storage/media/' . $list->images ) }}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{ asset('storage/media/' . $list->images ) }}" width="70px"</a>

                             @endforeach
                             @endif

                       </div>
                     </div>
                   </div>
                 </div>
                 <!-- Modal view content -->
                 <div class="col-md-7 col-sm-7 col-xs-12">
                   <div class="aa-product-view-content">
                     <h3>{{ $product[0]->name }}</h3>
                     <div class="aa-price-block">
                       <span class="aa-product-view-price">৳ {{ $product_attr[$product[0]->id][0]->price }}</span>
                       <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                       @if ($product[0]->lead_time != '')
                       <p class="aa-product-avilability"> <span style="color: red; font-weight:bold">{{ $product[0]->lead_time }}</span></p>
                       @endif
                     </div>
                     <p>{!! $product[0]->short_desc !!}</p>
                     <h4>Size</h4>
                     <div class="aa-prod-view-size">
                        @foreach ($product_attr[$product[0]->id] as $size )

                        @if($size->size != '')
                       <a href="#">{{ $size->size }}</a>
                       @endif
                       @endforeach
                     </div>
                     <h4>Color</h4>
                     <div class="aa-color-tag">
                         @foreach ($product_attr[$product[0]->id] as $color )

                        @if($color->color != '')
                       <a href="javascript:void(0)" class="aa-color-{{ strtolower($color->color) }}" onclick=chnage_product_color_image("{{ asset('storage/media/' .$color->attr_image)}}")></a>
                       @endif
                       @endforeach

                     </div>
                     <div class="aa-prod-quantity">
                       <form action="">
                         <select id="" name="">
                           <option selected="1" value="0">1</option>
                           <option value="1">2</option>
                           <option value="2">3</option>
                           <option value="3">4</option>
                           <option value="4">5</option>
                           <option value="5">6</option>
                         </select>
                       </form>
                       <p class="aa-prod-category">
                         Model: <a href="#">{{ $product[0]->model }}</a>
                       </p>
                     </div>
                     <div class="aa-prod-view-bottom">
                       <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                       <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                       <a class="aa-add-to-cart-btn" href="#">Compare</a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="aa-product-details-bottom">
               <ul class="nav nav-tabs" id="myTab2">
                 <li><a href="#description" data-toggle="tab">Description</a></li>
                 <li><a href="#technical_specification" data-toggle="tab">Technical Specification</a></li>
                 <li><a href="#uses" data-toggle="tab">Uses</a></li>
                 <li><a href="#review" data-toggle="tab">Reviews</a></li>
               </ul>

               <!-- Tab panes -->
               <div class="tab-content">
                 <div class="tab-pane fade in active" id="description">
                    {!! $product[0]->desc !!}
                 </div>
                 <div class="tab-pane fade" id="technical_specification">
                    {!! $product[0]->technical_specification !!}
                 </div>
                 <div class="tab-pane fade" id="uses">
                    {!! $product[0]->uses !!}
                 </div>
                 <div class="tab-pane fade " id="review">
                  <div class="aa-product-review-area">
                    <h4>2 Reviews for T-Shirt</h4>
                    <ul class="aa-review-nav">
                      <li>
                         <div class="media">
                           <div class="media-left">
                             <a href="#">
                               <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                             </a>
                           </div>
                           <div class="media-body">
                             <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                             <div class="aa-product-rating">
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star-o"></span>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                           </div>
                         </div>
                       </li>

                    </ul>
                    <h4>Add a review</h4>
                    <div class="aa-your-rating">
                      <p>Your Rating</p>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                    </div>
                    <!-- review form -->
                    <form action="" class="aa-review-form">
                       <div class="form-group">
                         <label for="message">Your Review</label>
                         <textarea class="form-control" rows="3" id="message"></textarea>
                       </div>
                       <div class="form-group">
                         <label for="name">Name</label>
                         <input type="text" class="form-control" id="name" placeholder="Name">
                       </div>
                       <div class="form-group">
                         <label for="email">Email</label>
                         <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                       </div>

                       <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                    </form>
                  </div>
                 </div>
               </div>
             </div>
             <!-- Related product -->
             <div class="aa-product-related-item">
               <h3>Related Products</h3>
               <ul class="aa-product-catg aa-related-item-slider">
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="{{ url('product/'. $related_product[0]->slug) }}"><img src="{{ asset('storage/media/' . $related_product[0]->image ) }}" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                       <h4 class="aa-product-title"><a href="#">{{ $related_product[0]->name }}</a></h4>
                       <span class="aa-product-price">৳ {{ $related_product_attr[$related_product[0]->id][0]->price }}</span>
                      @if($related_product_attr[$related_product[0]->id][0]->mrp != '')
                       <span class="aa-product-price"><del>৳ {{ $related_product_attr[$related_product[0]->id][0]->mrp }}</del></span>
                       @endif
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                   <!-- product badge -->
                   <span class="aa-badge aa-sale" href="#">SALE!</span>
                 </li>
                  <!-- start single product item -->

                 <!-- start single product item -->

                 <!-- start single product item -->

                 <!-- start single product item -->

                 <!-- start single product item -->

                 <!-- start single product item -->

                 <!-- start single product item -->

               </ul>
               <!-- quick view modal -->

               <!-- / quick view modal -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
@endsection
