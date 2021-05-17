<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zakatal Fitri | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="Lutfi Ramadhan">

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS Style -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/adminLTE/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminLTE/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/adminLTE/ionicons/css/ionicons.min.css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="/adminLTE/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminLTE/DataTables/media/css/jquery.dataTables.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="/adminLTE/DataTables/extensions/RowGroup/css/rowGroup.bootstrap.min.css">
    <!-- Steps -->
    <link rel="stylesheet" href="/adminLTE/jquery-steps/demo/css/jquery.steps.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/css/AdminLTE.css" type="text/css" media="screen">
    {{-- <link rel="stylesheet" href="/adminLTE/css/print.css" type="text/css" media="print"> --}}
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/adminLTE/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">

    <!-- Site wrapper -->
    <div class="wrapper">

        {{-- Header --}}
        @include('layout.header')

        {{-- Sidebar --}}
        
        @include('layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('pageHeader')
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">

                        @yield('content')

                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- Footer --}}
        @include('layout.footer')

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="/adminLTE/jquery/dist/jquery.min.js"></script>
    {{-- <script src="/adminLTE/jquery-steps/lib/jquery-1.11.1.min.js"></script> --}}
    <!-- jQuery Validation -->
    <script src="/adminLTE/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/adminLTE/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="/adminLTE/DataTables/media/js/jquery.dataTables.min.js"></script>
        <!-- DataTables RowGrouping-->
        <script src="/adminLTE/DataTables/extensions/RowGroup/js/dataTables.rowGroup.min.js"></script>
        
    <!-- Datepicker -->
    <script src="/adminLTE/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="/adminLTE/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- SlimScroll -->
    {{-- <script src="/adminLTE/jquery-slimscroll/jquery.slimscroll.min.js"></script> --}}
    <!-- Steps -->
    {{-- <script src="/adminLTE/jquery-steps/build/jquery.steps.min.js"></script> --}}
    <!-- Moment -->
    {{-- <script src="/adminLTE/jquery-moment/moment.min.js"></script> --}}
    <!-- FastClick -->
    {{-- <script src="/adminLTE/fastclick/lib/fastclick.js"></script> --}}
    <!-- AdminLTE App -->
    <script src="/adminLTE/js/adminlte.min.js"></script>
    {{-- <!-- AdminLTE js -->
    <script src="/adminLTE/js/adminlte.min.js"></script> --}}
    <!-- Editing js -->
    <script src="js/modal.js"></script>
    

    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>
    @stack('script')
</body>

</html>
