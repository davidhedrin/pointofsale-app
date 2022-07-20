<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Point of Sales</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    
    <link href="{{ asset('assets/css/themes/white.css') }}" rel="stylesheet" id="theme-style">
    @livewireStyles
</head>

<body class="fixed-navbar has-animation fixed-layout">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.html">
                    <span class="brand">Admin
                        <span class="brand-tip">CAST</span>
                    </span>
                    <span class="brand-mini">AC</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-inbox">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                            <span class="badge badge-primary envelope-badge">9</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>9 New</strong> Messages</span>
                                    <a class="pull-right" href="mailbox.html">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('assets/img/users/u1.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"> </div>Jeanne Gonzalez<small class="text-muted float-right">Just now</small>
                                                <div class="font-13">Your proposal interested me.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('assets/img/users/u2.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Becky Brooks<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('assets/img/users/u3.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Frank Cruz<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('assets/img/users/u4.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Rose Pearson<small class="text-muted float-right">3 hrs</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>5 New</strong> Notifications</span>
                                    <a class="pull-right" href="javascript:;">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">4 task compiled</div><small class="text-muted">22 mins</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-default badge-big"><i class="fa fa-shopping-basket"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">You have 12 new orders</div><small class="text-muted">40 mins</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-danger badge-big"><i class="fa fa-bolt"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">Server #7 rebooted</div><small class="text-muted">2 hrs</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-user"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">New user registered</div><small class="text-muted">2 hrs</small></div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{ asset('assets/img/admin-avatar.png') }}" />
                            <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="{{ asset('assets/img/admin-avatar.png') }}" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">{{ Auth::user()->name }}</div><small>{{ Auth::user()->user_type == "ADM" ? "Admin" : "User" }}</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="/"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">FITUR</li>
                    <li>
                        <a href="icons.html">
                            <i class="sidebar-item-icon fa fa-file-text-o"></i>
                            <span class="nav-label">Transaksi</span>
                        </a>
                    </li>

                    @if (Auth::user()->user_type === "ADM")
                    <li class="heading">SISTEM</li>
                    <li>
                        <a href="icons.html">
                            <i class="sidebar-item-icon fa fa-home"></i>
                            <span class="nav-label">Jemaat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all.users') }}">
                            <i class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label">User Mangement</span>
                        </a>
                    </li>
                    @endif

                    <li class="heading">AKUN</li>
                    <li>
                        <a href="calendar.html">
                            <i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content">
                {{ $slot }}
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('assets/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>