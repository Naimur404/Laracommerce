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

                                 <select name="city">
                                    @if($customers['city'] !='' )
                                    <option value="0"selected>Select Your District</option>
                                    <option value="{{ $customers['city'] }}" >{{ $customers['city'] }}</option>
                                    @else
                                    <option value="0">Select Your District</option>
                                    <option value="{{ $customers['city'] }}" selected>{{ $customers['city'] }}</option>
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
                     {{-- <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"> --}}
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
