<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href=" {{ asset('admin_asset/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_asset/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_asset/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_asset/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">



    <!-- Main CSS-->
    <link href="{{ asset('admin_asset/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset('admin_asset/images/icon/logo.png') }}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('admin.auth')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>

                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin_asset/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin_asset/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

    <script src="{{ asset('admin_asset/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('admin_asset/vendor/wow/wow.min.js')}}"></script>


    <!-- Main JS-->
    <script src="{{ asset('admin_asset/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
