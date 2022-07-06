@extends('frontend.layout')
@section('title','My Order')
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




                <div class="table-responsive">
                   <table class="table">
                     <thead>
                       <tr>

                         <th>Order Id</th>
                         <th>Order Status</th>
                         <th>Payment Type</th>

                         <th>Payment Status</th>
                         <th>Payment Id</th>
                         <th>Total Amount</th>
                         <th>Placed At</th>

                       </tr>
                     </thead>
                     <tbody>
                         @foreach ($orders as $data )



                         <td><a href="{{ url('order_detail') }}/{{ $data->id }}"> ST{{$data->id }}</a></td>
                         <td><span class="badge bg-primary">{{ $data->orders_status }}</span></td>
                         <td> <span class="badge bg-success">{{ $data->payment_type }}</span></td>
                         <td><span class="badge bg-danger">{{ $data->payment_status }}</span> </td>
                         @if($data->payment_id!='')
                         <td><span class="badge bg-info text-dark">{{ $data->payment_id }}</span></td>
                         @else
                         <td><span class="badge bg-info text-dark">COD Payment</span></td>
                         @endif
                         <td ><span class="badge bg-secondary">{{ $data->total_amt }}</span></td>
                         <td >{{ $data->added_on }}</td>
                       </tr>
                       @endforeach


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
