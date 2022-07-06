@extends('frontend.layout')
@section('title','Cart')
@section('index')



<!-- <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section> -->
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
    <div class="container ">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table">
              <form action="">
                  @if (isset($list[0]))


                <div class="table-responsive">
                   <table class="table">
                     <thead>
                       <tr>
                         <th></th>
                         <th></th>
                         <th>Product</th>
                         <th>Price</th>
                         <th>Quantity</th>
                         <th>Total</th>
                       </tr>
                     </thead>
                     <tbody>
                         @foreach ($list as $data )


                       <tr id="cart_box{{ $data->attr_id }}">
                         <td><a class="remove" onclick="deleteCartProduct('{{ $data->pid }}','{{ $data->size }}','{{ $data->color }}','{{ $data->attr_id }}')" href="javascript:void(0)"><fa class="fa fa-close"></fa></a></td>
                         <td><a href="{{ url('product/'.$data->pslug) }}"><img src="{{ asset('storage/media/' . $data->image ) }}" style="width: 80px" alt="img"></a></td>
                         <td><a class="aa-cart-title" href="{{ url('product/'.$data->pslug) }}">{{ $data->pname }}</a>
                          @if($data->size != '')
                          SIZE: {{ $data->size }}<br/>
                          @endif
                          @if($data->color != '')
                          COLOR: {{ $data->color }}<br/>
                          @endif

                        </td>
                         <td> ৳ {{ $data->price }}</td>
                         <td><input class="aa-cart-quantity" id="qty{{ $data->attr_id }}" onchange="updateQty('{{ $data->pid }}','{{ $data->size }}','{{ $data->color }}','{{ $data->attr_id }}','{{ $data->price}}')" type="number" value="{{ $data->qty }}"></td>
                         <td id="total_price_{{ $data->attr_id}}">৳ {{ $data->price * $data->qty }}</td>
                       </tr>
                       @endforeach
                       <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Checkout">
                        </td>
                      </tr>


                       </tbody>
                   </table>
                 </div>
                 @else
                 <h3 style="text-align: center">Cart Is Empty!!</h3>
                 @endif
              </form>
              <!-- Cart Total view -->




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
