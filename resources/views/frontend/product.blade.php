@extends('frontend.layout')
@section('title',$product[0]->pname)
@section('index')

{{-- <section id="aa-catg-head-banner">
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
   </section> --}}

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
                         <div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('storage/media/' . $product[0]->image ) }}" class="simpleLens-lens-image"><img src="{{ asset('storage/media/' . $product[0]->image ) }}" alt="{{ $product[0]->pname }}" class="simpleLens-big-image"></a></div>
                       </div>
                       <div class="simpleLens-thumbnails-container">
                           @if(isset($product_images[$product[0]->id][0]))
                           @foreach ($product_images[$product[0]->id] as $list )

                           <a data-big-image="{{ asset('storage/media/' . $list->images ) }}" data-lens-image="{{ asset('storage/media/' . $list->images ) }}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{ asset('storage/media/' . $list->images ) }}" width="70px"></a>

                             @endforeach
                             @endif

                       </div>
                     </div>
                   </div>
                 </div>
                 <!-- Modal view content -->
                 <div class="col-md-7 col-sm-7 col-xs-12">
                   <div class="aa-product-view-content">
                     <h3>{{ $product[0]->pname }}</h3>
                     <div class="aa-price-block">
                       <span class="aa-product-view-price">৳ {{ $product_attr[$product[0]->id][0]->price }}</span>
                       @if($product_attr[$product[0]->id][0]->qty ==0)
                       <p class="aa-product-avilability">Avilability: <span style="color: red">Out Of stock</span></p>
                       @else
                       <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                       @endif
                       @if ($product[0]->lead_time != '')
                       <p class="aa-product-avilability"> <span style="color: red; font-weight:bold">{{ $product[0]->lead_time }}</span></p>
                       @endif
                     </div>

                     <p>{!! $product[0]->short_desc !!}</p>
                     @if ($product_attr[$product[0]->id][0]->size_id > 0)
                     <h4>Size</h4>

                     <div class="aa-prod-view-size">
                        @php


                        $arry_size =[];
                        foreach ($product_attr[$product[0]->id] as $attr ){
                            $arry_size[] = $attr->size;
                        }
                        $arry_size= array_unique($arry_size);
                       @endphp

                     @foreach ($arry_size  as $size )
                   @if($size!= '')
                  <a href="javascript:void(0)" id="size_{{ $size }}" class="size_link" onclick="showColor('{{ $size }}','{{ $product_attr[$product[0]->id][0]->size_id }}')">{{ $size }}</a>
                  @endif
                  @endforeach
                     </div>
                     @endif
                     @if ($product_attr[$product[0]->id][0]->color_id > 0)


                     <h4>Color</h4>
                     <div class="aa-color-tag">
                         @foreach ($product_attr[$product[0]->id] as $color )

                        @if($color->color != '')
                       <a href="javascript:void(0)" class="aa-color-{{ strtolower($color->color) }} product_color size_{{ $color->size }}" onclick=chnage_product_color_image("{{ asset('storage/media/' .$color->attr_image)}}","{{($color->color) }}")></a>
                       @endif
                       @endforeach

                     </div>
                     @endif
                     <div class="aa-prod-quantity">
                       <form action="">
                         <select id="qty" name="qty">

                          @for ($i=1; $i<11; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor

                         </select>
                       </form>
                       <p class="aa-prod-category">
                         Model: <a href="#">{{ $product[0]->model }}</a>
                       </p>
                     </div>
                     <div class="aa-prod-view-bottom">
                <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart('{{ $product[0]->id }}','{{ $product_attr[$product[0]->id][0]->size_id }}','{{ $product_attr[$product[0]->id][0]->color_id }}')">Add To Cart</a>

                     </div>
                     <div id="add_to_cart_mgs"></div>
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
                    @if (isset($product_review[0]))
                    <h4>Reviews for {{ $product[0]->pname }}</h4>
                    <ul class="aa-review-nav">



                        @foreach ($product_review as $data)


                      <li>
                         <div class="media">

                           <div class="media-body">
                             <h4 class="media-heading"><strong>{{ $data->name }}</strong> - <span>{{getCustomDate($data->added_on)  }}</span></h4>
                             <div class="aa-product-rating">
                               <span class="rating_txt">{{ $data->rating }}</span>
                             </div>
                             <p>{{ $data->review }}</p>
                           </div>
                         </div>
                       </li>
                       @endforeach

                    </ul>
                    @else
                       <h2>No Review Found</h2>
                       @endif
                    <form  class="aa-review-form" id="frmProductReview">
                    <h4>Add a review</h4>

                    <div class="form-group" >
                    <select class="form-control" required name="rating">
                      <option value="">Select Rating</option>
                      <option>Wrost</option>
                      <option>Bad</option>
                      <option>Good</option>
                      <option>Very Good</option>
                      <option>Fantastic</option>
                    </select>
                    </div>
                    <!-- review form -->

                       <div class="form-group">
                         <label for="message">Your Review</label>
                         <textarea class="form-control" rows="3" required name="review"></textarea>
                       </div>


                       <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                       <input type="hidden" name="product_id" value="{{ $product[0]->id }}"/>
                       @csrf
                    </form>
                  </div>
                 </div>
               </div>
             </div>
             <!-- Related product -->
             @if (isset($related_product[0]))


             <div class="aa-product-related-item">
               <h3>Related Products</h3>
               <ul class="aa-product-catg aa-related-item-slider">
                 <!-- start single product item -->
                 @foreach ($related_product as $data)


                 <li>
                   <figure>
                     <a class="aa-product-img" href="{{ url('product/'. $data->pslug) }}"><img src="{{ asset('storage/media/' . $data->image ) }}" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                       <h4 class="aa-product-title"><a href="#">{{ $data->pname }}</a></h4>
                       <span class="aa-product-price">৳ {{ $related_product_attr[$data->id][0]->price }}</span>
                      @if($related_product_attr[$data->id][0]->mrp != '')
                       <span class="aa-product-price"><del>৳ {{ $related_product_attr[$data->id][0]->mrp }}</del></span>
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
                 @endforeach
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
             @else
             <div class="aa-product-related-item">
                <h3>Related Products</h3>
                <ul class="aa-product-catg aa-related-item-slider" style="align-content: center">
                  <!-- start single product item -->
                  <li>
                  <h3 style="">No Related Product Found</h3>
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

             @endif
           </div>
         </div>
       </div>
     </div>
   </section>
   <form  id="frmAddToCart">
   <input type="hidden" id="size_id" name="size_id"/>
   <input type="hidden" id="color_id" name="color_id"/>
   <input type="hidden" id="pqty" name="pqty"/>
   <input type="hidden" id="product_id" name="product_id"/>
    @csrf
</form>
@endsection
