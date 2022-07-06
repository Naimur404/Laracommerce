@extends('frontend.layout')
@section('title','Checkout')
@section('index')


<section id="checkout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="checkout-area">

             <div class="row">
               <div class="col-md-8">
                 <div class="checkout-left">
                   <div class="panel-group" id="accordion">
                    @if(session()->has('USER_LOGIN') == null)
                     <div class="panel panel-default aa-checkout-login">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                             Client Login
                           </a>
                         </h4>
                       </div>
                       <div id="collapseTwo" class="panel-collapse collapse">
                         <div class="panel-body">

                            <form action="" class="aa-login-form" id="frmLogin">
                                <label for="">Email address<span>*</span></label>
                                 <input type="text" placeholder="Email" name="login_email">
                                 <label for="">Password<span>*</span></label>
                                  <input type="password" placeholder="Password" name="login_password">
                                  <button type="submit" class="aa-browse-btn" id="btnlogin">Login</button>
                                  <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                                  <div id="login_msg" style="clear: both;"></div>
                                  <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                                  @csrf
                                </form>

                         </div>
                       </div>
                     </div>
                     @endif

                     <!-- Coupon section -->
                     <form id="frmPlaceOrder">
                     <div class="panel panel-default aa-checkout-coupon apply_coupon_code_box2">
                       <div class="panel-heading">
                         <h4 class="panel-title">


                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="" >
                             Have a Coupon?
                           </a>
                         </h4>
                       </div>
                       <div id="collapseOne" class="panel-collapse collapse in ">

                         <div class="panel-body">
                           <input type="text" placeholder="Coupon Code" class="aa-coupon-code " name="coupon_code" id="coupon_code">
                           <input type="button" onclick="applyCouponCode()" value="Apply Coupon" class="aa-browse-btn apply_coupon_code_box">


                         </div>
                         <div id="coupon_msg" class="field_error"></div>


                       </div>
                     </div>
                     <!-- Login section -->

                     <!-- Billing Details -->
                     <div class="panel panel-default aa-checkout-billaddress">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                             Billing Details
                           </a>
                         </h4>
                       </div>
                       <div id="collapseThree" class="panel-collapse collapse">
                         <div class="panel-body">
                           <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="Name*" value="{{ $customers['name'] }}" name="name">
                               </div>
                             </div>


                           </div>
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="email" placeholder="Email Address*" value="{{ $customers['email'] }}" name="email" required>
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="tel" placeholder="Phone*"value="{{ $customers['phone'] }}" name="phone" required>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <textarea cols="8" rows="3" value="" name="address" required>{{ $customers['address'] }}</textarea>
                               </div>
                             </div>
                           </div>
                           {{-- <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <select>
                                   <option value="0">Select Your Country</option>
                                   <option value="1">Australia</option>
                                   <option value="2">Afganistan</option>
                                   <option value="3">Bangladesh</option>
                                   <option value="4">Belgium</option>
                                   <option value="5">Brazil</option>
                                   <option value="6">Canada</option>
                                   <option value="7">China</option>
                                   <option value="8">Denmark</option>
                                   <option value="9">Egypt</option>
                                   <option value="10">India</option>
                                   <option value="11">Iran</option>
                                   <option value="12">Israel</option>
                                   <option value="13">Mexico</option>
                                   <option value="14">UAE</option>
                                   <option value="15">UK</option>
                                   <option value="16">USA</option>
                                 </select>
                               </div>
                             </div>
                           </div> --}}
                           <div class="row">

                             <div class="col-md-4">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="City / Town*" value="{{ $customers['state'] }}" name="state">
                               </div>
                             </div>


                             <div class="col-md-4">
                               <div class="aa-checkout-single-bill">

                                 <select name="city" required>
                                    @if($customers['city'] !=null )
                                    <option value="0">Select Your District</option>
                                    <option value="{{ $customers['city'] }}" selected>{{ $customers['city'] }}</option>
                                    @else
                                    <option value="0" selected>Select Your District</option>
                                    <option value="{{ $customers['city'] }}" >{{ $customers['city'] }}</option>
                                    @endif
                                    <option value="Bagerhat">Bagerhat</option>
                                    <option value="Bandarban">Bandarban</option>
                                    <option value="Barguna">Barguna</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Bhola">Bhola</option>
                                    <option value="Bogra">Bogra</option>
                                    <option value="Brahmanbaria">Brahmanbaria</option>
                                    <option value="Chandpur">Chandpur</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Chuadanga">Chuadanga</option>
                                    <option value="Comilla">Comilla</option>
                                    <option value="Cox'sBazar">Cox'sBazar</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Dinajpur">Dinajpur</option>
                                    <option value="Faridpur">Faridpur</option>
                                    <option value="Feni">Feni</option>
                                    <option value="Gaibandha">Gaibandha</option>
                                    <option value="Gazipur">Gazipur</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Habiganj">Habiganj</option>
                                    <option value="Jaipurhat">Jaipurhat</option>
                                    <option value="Jamalpur">Jamalpur</option>
                                    <option value="Jessore">Jessore</option>
                                    <option value="Jhalokati">Jhalokati</option>
                                    <option value="Jhenaidah">Jhenaidah</option>
                                    <option value="Khagrachari">Khagrachari</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Kishoreganj">Kishoreganj</option>
                                    <option value="Kurigram">Kurigram</option>
                                    <option value="Kushtia">Kushtia</option>
                                    <option value="Lakshmipur">Lakshmipur</option>
                                    <option value="Lalmonirhat">Lalmonirhat</option>
                                    <option value="Madaripur">Madaripur</option>
                                    <option value="Magura">Magura</option>
                                    <option value="Manikganj">Manikganj</option>
                                    <option value="Maulvibazar">Maulvibazar</option>
                                    <option value="Meherpur">Meherpur</option>
                                    <option value="Munshiganj">Munshiganj</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Naogaon">Naogaon</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Narayanganj">Narayanganj</option>
                                    <option value="Narsingdi">Narsingdi</option>
                                    <option value="Natore">Natore</option>
                                    <option value="Nawabganj">Nawabganj</option>
                                    <option value="Netrokona">Netrokona</option>
                                    <option value="Nilphamari">Nilphamari</option>
                                    <option value="Noakhali">Noakhali</option>
                                    <option value="Pabna">Pabna</option>
                                    <option value="Panchagarh">Panchagarh</option>
                                    <option value="Patuakhali">Patuakhali</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                    <option value="Rajbari">Rajbari</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangamati">Rangamati</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Satkhira">Satkhira</option>
                                    <option value="Shariatpur">Shariatpur</option>
                                    <option value="Sherpur">Sherpur</option>
                                    <option value="Sirajganj">Sirajganj</option>
                                    <option value="Sunamganj">Sunamganj</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Tangail">Tangail</option>
                                    <option value="Thakurgaon">Thakurgaon</option>
                                 </select>
                               </div>
                             </div>
                             <div class="col-md-4">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="Postcode / ZIP*" value="{{ $customers['zip'] }}" name="zip">
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                     <!-- Shipping Address -->

                   </div>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="checkout-right">
                   <h4>Order Summary</h4>
                   <div class="aa-order-summary-area">
                     <table class="table table-responsive">
                       <thead>
                         <tr>
                           <th>Product</th>
                           <th>Total</th>
                         </tr>
                       </thead>
                       <tbody>
                        <?php
                         $totalprice = 0;
                        ?>
                        @foreach ($cart_data as $list)

                        <?php

                        $totalprice = $totalprice +($list->qty*$list->price);
                    ?>
                         <tr>
                           <td>{{ $list->pname }} <strong> x  {{ $list->qty }}</strong>
                           </br>
                           <span class="color_checkout">{{ strtoupper($list->color) }}</span>
                        </td>
                           <td>৳ {{ $list->price * $list->qty }}</td>
                         </tr>
                         @endforeach
                       </tbody>
                       <tfoot>
                        <tr class="hide show_coupon_box">
                            <th>Coupon Code <a href="javescript:void(0)" onclick="remove_coupon_code()" class="remove_coupon_code_link">Remove</a></th>
                            <td id="coupon_code_str"></td>
                          </tr>
                         <tr>
                           <th>Subtotal</th>
                           <td id="subtotal_price">৳ {{ $totalprice  }}</td>
                         </tr>
                          <tr>
                           <th>Shipping</th>
                           <td>৳ 40</td>
                         </tr>
                          <tr>
                           <th>Total</th>
                           <td id="total_price">৳ {{  $totalprice + 40 }}</td>
                         </tr>
                       </tfoot>
                     </table>
                   </div>
                   <h4>Payment Method</h4>
                   <div class="aa-payment-method">
                     <label for="cod"><input type="radio" id="cod" name="payment_type" value="COD" checked > Cash on Delivery </label>
                     <label for="instamojo"><input type="radio" id="instamojo" name="payment_type" value="Gateway"> AamraPay </label>
                     <img class="mt-2" src="data:image/png;base64,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" border="0" alt="PayPal Acceptance Mark">
                     <input type="submit" value="Place Order" class="aa-browse-btn" id="btnPlaceOrder">
                   </div>

                 </div>
               </div>
               @csrf

            </form>
             </div>

             </div>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
