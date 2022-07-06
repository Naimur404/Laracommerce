@extends('admin.layout')
@section('page_title','Order Details')
@section('order_select','active')
@section('container')



<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35"> Order - ST{{ $orders_details[0]->id }}</h3>
    <div class="row whitebg">
    <div class=" col-md-6 order_operations">
        <h5 style="margin-bottom: 5px">  Update Order Status </h5>

        <select class="form-control form-control" id="order_status"  onchange="update_order_status('{{ $orders_details[0]->id }}')">
            <?php
            foreach ($orders_status as $list ){
                if ($orders_details[0]->order_status == $list->id) {
            echo "<option value='$list->id' selected>$list->orders_status</option>";
                }else{
                   echo "<option value='$list->id'>$list->orders_status</option>";
                }
            }
             ?>

          </select>

  </div>
  <div class=" col-md-6 order_operations">
    <h5 style="margin-bottom: 5px">  Update Payment Status </h5>



      <select class="form-control form-control" id="payment_status" onchange="update_payment_status('{{ $orders_details[0]->id }}')">
       <?php
foreach ($payment_status as $list ){
    if ($orders_details[0]->payment_status == $list) {
echo "<option value='$list' selected>$list</option>";
    }else{
       echo "<option value='$list'>$list</option>";
    }
}
 ?>

      </select>

</div>
<div class=" col-md-6 order_operations">
    <textarea class="form-control"></textarea>
</div>

    </div>
    <div class="table-responsive table-responsive-data2 whitebg">

        <div class="row ">

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
                  if($orders_details[0]->payment_id != ''){
                  echo  'Payment Id: '.$orders_details[0]->payment_id.'<br/>';
                  }
                  ?>


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
    <!-- END DATA TABLE -->

</div>

@endsection
