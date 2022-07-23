<!DOCTYPE html>
<html lang="en">


@include('admin.partial.head')
@section('page_title','Login')

<body class="animsition">


    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin.partial.navbar')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->

        <!-- END MENU SIDEBAR-->
        @include('admin.partial.sidenav')
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('admin.partial.navdes')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


@yield('container')


                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>


        <!-- Jquery JS-->
        <script src="{{ asset('admin_asset/vendor/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap JS-->
        <script src="{{ asset('admin_asset/vendor/bootstrap-4.1/popper.min.js') }}"></script>
        <script src="{{ asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>

        <script src="{{ asset('admin_asset/vendor/slick/slick.min.js') }}">
        </script>
        <script src="{{ asset('admin_asset/vendor/wow/wow.min.js') }}"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.jqueryui.min.js"></script>
        <!-- Main JS-->
        <script src="{{ asset('admin_asset/js/main.js') }}"></script>
        <script src="{{ asset('admin_asset/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('admin_asset/vendor/counter-up/jquery.counterup.min.js') }}">
        </script>
        <script src="{{ asset('admin_asset/vendor/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('admin_asset/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('admin_asset/vendor/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('admin_asset/vendor/select2/select2.min.js') }}">
        </script>
<script>
 $(document).ready( function () {
    $('#datatable').DataTable();
} );
$(document).ready( function () {
    $('#product_table').DataTable();
} );

</script>
</body>

</html>
<!-- end document-->
