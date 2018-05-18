<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>C·A·S | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{ asset('admin/assets/css/style_dark.css') }}" rel="stylesheet" type="text/css" />

        @yield('styles')

        <script src="{{ asset('admin/assets/js/modernizr.min.js') }}"></script>
    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu side-menu-sm">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="{{ route('dashboard') }}" class="logo">
                            <span>
                                <img src="{{ asset('admin/assets/images/logo_light.png') }}" alt="" height="50">
                            </span>
                            <i>
                                <img src="{{ asset('admin/assets/images/logo_sm_light.png') }}" alt="" height="50">
                            </i>
                        </a>
                    </div>

                    @include('admin.includes.user-box')

                    @include('admin.includes.side-menu')

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <!-- Top Bar Start -->
                @include('admin.includes.top-bar')

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                </div>

                @include('admin.includes.footer')

            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>

        <!-- Flot chart -->
        <script src="{{ asset('admin/plugins/flot-chart/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('admin/plugins/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('admin/plugins/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('admin/plugins/flot-chart/jquery.flot.crosshair.js') }}"></script>
        <script src="{{ asset('admin/plugins/flot-chart/curvedLines.js') }}"></script>
        <script src="{{ asset('admin/plugins/flot-chart/jquery.flot.axislabels.js') }}"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="{{ asset('admin/plugins/jquery-knob/excanvas.js') }}"></script>
        <![endif]-->
        <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.js') }}"></script>

        <!-- Dashboard Init -->
        <script src="{{ asset('admin/assets/pages/jquery.dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.app.js') }}"></script>
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
        @yield('scripts')

    </body>
</html>