@extends('frontend.layout')
  @section('title','Change password')
  @section('index')

  <!-- catg header banner section -->
  {{-- <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section> --}}
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-12">
                <div class="aa-myaccount-login">
                <h4>Password Change</h4>
                 <form action="" class="aa-login-form" id="frmForgotPassword">
                  <label for="">Password<span>*</span></label>
                   <input type="password" placeholder="Passwoord" name="forgot_password">
                   <label for="">Confirm Password<span>*</span></label>
                    <input type="password" placeholder="Confirm Password" name="forgot_password_confirm">
                    <div id="password_msg_change" class="field_error"></div>
                    <button type="submit" class="aa-browse-btn" id="btnForgotPassoword">Submit</button>

                    {{-- <div id="password_msg" style="clear: both;"></div> --}}

                    @csrf
                  </form>
                </div>
                {{-- <div id="password_msg_change" class="field_error"></div> --}}
              </div>

            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection
