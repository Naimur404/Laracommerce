@extends('frontend.layout')
@section('title','Home Page')
@section('index')
<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            @foreach ($home_banner as $list)

             <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('storage/media/' . $list->image )}}"/>
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 50% Off</span>
                <h2 data-seq>{{ $list->name }}</h2>

                <a data-seq href="{{ $list->btn_link }}" class="aa-shop-now-btn aa-secondary-btn">{{ $list->btn_text }}</a>
              </div>
            </li>

            @endforeach

          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>

  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">

              <!-- promo right -->
              <div class="col-md-12 no-padding">
                <div class="aa-promo-right">
                 @foreach ($home_category as $list )

                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">
                      <img src="{{ asset('storage/media/' . $list->category_image ) }}" alt="img">
                      <div class="aa-prom-content">

                        <h4><a href="{{ url('category/'.$list->slug) }}">{{ $list->name }}</a></h4>
                      </div>
                    </div>
                  </div>

                   @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    @foreach ($home_category as $list )
                    <li class=""><a href="#cat{{ $list->id }}" data-toggle="tab">{{ $list->name }}</a></li>
                   @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    @php
                    $loop_count=1;
                    @endphp


                    @foreach ($home_category as  $list)
                    @php
                    $cat_class="";
                 if ($loop_count == 1){

                $cat_class ='in active';
                $loop_count++;
                 }



                           @endphp
                    <div class="tab-pane fade {{ $cat_class }}" id="cat{{ $list->id }}">
                      <ul class="aa-product-catg">
                        @if (isset($home_category_product[$list->id]))


                        @foreach ($home_category_product[$list->id] as $product)


                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ url('product/'. $product->slug) }}"><img src="{{ asset('storage/media/' . $product->image ) }}" alt="{{ $product->name }}"></a>
                            <a class="aa-add-card-btn"  href="javascript:void(0)" onclick="home_add_to_cart('{{ $product->id }}','{{$home_product_attr[$product->id][0]->size}}','{{ $home_product_attr[$product->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
                            @if (isset($home_product_attr[$product->id][0]))


                              <span class="aa-product-price">৳ {{$home_product_attr[$product->id][0]->price}}</span><span class="aa-product-price"><del>৳ {{  $home_product_attr[$product->id][0]->mrp}}</del></span>
                              @endif
                            </figcaption>
                          </figure>

                          <!-- product badge -->

                        </li>
                        @endforeach
                        @else
                        <li>
                            <figure>
                                No Data Found
                            </figure>
                        </li>
                        @endif

                        <!-- start single product item -->

                        <!-- start single product item -->

                        <!-- start single product item -->

                        <!-- start single product item -->

                        <!-- start single product item -->

                        <!-- start single product item -->

                        <!-- start single product item -->

                      </ul>

                    </div>
                    @endforeach
                  </div>
                  <!-- quick view modal -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{asset('front_asset/img/fashion-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#tranding" data-toggle="tab">Tranding</a></li>
                <li><a href="#discounted" data-toggle="tab">Discounted</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="featured">
                  <ul class="aa-product-catg aa-featured-slider">
                    @if (isset($home_featured_product[$list->id][0]))


                    @foreach ($home_featured_product[$list->id] as $product)


                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ url('product/'. $product->slug) }}"><img src="{{ asset('storage/media/' . $product->image ) }}" alt="{{ $product->name }}"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <figcaption>
                          <h4 class="aa-product-title"><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
                           @if (isset($home_featured_product_attr[$product->id][0]))


                          <span class="aa-product-price">৳ {{ $home_featured_product_attr[$product->id][0]->price }}</span><span class="aa-product-price"><del>৳ {{ $home_featured_product_attr[$product->id][0]->mrp }}</del></span>
                          @endif
                        </figcaption>
                      </figure>

                      <!-- product badge -->

                    </li>
                    @endforeach
                    @else
                    <li>
                        <figure>
                            No Data Found
                        </figure>
                    </li>
                    @endif
                     <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->

                <!-- start featured product category -->
                <div class="tab-pane fade" id="tranding">
                 <ul class="aa-product-catg aa-tranding-slider">
                    @if (isset($home_tranding_product[$list->id][0]))


                    @foreach ($home_tranding_product[$list->id] as $product)


                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ url('product/'. $product->slug) }}"><img src="{{ asset('storage/media/' . $product->image ) }}" alt="{{ $product->name }}"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <figcaption>
                          <h4 class="aa-product-title"><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
                          @if (isset($home_tranding_product_attr[$product->id][0]))
                          <span class="aa-product-price">৳ {{ $home_tranding_product_attr[$product->id][0]->price }}</span><span class="aa-product-price"><del>৳ {{ $home_tranding_product_attr[$product->id][0]->mrp }}</del></span>
                          @endif
                        </figcaption>
                      </figure>

                      <!-- product badge -->

                    </li>
                    @endforeach
                    @else
                    <li>
                        <figure>
                            No Data Found
                        </figure>
                    </li>
                    @endif
                     <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>

                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="discounted">
                  <ul class="aa-product-catg aa-discounted-slider">
                    @if (isset($home_discounted_product[$list->id][0]))
                    @foreach ($home_discounted_product[$list->id] as $list )


                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('storage/media/' . $list->image ) }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#"></a>{{ $list->name }}</h4>
                          @if (isset($home_discounted_product_attr[$list->id][0]))
                          <span class="aa-product-price">{{ $home_discounted_product_attr[$list->id][0]->price }}</span><span class="aa-product-price"><del>{{ $home_discounted_product_attr[$list->id][0]->mrp }}</del></span>
                          @endif
                        </figcaption>
                      </figure>

                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    @endforeach
                    @else
                  <li>
                    <figure>
                        No Data Found
                    </figure>
                     </li>
                @endif
                     <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                    <!-- start single product item -->

                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
                @foreach ($home_brand as $list )


              <li><a href="#"><img src="{{ asset('storage/media/' . $list->image ) }}" alt="{{ $list->name }}"></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <input type="hidden" id="qty" value="1"/>
  <form action="{{ route('add_to_cart') }}" method="POST" id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id"/>
    <input type="hidden" id="color_id" name="color_id"/>
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>
     @csrf
 </form>
@endsection
