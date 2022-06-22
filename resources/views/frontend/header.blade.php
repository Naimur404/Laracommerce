<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="img/flag/french.jpg" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.html">My Account</a></li>

                  <li class="hidden-xs"><a href="{{ route('cart') }}">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Checkout</a></li>
                  @if(session()->has('USER_LOGIN')!= null)
                  <li><a href="{{ route('user.logout') }}" >Log Out</a></li>
                  @else
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                    <?php
                    $data = cartCount();
                    $count = count($data);
                    $totalprice = 0;
                    ?>
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{ $count }}</span>
                </a>



                <div class="aa-cartbox-summary">
                    @if ($count>0)



                  <ul>
                    @foreach ($data as $list)
                    <?php
                        $totalprice = $totalprice +($list->qty*$list->price);
                    ?>
                    <li id="box_remove_{{ $list->attr_id }}">
                      <a class="aa-cartbox-img" href="{{ url('product/'.$list->pslug) }}"><img src="{{ asset('storage/media/' . $list->image ) }}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{ $list->pname }}</a></h4>
                        <p>{{ $list->qty }} x ৳ {{ $list->price }}</p>
                      </div>
                      <a class="aa-remove-product" href="javascript:void(0)" onclick="deleteCartProduct('{{ $list->pid }}','{{ $list->size }}','{{ $list->color }}','{{ $list->attr_id }}')"><span class="fa fa-times"></span></a>
                    </li>
                    @endforeach
                    <li>
                        <span class="aa-cartbox-total-title">
                          Total
                        </span>
                        <span class="aa-cartbox-total-price">
                            ৳ {{ $totalprice }}
                        </span>
                      </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{ url('/checkout') }}">Checkout</a>

                  @endif
                </div>


              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="search_str" placeholder="Search here ex. 'man' ">
                  <button type="button" onclick="pudsearch()"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
