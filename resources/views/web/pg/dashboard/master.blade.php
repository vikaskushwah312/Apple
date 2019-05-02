@include('layouts.header_css')

<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="index.html">
                <img src="img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <li class="nav-item dropdown active">
                        <a href="dashboard.html" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('pg/messages')}}" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="bookings.html" class="nav-link">Bookings</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="my-properties.html" class="nav-link">My Properties</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="my-invoices.html" class="nav-link">My Invoices</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="favorited-properties.html" class="nav-link">Favorited Properties</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="submit-property.html" class="nav-link">Submit Property</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="my-profile.html" class="nav-link">My Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="index.html" class="nav-link">Logout</a>
                    </li>
                </ul>
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="http://placehold.it/45x45" alt="avatar">
                                    My Account
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('pg/dashboard')}}">Dashboard</a>
                                    <a class="dropdown-item" href="{{url('pg/messages')}}">Messages</a>
                                    <a class="dropdown-item" href="bookings.html">Bookings</a>
                                    <a class="dropdown-item" href="my-profile.html">My profile</a>
                                    <a class="dropdown-item" href="index.html">Logout</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-theme btn-md" href="submit-property.html">Submit property</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Dashbord start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                        <h4>Main</h4>
                        <ul>
                            <li class="active"><a href="{{url('pg/dashboard')}}"><i class="flaticon-dashboard"></i> Dashboard</a></li>
                            <li><a href="{{url('pg/messages')}}"><i class="flaticon-mail"></i> Messages <span class="nav-tag">6</span></a></li>
                        </ul>
                        <h4>Listings</h4>
                        <ul>
                            <li><a href="my-properties.html"><i class="flaticon-apartment-1"></i>My Properties</a></li>
                            <li><a href="my-invoices.html"><i class="flaticon-bill"></i>My Invoices</a></li>
                            <li><a href="favorited-properties.html"><i class="flaticon-heart"></i>Favorited Properties</a></li>
                            <li><a href="submit-property.html"><i class="flaticon-plus"></i>Submit Property</a></li>
                        </ul>
                        <h4>Account</h4>
                        <ul>
                            <li><a href="{{url('pg/my-profile')}}"><i class="flaticon-people"></i>My Profile</a></li>
                            <li><a href="{{url('pg/logout')}}"><i class="flaticon-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    @yield('webcontent')
                  <p class="sub-banner-2 text-center" style="position: absolute;">© 2018 Theme Vessel. Trademarks and brands are the property of their respective owners.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashbord end -->

<!-- Full Page Search -->
@include('layouts.footer_js')