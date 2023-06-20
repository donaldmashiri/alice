<!DOCTYPE html>
<html lang="en">

<head>
    <title>POSB</title>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">



</head>
<body class="">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('images/posb.png') }}" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">{{ Auth::user()->name }}</div>
                    </div>
                </div>

            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="/home" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
                </li>
                @if(Auth::user()->role === "admin")
                    <li class="nav-item">
                        <a href="/users" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">
                            All Users
                        </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/records" class="nav-link "><span class="pcoded-micon"><i class="feather icon-repeat"></i></span><span class="pcoded-mtext">
                            Records
                        </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/all_reports" class="nav-link "><span class="pcoded-micon"><i class="feather icon-film"></i></span><span class="pcoded-mtext">
                            All reports
                        </span></a>
                    </li>
                @else

                    <li class="nav-item">
                        <a href="{{ route('loans.create') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-compass"></i></span><span class="pcoded-mtext">Application</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('loans.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-command"></i></span><span class="pcoded-mtext">View Applications</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('online.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-moon"></i></span><span class="pcoded-mtext">Online Payment</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/reports" class="nav-link "><span class="pcoded-micon"><i class="feather icon-film"></i></span><span class="pcoded-mtext">
                            Reports
                        </span></a>
                    </li>
                @endif

            </ul>

            <div class="card text-center">
                <div class="card-block">
                    <a href="{{ route('logout') }}" target="_blank" class="btn btn-danger btn-sm text-white m-0"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>



            </div>



        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand font-weight-bolder">
            <!-- ========   change your logo hear   ============ -->
            POSB LOAN
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">mark as read</a>
                                <a href="#!">clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="{{ asset('assets/images/user.png') }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                        <p>New ticket Added</p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="noti-footer">
                            <a href="#!">show all</a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>


</header>
<!-- [ Header ] end -->


@yield('content')


<!-- Required Js -->
<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/ripple.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>

<!-- Apex Chart -->
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>


<!-- custom-chart js -->
<script src="{{ asset('assets/js/pages/dashboard-main.js') }}"></script>
</body>

</html>

