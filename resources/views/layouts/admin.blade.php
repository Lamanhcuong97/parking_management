<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hitech') }} - @yield('title')</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset("/images/favicon.png") }}>

    <!-- Bootstrap Core CSS -->
    <link href={{ asset("/css/lib/bootstrap/bootstrap.min.css")}} rel="stylesheet">
    <!-- Custom CSS -->
    <link href={{ asset("/css/helper.css") }} rel="stylesheet">
    <link href={{ asset("/css/style.css") }} rel="stylesheet">
    <link href={{ asset("/css/admin.css") }} rel="stylesheet">

    <link href={{ asset("css/lib/calendar2/pignose.calendar.min.css") }} rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.html">
                    <!-- Logo icon -->
                    <b><img src={{ asset("/images/logo.png") }} alt="homepage" class="dark-logo" /></b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span><img src={{ asset("/images/logo-text.png") }} alt="homepage" class="dark-logo" /></span>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">

                    <!-- Search -->
                    <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                    </li>

                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/users/4.png" alt="user" class="profile-pic" /></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href={{ asset("profile") }}><i class="ti-user"></i> Thông tin cá nhân</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                        <i class="fa fa-power-off"></i>
                                        Đăng xuất
                                    </a>    
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    @include('layouts.sidebar')
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    @yield ('content')
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src={{ asset("/js/lib/jquery/jquery.min.js") }}></script>
<!-- Bootstrap tether Core JavaScript -->
<script src={{ asset("/js/lib/bootstrap/js/popper.min.js" ) }}></script>
<script src={{ asset("/js/lib/bootstrap/js/bootstrap.min.js") }}></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src={{ asset("/js/jquery.slimscroll.js") }}></script>
<!--Menu sidebar -->
<script src={{ asset("/js/sidebarmenu.js") }}></script>
<!--stickey kit -->
<script src={{ asset("/js/lib/sticky-kit-master/dist/sticky-kit.min.js") }}></script>


<!-- Form validation -->

<!--Custom JavaScript -->
<script src="../js/scripts.js"></script>

@yield('script')

</body>

</html>