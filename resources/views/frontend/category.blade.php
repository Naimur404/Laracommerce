@extends('frontend.layout')
@section('title','Category')
@section('index')


<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="" onchange="sort_by()" id="sort_by_value">
                    @if($sort =='')
                    <option value="" ="Default" selected>Default</option>
                    <option value="name" >Name</option>
                    <option value="price_desc" >Price - Desc</option>
                    <option value="price_asc" >Price - Asc</option>
                    <option value="date" >Date</option>
                    @endif
                    @if($sort=='name')
                    <option value="" ="Default" >Default</option>
                    <option value="name" selected>Name</option>
                    <option value="price_desc" >Price - Desc</option>
                    <option value="price_asc" >Price - Asc</option>
                    <option value="date" >Date</option>
                    @endif
                    @if ($sort=='price_desc')
                    <option value="" ="Default" >Default</option>
                    <option value="name" >Name</option>
                    <option value="price_desc" selected>Price - Desc</option>
                    <option value="price_asc" >Price - Asc</option>
                    <option value="date" >Date</option>
                    @endif
                    @if ($sort=='price_asc')
                    <option value="" ="Default" >Default</option>
                    <option value="name" >Name</option>
                    <option value="price_desc" >Price - Desc</option>
                    <option value="price_asc" selected>Price - Asc</option>
                    <option value="date" >Date</option>
                    @endif
                    @if ($sort=='date')
                    <option value="" ="Default" >Default</option>
                    <option value="name" >Name</option>
                    <option value="price_desc" >Price - Desc</option>
                    <option value="price_asc" >Price - Asc</option>
                    <option value="date" selected>Date</option>
                    @endif
                  </select>

                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
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
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                @foreach ($home_category as $category)

                 @if ($slug==$category->slug)
                 <li><a href="{{ route('category',$category->slug) }}" class="active_cat">{{ $category->name }}</a></li>
                 @else
                 <li><a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a></li>
                 @endif

                @endforeach
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <a href="#">Fashion</a>
                <a href="#">Ecommerce</a>
                <a href="#">Shop</a>
                <a href="#">Hand Bag</a>
                <a href="#">Laptop</a>
                <a href="#">Head Phone</a>
                <a href="#">Pen Drive</a>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="button" onclick="sort_by_price()">Filter</button>
               </form>
              </div>

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
               @foreach ($colors as $color)

                @if (in_array($color->id,$colorattrArr))
                <a class="aa-color-{{ strtolower($color->color) }} active_color" href="javascript:void(0)" onclick="set_color('{{ $color->id }}','1')"></a>
                @else
                <a class="aa-color-{{ strtolower($color->color) }}" href="javascript:void(0)" onclick="set_color('{{ $color->id }}','0')"></a>
                @endif

                @endforeach
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </aside>
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
<form  id="categoryfilter">
    <input type="hidden" id="sort" name="sort" value="{{ $sort }}"/>
    <input type="hidden" id="filter_price_start" name="filter_price_start" value="{{ $filter_price_start }}"/>
    <input type="hidden" id="filter_price_end" name="filter_price_end" value="{{ $filter_price_end }}"/>
    <input type="hidden" id="color_filter" name="color_filter" value="{{ $color_filter }}"/>

  </form>
@endsection
