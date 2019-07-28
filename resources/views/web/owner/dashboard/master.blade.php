@include('layouts.header_css')

<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand pad-0" href="{{url('')}}">
                {!! logoImage()!!}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ getPrifileImage(auth('user')->user()->id) }}" 
                                        alt="avatar">
                                    My Account
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('owner/my-profile')}}">My profile</a>
                                    <a class="dropdown-item" href="{{url('owner/logout')}}">Logout</a>
                                </div>
                            </div>
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
                        <ul class="dashoard-list">
                            <li id="dashboard-active"><a href="{{url('owner/dashboard')}}"><i class="flaticon-dashboard"></i> Dashboard</a></li>
                            <li id="mypropertis-active"><a href="{{url('owner/my-properties')}}"><i class="flaticon-apartment-1"></i>My Properties</a></li>
                            <li id="invoices-active"><a href="{{url('owner/invoices')}}"><i class="flaticon-bill"></i>My Invoices</a></li>
                            <li id="sub-active"><a href="{{url('owner/submit-property')}}"><i class="flaticon-plus"></i>Submit Property</a></li>
                            <li id="complain_list-active"><a href="{{url('owner/complain-list')}}"><i class="flaticon-comment"></i>Complain List</a></li>
                            <li id="messages-active"><a href="{{url('owner/messages')}}"><i class="flaticon-mail"></i>Enquery<span class="nav-tag">6</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>{{$title}}</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <!-- <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.html">Index</a>
                                        </li>
                                        <li>
                                            <a href="dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="active">Invoice</li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @yield('webcontent')
                  <p class="sub-banner-2 text-center position:absolute;bottom:0;width:100%;">© <?php echo  date('Y');?> Theme Vessel. Trademarks and brands are the property of their respective owners.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashbord end -->

<!-- Full Page Search -->
@include('layouts.footer_js')