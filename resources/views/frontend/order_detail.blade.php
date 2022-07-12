@extends('frontend.layout')
@section('title','My Order Detail')
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
        <div class="col-md-6">
            <div class="order_detail">
                <h3><ul>Order Details</ul></h3>
              Name: {{ $orders_details[0]->name }}<br/>
              Phone: {{ $orders_details[0]->phone }}<br/>
              Address: {{ $orders_details[0]->address }}<br/>
              City: {{ $orders_details[0]->city }}<br/>
              Zip: {{ $orders_details[0]->zip }}<br/>

            </div>
        </div>
        <div class="col-md-6">
            <div class="order_detail_2">
                <h3>Payment Details</h3>
              Order Status: {{ $orders_details[0]->orders_status }}<br/>
              Payment Status: {{ $orders_details[0]->payment_status }} <br/>
              Payment Type: {{ $orders_details[0]->payment_type }}<br/>
              <?php
              if($orders_details[0]->tran_id != ''){
              echo  'Payment Id: '.$orders_details[0]->tran_id.'<br/>';
              }
              ?>

            <b class="m-t-5">Tracking Details: </b>
            {{ $orders_details[0]->track_details }}
            </div>

        </div>
        <div class="col-md-12">
          <div class="cart-view-area">

            <div class="cart-view-table">




                <div class="table-responsive">
                   <table class="table">
                     <thead>
                       <tr>

                         <th>Product Name</th>
                         <th>Product Image</th>
                         <th>Size</th>

                         <th>Color</th>
                         <th>Qty</th>
                         <th>Price</th>
                         <th>Total Amount</th>

                       </tr>
                     </thead>
                     <tbody>
                        <?php
                        $totalamt = 0;

                        ?>
                         @foreach ($orders_details as $data )

                         <?php
                         $totalamt = $totalamt+($data->qty*$data->price);

                         ?>
                         <tr>
                         <td>{{$data->pname }}</td>
                         <td><img src="{{ asset('storage/media/' . $data->image ) }}" style="width: 80px" alt="img"></td>
                         <td> {{ $data->size }}</td>
                         <td>{{ $data->color }} </td>

                         <td>{{ $data->qty }}</td>

                         <td >{{ $data->price }}</td>
                         <td >{{  $data->qty*$data->price }}</td>
                       </tr>
                       @endforeach
                       <tr>
                          <td colspan="5">&nbsp;</td>
                          <td colspan=""><b>Total</b></td>
                        <td ><b>{{   $totalamt  }}</b></td>
                      </tr>
                          <?php
                           if($orders_details[0]->coupon_value>0){
                            echo '
                            <tr>
                          <td colspan="5">&nbsp;</td>
                          <td colspan=""><b>Coupon <span class="coupon_code_txt">('.$orders_details[0]->coupon_code.')</span></b></td>
                        <td ><b>'.$orders_details[0]->coupon_value.'</b></td>
                      </tr>
                            ';
                           $totalamt = $totalamt - $orders_details[0]->coupon_value;

                            echo '
                            <tr>
                          <td colspan="5">&nbsp;</td>
                          <td colspan=""><b>Final Total</b></td>
                        <td ><b>'.$totalamt.'</b></td>
                      </tr>
                            ';

                           }

                          ?>
                       </tbody>
                   </table>
                 </div>

              <!-- Cart Total view -->




            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
