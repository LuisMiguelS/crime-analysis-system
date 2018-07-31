<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>C·A·S | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user_id" content="{{ Auth::check() ? Auth::user()->id : '' }}">
        
        <meta content="C·A·S - Crime Analysis System" name="description" />
        <meta content="C·A·S" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{ asset('admin/assets/css/style_dark.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/plugins/jquery-toastr/jquery.toast.min.css') }}" rel="stylesheet" />
        
        @yield('styles')

        <script src="{{ asset('admin/assets/js/modernizr.min.js') }}"></script>
    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Sidebar ========== -->
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

            <!-- ============================================================== -->
            <!-- Contenido dinamico de la pagina -->
            <!-- ============================================================== -->

            <div class="content-page">
                
                @include('admin.includes.top-bar')

                <div class="content">
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                </div>

                @include('admin.includes.footer')

            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin/plugins/jquery-toastr/jquery.toast.min.js') }}"></script>

        <!-- Dashboard -->
        {{-- <script src="{{ asset('admin/assets/pages/jquery.dashboard.init.js') }}"></script> --}}

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.app.js') }}"></script>
        <script src="{{ asset('js/resources.js') }}"></script>
        
        <script type="text/javascript">
            @if(Session::has('success'))
                successAlert('¡Bien Hecho!', '{{ Session::get('success') }}');
            @endif
        </script>

        @yield('scripts')
    </body>
</html>