<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }} - {{ $name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if($logo > 0)
    <link rel="icon" href="{{ url('storage/logo/' . $logo) }}">
    @else
    <link rel="icon" href="logo ilang">
    @endif

    <link rel="stylesheet" href="../../../assets/admin-page/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/admin-page/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/admin-page/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../assets/admin-page/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../assets/admin-page/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../assets/admin-page/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../../../assets/admin-page/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/dashboard">
                    <!-- Logo 1(soon) -->
                    Spd perjuangan
                </a>
                <!-- Logo 2(soon) -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="mt-2 {{ Request()->is('dashboard') ? 'active' : '' }}">
                        <a href="/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <h3 class="menu-title mt-n2 pt-0">Admin Page</h3>
                    <li class="menu-item-has-children dropdown show">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-home"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu show">
                            <li class="{{ Request()->is('admin/profile*') ? 'active' : '' }}"><i class="ti-home"></i><a href="/admin/profile">Profile Desa</a></li>
                            <li class="{{ Request()->is('admin/profile*') ? 'active' : '' }}"><i class="ti-home"></i><a href="/admin/profile-aparatur">Profile Aparatur</a></li>
                            <li class="{{ Request()->is('admin/profile*') ? 'active' : '' }}"><i class="ti-home"></i><a href="/admin/profile-bpd">Profile BPD</a></li>
                        </ul>
                    </li>
                    {{-- <li class="{{ Request()->is('admin/profile*') ? 'active' : '' }}"><a href="/admin/profile"> <i class="menu-icon ti-home"></i>Profile Desa</a></li> --}}
                    <li class="{{ Request()->is('admin/news*') ? 'active' : '' }}"><a href="/admin/news"> <i class="menu-icon ti-folder"></i>Berita desa</a></li>
                    <li class="{{ Request()->is('admin/category*') ? 'active' : '' }}"><a href="/admin/category"> <i class="menu-icon ti-list"></i>Kategori</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @yield('header')
        <!-- Header-->

        @yield('breadcrumbs')

        <div class="content mt-3">
            @yield('content')
        </div> <!-- .content -->
    </div>

    <!-- Right Panel -->

    <script src="../../../assets/admin-page/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../../assets/admin-page/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../assets/admin-page/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../assets/admin-page/assets/js/main.js"></script>


    <script src="../../../assets/admin-page/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../../../assets/admin-page/assets/js/dashboard.js"></script>
    <script src="../../../assets/admin-page/assets/js/widgets.js"></script>
    <script src="../../../assets/admin-page/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../../../assets/admin-page/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../../../assets/admin-page/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

</body>

</html>