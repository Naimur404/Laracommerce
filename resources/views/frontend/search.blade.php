@extends('frontend.layout')
@section('title','Search Product')
@section('index')


<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">

              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
               @if(isset($product[0]))
                @foreach ($product as $list)


                <li>
                  <figure>
                    <a class="aa-product-img" href="{{ url('product/'. $list->pslug) }}"><img src="{{ asset('storage/media/' . $list->image ) }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="javascript:void(0)" onclick="home_add_to_cart('{{ $list->id }}','{{$product_attr[$list->id][0]->size}}','{{ $product_attr[$list->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{ url('product/'. $list->pslug) }}">{{ $list->pname }}</a></h4>

                      <span class="aa-product-price">৳ {{ $product_attr[$list->id][0]->price }}</span>
                      @if($product_attr[$list->id][0]->mrp != '')
                      <span class="aa-product-price"><del>৳ {{ $product_attr[$list->id][0]->mrp }}</del></span>
                      @endif

                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
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
                @else
                <h2 style="text-align: center">No Data Found</h2>
                @endif
                <!-- start single product item -->

                <!-- start single product item -->

                <!-- start single product item -->

                <!-- start single product item -->

                <!-- start single product item -->

                <!-- start single product item -->

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
            <div class="aa-product-catg-pagination">
                <nav>
                  <ul class="pagination">
                    <li>
                      {{ $product->links() }}
                    </li>
                  </ul>
                </nav>
              </div>
          </div>
        </div>


      </div>
    </div>
</section>
<input type="hidden" id="qty" value="1"/>
<form  id="frmAddToCart">
  <input type="hidden" id="size_id" name="size_id"/>
  <input type="hidden" id="color_id" name="color_id"/>
  <input type="hidden" id="pqty" name="pqty"/>
  <input type="hidden" id="product_id" name="product_id"/>
   @csrf
</form>

@endsection
