
  @extends('frontend.layout')
  @section('title','Registration')
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
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
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
              <div class="col-md-6">
                <div class="aa-myaccount-register">
                 <h4>Register</h4>
                 <form  class="aa-login-form" id="frmRegistration">
                    <label for="">Name<span>*</span></label>
                    <input type="text" name="name" placeholder="Name" required>
                    <div id="name_error" class="field_error hello"></div>
                    <label for="">Email<span>*</span></label>
                    <input type="email" name="email" placeholder="Email" required>
                    <div id="email_error" class="field_error hello"></div>
                    <label for="">Phone<span>*</span></label>
                    <input type="text" name="phone" placeholder="Phone" required>
                    <div id="phone_error" class="field_error hello"></div>
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password">
                    <div id="password_error" class="field_error hello"></div>
                    <button type="submit" id="btnRegistration" class="aa-browse-btn">Register</button>
                    @csrf
                  </form>
                </div>
                <div id="sucess_mgs" class="field_error"></div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection
