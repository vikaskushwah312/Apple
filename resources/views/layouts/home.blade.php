@extends('layouts.master')
<!-- Banner start -->
@section('home')
	<div class="banner" id="banner">
	    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
	        <div class="carousel-inner">
	            <div class="carousel-item banner-max-height active">
	                <img class="d-block w-100" src="{{url('public/img/home1920_1000.jpg')}}" alt="banner">
	                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
	                    <div class="carousel-content container">
	                        <div class="text-center">
	                            <h3 class="text-uppercase">Find Your Property</h3>
	                            <p>
	                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	                            </p>
	                            <div class="inline-search-area ml-auto mr-auto d-none d-xl-block d-lg-block">
	                            	<form action="{{url('home-filter')}}" method="GET" name="home_filter" id="home_filter" style="margin-left:140px;">
	                                <div class="row">
	                                	<div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
										    <input type="text" class="filter-option-inner selectpicker search-fields" name="location" id="location" style="height: 54px;text-align: center;" placeholder="Location">
										</div>
										<div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
										    <select class="selectpicker search-fields" id="share_bed" name="share_bed" style="text-align: center;">
										        <option value="">Sharing</option>
										        <option value="1">1</option>
										        <option value="2">2</option>
										        <option value="3">3</option>
										        <option value="4">4</option>
										    </select>
										</div>
										<div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
										    <select class="selectpicker search-fields" id="room" name="room" >
										        <option value="">Rooms</option>
										        <option value="1">1</option>
										        <option value="2">2</option>
										        <option value="3">3</option>
										        <option value="4">4</option>
										    </select>
										</div>
										<div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
										    <select class="selectpicker search-fields" id="type" name="type">
										    	<option value="">Ac/Non-Ac</option>
										        <option value="Ac">Ac</option>
										        <option value="Non-Ac">Non-Ac</option>
										    </select>
										</div>
										<div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
										    <button class="btn button-theme btn-search btn-block">
										        <i class="fa fa-search"></i><strong>Find</strong>
										    </button>
										</div>
	                                	
	                                </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="container search-options-btn-area">
	        <a class="search-options-btn d-lg-none d-xl-none">
	            <div class="search-options d-none d-xl-block d-lg-block">Search Options</div>
	            <div class="icon"><i class="fa fa-chevron-up"></i></div>
	        </a>
	    </div>
	</div>
	<!-- Banner end -->

	<!-- Search Section start -->
	<div class="search-section search-area pb-hediin-12 bg-grea animated fadeInDown" id="search-style-1">
	    <div class="container">
	        <div class="search-section-area">
	            <div class="search-area-inner">
	                <div class="search-contents">
	                    <form method="GET">
	                        <div class="row">
	                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
	                                <div class="form-group">
	                                    <select class="selectpicker search-fields" name="any-status">
	                                        <option>Any Status</option>
	                                        <option>For Rent</option>
	                                        <option>For Sale</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
	                                <div class="form-group">
	                                    <select class="selectpicker search-fields" name="all-type">
	                                        <option>All Type</option>
	                                        <option>Apartments</option>
	                                        <option>Shop</option>
	                                        <option>Restaurant</option>
	                                        <option>Villa</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
	                                <div class="form-group">
	                                    <select class="selectpicker search-fields" name="bedrooms">
	                                        <option>Bedrooms</option>
	                                        <option>1</option>
	                                        <option>2</option>
	                                        <option>3</option>
	                                        <option>4</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
	                                <div class="form-group">
	                                    <select class="selectpicker search-fields" name="bathrooms">
	                                        <option>Bathrooms</option>
	                                        <option>1</option>
	                                        <option>2</option>
	                                        <option>3</option>
	                                        <option>4</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
	                                <div class="form-group">
	                                    <select class="selectpicker search-fields" name="location1">
	                                        <option>location</option>
	                                        <option>United States</option>
	                                        <option>American Samoa</option>
	                                        <option>Belgium</option>
	                                        <option>Canada</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
	                                <div class="form-group">
	                                    <button class="search-button">Search</button>
	                                </div>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Search Section end -->

	<!-- Featured Properties start -->
	<div class="featured-properties content-area">
	    <div class="container">
	        <!-- Main title -->
	        <div class="main-title">
	            <h1>Featured Properties</h1>
	            <p>Find your properties in your city</p>
	        </div>
	        <!-- Slick slider area start -->
	        <div class="slick-slider-area">
	            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
	                <div class="slick-slide-item">
	                    <div class="property-box">
	                        <div class="property-thumbnail">
	                            <a href="properties-details.html" class="property-img">
	                                <div class="listing-badges">
	                                    <span class="featured">Featured</span>
	                                </div>
	                                <div class="price-box"><span>$850.00</span> Per month</div>
	                                <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
	                            </a>
	                        </div>
	                        <div class="detail">
	                            <h1 class="title">
	                                <a href="properties-details.html">Modern Family Home</a>
	                            </h1>

	                            <div class="location">
	                                <a href="properties-details.html">
	                                    <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
	                                </a>
	                            </div>
	                        </div>
	                        <ul class="facilities-list clearfix">
	                            <li>
	                                <span>Area</span>3600 Sqft
	                            </li>
	                            <li>
	                                <span>Beds</span> 3
	                            </li>
	                            <li>
	                                <span>Baths</span> 2
	                            </li>
	                            <li>
	                                <span>Garage</span> 1
	                            </li>
	                        </ul>
	                        <div class="footer">
	                            <a href="#">
	                                <i class="flaticon-people"></i> Jhon Doe
	                            </a>
	                            <span>
	                                <i class="flaticon-calendar"></i>5 Days ago
	                            </span>
	                        </div>
	                    </div>
	                </div>
	                <div class="slick-slide-item">
	                    <div class="property-box">
	                        <div class="property-thumbnail">
	                            <a href="properties-details.html" class="property-img">
	                                <div class="listing-badges">
	                                    <span class="featured">Featured</span>
	                                </div>
	                                <div class="price-box"><span>$850.00</span> Per month</div>
	                                <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
	                            </a>
	                        </div>
	                        <div class="detail">
	                            <h1 class="title">
	                                <a href="properties-details.html">Two storey modern flat</a>
	                            </h1>

	                            <div class="location">
	                                <a href="properties-details.html">
	                                    <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
	                                </a>
	                            </div>
	                        </div>
	                        <ul class="facilities-list clearfix">
	                            <li>
	                                <span>Area</span>3600 Sqft
	                            </li>
	                            <li>
	                                <span>Beds</span> 3
	                            </li>
	                            <li>
	                                <span>Baths</span> 2
	                            </li>
	                            <li>
	                                <span>Garage</span> 1
	                            </li>
	                        </ul>
	                        <div class="footer">
	                            <a href="#">
	                                <i class="flaticon-people"></i> Jhon Doe
	                            </a>
	                            <span>
	                                <i class="flaticon-calendar"></i>5 Days ago
	                            </span>
	                        </div>
	                    </div>
	                </div>
	                <div class="slick-slide-item">
	                    <div class="property-box">
	                        <div class="property-thumbnail">
	                            <a href="properties-details.html" class="property-img">
	                                <div class="listing-badges">
	                                    <span class="featured">Featured</span>
	                                </div>
	                                <div class="price-box"><span>$850.00</span> Per month</div>
	                                <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
	                            </a>
	                        </div>
	                        <div class="detail">
	                            <h1 class="title">
	                                <a href="properties-details.html">Luxury Villa</a>
	                            </h1>

	                            <div class="location">
	                                <a href="properties-details.html">
	                                    <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
	                                </a>
	                            </div>
	                        </div>
	                        <ul class="facilities-list clearfix">
	                            <li>
	                                <span>Area</span>3600 Sqft
	                            </li>
	                            <li>
	                                <span>Beds</span> 3
	                            </li>
	                            <li>
	                                <span>Baths</span> 2
	                            </li>
	                            <li>
	                                <span>Garage</span> 1
	                            </li>
	                        </ul>
	                        <div class="footer">
	                            <a href="#">
	                                <i class="flaticon-people"></i> Jhon Doe
	                            </a>
	                            <span>
	                                <i class="flaticon-calendar"></i>5 Days ago
	                            </span>
	                        </div>
	                    </div>
	                </div>
	                <div class="slick-slide-item">
	                    <div class="property-box">
	                        <div class="property-thumbnail">
	                            <a href="properties-details.html" class="property-img">
	                                <div class="listing-badges">
	                                    <span class="featured">Featured</span>
	                                </div>
	                                <div class="price-box"><span>$850.00</span> Per month</div>
	                                <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
	                            </a>
	                        </div>
	                        <div class="detail">
	                            <h1 class="title">
	                                <a href="properties-details.html">Modern Family Home</a>
	                            </h1>

	                            <div class="location">
	                                <a href="properties-details.html">
	                                    <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
	                                </a>
	                            </div>
	                        </div>
	                        <ul class="facilities-list clearfix">
	                            <li>
	                                <span>Area</span>3600 Sqft
	                            </li>
	                            <li>
	                                <span>Beds</span> 3
	                            </li>
	                            <li>
	                                <span>Baths</span> 2
	                            </li>
	                            <li>
	                                <span>Garage</span> 1
	                            </li>
	                        </ul>
	                        <div class="footer">
	                            <a href="#">
	                                <i class="flaticon-people"></i> Jhon Doe
	                            </a>
	                            <span>
	                                <i class="flaticon-calendar"></i>5 Days ago
	                            </span>
	                        </div>
	                    </div>
	                </div>
	                <div class="slick-slide-item">
	                    <div class="property-box">
	                        <div class="property-thumbnail">
	                            <a href="properties-details.html" class="property-img">
	                                <div class="listing-badges">
	                                    <span class="featured">Featured</span>
	                                </div>
	                                <div class="price-box"><span>$850.00</span> Per month</div>
	                                <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
	                            </a>
	                        </div>
	                        <div class="detail">
	                            <h1 class="title">
	                                <a href="properties-details.html">Relaxing Apartment</a>
	                            </h1>

	                            <div class="location">
	                                <a href="properties-details.html">
	                                    <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
	                                </a>
	                            </div>
	                        </div>
	                        <ul class="facilities-list clearfix">
	                            <li>
	                                <span>Area</span>3600 Sqft
	                            </li>
	                            <li>
	                                <span>Beds</span> 3
	                            </li>
	                            <li>
	                                <span>Baths</span> 2
	                            </li>
	                            <li>
	                                <span>Garage</span> 1
	                            </li>
	                        </ul>
	                        <div class="footer">
	                            <a href="#">
	                                <i class="flaticon-people"></i> Jhon Doe
	                            </a>
	                            <span>
	                                <i class="flaticon-calendar"></i>5 Days ago
	                            </span>
	                        </div>
	                    </div>
	                </div>
	                <div class="slick-slide-item">
	                    <div class="property-box">
	                        <div class="property-thumbnail">
	                            <a href="properties-details.html" class="property-img">
	                                <div class="listing-badges">
	                                    <span class="featured">Featured</span>
	                                </div>
	                                <div class="price-box"><span>$850.00</span> Per month</div>
	                                <img class="d-block w-100" src="http://placehold.it/330x220" alt="properties">
	                            </a>
	                        </div>
	                        <div class="detail">
	                            <h1 class="title">
	                                <a href="properties-details.html">Real Luxury Villa</a>
	                            </h1>

	                            <div class="location">
	                                <a href="properties-details.html">
	                                    <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
	                                </a>
	                            </div>
	                        </div>
	                        <ul class="facilities-list clearfix">
	                            <li>
	                                <span>Area</span>3600 Sqft
	                            </li>
	                            <li>
	                                <span>Beds</span> 3
	                            </li>
	                            <li>
	                                <span>Baths</span> 2
	                            </li>
	                            <li>
	                                <span>Garage</span> 1
	                            </li>
	                        </ul>
	                        <div class="footer">
	                            <a href="#">
	                                <i class="flaticon-people"></i> Jhon Doe
	                            </a>
	                            <span>
	                                <i class="flaticon-calendar"></i>5 Days ago
	                            </span>
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
	<!-- Featured Properties end -->

	<!-- Services start -->
	<div class="services content-area bg-grea-3">
	    <div class="container">
	        <!-- Main title -->
	        <div class="main-title text-center">
	            <h1>Working with the Reality</h1>
	            <p>Who you work with matters</p>
	        </div>
	        <div class="row">
	            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
	                <div class="service-info">
	                    <div class="icon">
	                        <i class="flaticon-user"></i>
	                    </div>
	                    <h3>Personalized Service</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
	                </div>
	            </div>
	            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
	                <div class="service-info">
	                    <div class="icon">
	                        <i class="flaticon-apartment-1"></i>
	                    </div>
	                    <h3>Luxury Real Estate Experts</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
	                </div>
	            </div>
	            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 d-none d-xl-block d-lg-block">
	                <div class="service-info">
	                    <div class="icon">
	                        <i class="flaticon-discount"></i>
	                    </div>
	                    <h3>Modern Building For Rent $ Sell</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Services end -->

	<!-- Categories strat -->
	<div class="categories content-area-7">
	    <div class="container">
	        <!-- Main title -->
	        <div class="main-title text-center">
	            <h1>Most Popular Places</h1>
	            <p>Find Your Properties In Your City</p>
	        </div>
	        <div class="row">
	            <div class="col-lg-5 col-md-12 col-sm-12 col-pad">
	                <div class="category">
	                    <div class="category_bg_box category_long_bg cat-4-bg">
	                        <div class="category-overlay">
	                            <div class="category-content">
	                                <h3 class="category-title">
	                                    <a href="#">Apartment</a>
	                                </h3>
	                                <h4 class="category-subtitle">12 Properties</h4>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-7 col-md-12 col-sm-12">
	                <div class="row">
	                    <div class="col-sm-6 col-pad">
	                        <div class="category">
	                            <div class="category_bg_box cat-1-bg">
	                                <div class="category-overlay">
	                                    <div class="category-content">
	                                        <h3 class="category-title">
	                                            <a href="properties-list-rightside.html">Form</a>
	                                        </h3>
	                                        <h4 class="category-subtitle">27 Properties</h4>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-6 col-pad">
	                        <div class="category">
	                            <div class="category_bg_box cat-2-bg">
	                                <div class="category-overlay">
	                                    <div class="category-content">
	                                        <h3 class="category-title">
	                                            <a href="#">House</a>
	                                        </h3>
	                                        <h4 class="category-subtitle">98 Properties</h4>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-6 col-pad">
	                        <div class="category">
	                            <div class="category_bg_box cat-3-bg">
	                                <div class="category-overlay">
	                                    <div class="category-content">
	                                        <h3 class="category-title">
	                                            <a href="#">Villa</a>
	                                        </h3>
	                                        <h4 class="category-subtitle">98 Properties</h4>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-6 col-pad">
	                        <div class="category">
	                            <div class="category_bg_box cat-5-bg">
	                                <div class="category-overlay">
	                                    <div class="category-content">
	                                        <h3 class="category-title">
	                                            <a href="#">Restaurant</a>
	                                        </h3>
	                                        <h4 class="category-subtitle">98 Properties</h4>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Categories end -->

	<!-- Counters strat -->
	<div class="counters overview-bgi">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-3 col-md-3 col-sm-6">
	                <div class="counter-box">
	                    <i class="flaticon-sale"></i>
	                    <h1 class="counter">967</h1>
	                    <p>Listings For Sale</p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3 col-sm-6">
	                <div class="counter-box">
	                    <i class="flaticon-rent"></i>
	                    <h1 class="counter">1276</h1>
	                    <p>Listings For Rent</p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3 col-sm-6">
	                <div class="counter-box">
	                    <i class="flaticon-user"></i>
	                    <h1 class="counter">396</h1>
	                    <p>Agents</p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3 col-sm-6">
	                <div class="counter-box">
	                    <i class="flaticon-work"></i>
	                    <h1 class="counter">177</h1>
	                    <p>Brokers</p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Counters end -->

	<!-- Our team start -->
	<!-- Our team end -->

	<!-- Blog start -->
	<!-- Blog end -->

	<!-- Partners strat -->
	<div class="partners">
	    <div class="container">
	        <div class="slick-slider-area">
	            <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
	                <div class="slick-slide-item"><img src="public/img/rant_160_80.jpg" alt="brand" class="img-fluid"></div>
	                <div class="slick-slide-item"><img src="public/img/rant_160_80.jpg" alt="brand" class="img-fluid"></div>
	                <div class="slick-slide-item"><img src="public/img/rant_160_80.jpg" alt="brand" class="img-fluid"></div>
	                <div class="slick-slide-item"><img src="public/img/rant_160_80.jpg" alt="brand" class="img-fluid"></div>
	                <div class="slick-slide-item"><img src="public/img/rant_160_80.jpg" alt="brand" class="img-fluid"></div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Partners end -->
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
	/*function filter(search){
		var key = search;
		$.ajax({
			url : "home-filter" ,
			type : "GET",
			data: {'key':key},
			success: function(res){
				console.log(res);
				if(res.status){
					$("#filter_home").html(res.result);
				}
			}
		});
	}
	filter();*/
});
</script>
<script type="text/javascript">
    //google autocomplete
     function initAutocomplete() {
  
        var autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('location'), {types: ['geocode']});
        autocomplete.setFields(['address_component']);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD48RM8R6yisl1QRVKIJd77de5EtwT7-WY&libraries=places&callback=initAutocomplete"
        async defer></script>
@endsection