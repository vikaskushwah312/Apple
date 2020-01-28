@extends('layouts.master')
<!-- Banner start -->
@section('home')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>About Us</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- About city estate start -->
<div class="about-real-estate  content-area-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="about-slider-box simple-slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="http://placehold.it/540x360" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="http://placehold.it/540x360" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="http://placehold.it/540x360" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="slider-mover-left slider-btn-l" aria-hidden="true">
                                <i class="fa fa-angle-left"></i>
                            </span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="slider-mover-right slider-btn-r " aria-hidden="true">
                                 <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                    <div class="Properties-info d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <ul>
                            <li>
                                <i class="flaticon-hotel"></i>
                                <h4>Bed 3</h4>
                            </li>
                            <li>
                                <i class="flaticon-bathroom"></i>
                                <h4>Beds 2</h4>
                            </li>
                            <li>
                                <i class="flaticon-area"></i>
                                <h4>SQ.FT 3500</h4>
                            </li>
                            <li>
                                <i class="flaticon-mechanic"></i>
                                <h4>Garage 1</h4>
                            </li>
                            <li>
                                <i class="flaticon-balcony"></i>
                                <h4>Balcony 1</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h3>Welcome to RealHouse</h3>
                    <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly</p>
                    <p>transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted.</p>
                    <a href="#" class="btn btn-md button-theme">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->

<!-- Our team start -->
<div class="our-team content-area-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p>We Have Professional Agents</p>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="http://placehold.it/225x268" alt="avatar-10" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a href="agent-detail.html">Karen Paran</a>
                                </h4>
                                <h5>Office Manager</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="http://placehold.it/225x268" alt="avatar-9" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a href="agent-detail.html">Eliane Pereira</a>
                                </h4>
                                <h5>Creative Director</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="http://placehold.it/225x268" alt="avatar-10" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a href="agent-detail.html">Karen Paran</a>
                                </h4>
                                <h5>Office Manager</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="http://placehold.it/225x268" alt="avatar-9" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a href="agent-detail.html">Eliane Pereira</a>
                                </h4>
                                <h5>Creative Director</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Our team end -->
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){

	
});
</script>
@endsection