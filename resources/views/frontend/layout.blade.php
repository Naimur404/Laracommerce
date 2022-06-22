<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Font awesome -->
    <link href="{{ asset('front_asset/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('front_asset/css/bootstrap.css')}}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('front_asset/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front_asset/css/jquery.simpleLens.css')}}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front_asset/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front_asset/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('front_asset/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('front_asset/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('front_asset/css/style.css')}}" rel="stylesheet">



    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>
    var ImagePath="{{ asset('storage/media')}}";
</script>
  </head>
  <body class="productPage">
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>
    <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  @include('frontend.header')
  <!-- / header section -->
  <!-- menu -->
  @include('frontend.menu')
  <!-- / menu -->
  <!-- Start slider -->


  <!-- / slider -->
  <!-- Start Promo section

  <!-- / Support section -->
  <!-- Testimonial -->

  <!-- / Testimonial -->
@yield('index')
  <!-- Latest Blog -->

  <!-- / Latest Blog -->

  <!-- Client Brand -->

  <!-- / Client Brand -->

  <!-- Subscribe section -->

  <!-- / Subscribe section -->

  <!-- footer -->
  @include('frontend.footer')
  <!-- / footer -->
<?php

if(isset($_COOKIE["login_email"]) && isset($_COOKIE["login_password"])){

    $checked = "checked='checked'";

}else{

    $checked = "";

}
?>
  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="popup_login">
            <h4>Login or Register</h4>
            <form class="aa-login-form" id="frmLogin">
              <label for="">Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="login_email" value="{{ Cookie::get('login_email') }}"  required >
              <label for="">Password<span>*</span></label>
              <input type="password" placeholder="Password" name="login_password" required value="{{Cookie::get('login_password') }}" >
              <button class="aa-browse-btn" type="submit" id="btnLogin">Login</button>
              <label for="rememberme" class="rememberme" ><input type="checkbox" id="rememberme" name="rememberme" {{  $checked}}> Remember me </label>
              <div id="login_msg" style="clear: both;"></div>
              <p class="aa-lost-password"><a href="javascript:void(0)" onclick="forgot_password()">Lost your password?</a></p>
              <div class="aa-register-now">
                Don't have an account?<a href="{{ route('registration') }}">Register now!</a>
              </div>
              @csrf
            </form>
        </div>
        <div id="popup_forgot" style="display: none">
            <h4>Forget Password</h4>
            <form class="aa-login-form" id="frmForgot">
              <label for="">Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="forgot_email" value="{{ Cookie::get('login_email') }}"  required >

              <button class="aa-browse-btn" type="submit" id="btnForgot">Submit</button>

              <div id="forgot_msg" style="clear: both;"></div>

              <div class="aa-register-now">
                Login Form?<a href="javascript:void(0)" onclick="show_login_popup()">Login Now!</a>
              </div>
              @csrf
            </form>
        </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <!-- jQuery library -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('front_asset/js/bootstrap.js')}}"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{ asset('front_asset/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{ asset('front_asset/js/jquery.smartmenus.bootstrap.js')}}"></script>
  <!-- To Slider JS -->
  <script src="{{ asset('front_asset/js/sequence.js')}}"></script>
  <script src="{{ asset('front_asset/js/sequence-theme.modern-slide-in.js')}}"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="{{ asset('front_asset/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{ asset('front_asset/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{ asset('front_asset/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{ asset('front_asset/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{ asset('front_asset/js/custom.js')}}"></script>

  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  </body>
</html>
