@extends('layouts.master')
<!-- Banner start -->
@section('home')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties Listing</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('')}}">Home</a></li>
                <li class="active">Properties Listing</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Properties section start -->
<div class="properties-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-left">
                    <!-- Advanced search start -->
                    <div class="widget advanced-search">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <form  id="search_form" name="search_form" >
                            <div class="form-group">
                                <input type="text" class="filter-option-inner selectpicker search-fields" name="location" id="location" style="height: 54px;text-align: center;width: 100%;" placeholder="Location">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="rooms" id="rooms">
                                            <option>Rooms</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathroom" id="bathroom">
                                            <option>Bathroom</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="share_bed" id="share_bed">
                                            <option>Sharing</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="type" id="type">
                                            <option value="Ac">Ac</option>
                                            <option value="Non-Ac">Non-Ac</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="INR" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                           <!--  <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                               <i class="fa fa-plus-circle"></i> Other Features
                           </a>
                           <div id="options-content" class="collapse">
                               <h3 class="sidebar-title">Features</h3>
                               <div class="s-border"></div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox2" type="checkbox">
                                   <label for="checkbox2">
                                       Air Condition
                                   </label>
                               </div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox3" type="checkbox">
                                   <label for="checkbox3">
                                       Places to seat
                                   </label>
                               </div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox4" type="checkbox">
                                   <label for="checkbox4">
                                       Swimming Pool
                                   </label>
                               </div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox1" type="checkbox">
                                   <label for="checkbox1">
                                       Free Parking
                                   </label>
                               </div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox7" type="checkbox">
                                   <label for="checkbox7">
                                       Central Heating
                                   </label>
                               </div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox5" type="checkbox">
                                   <label for="checkbox5">
                                       Laundry Room
                                   </label>
                               </div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox6" type="checkbox">
                                   <label for="checkbox6">
                                       Window Covering
                                   </label>
                               </div>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                   <input id="checkbox8" type="checkbox">
                                   <label for="checkbox8">
                                       Alarm
                                   </label>
                               </div>
                               <br>
                           </div> -->
                            <div class="form-group mb-0">
                                <button type="button"  class="search-button" id="search_button" name="search_button">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Recent properties start -->
                   
                    <!-- Posts by category Start -->
                    
                    <!-- Our agent sidebar start -->
                    
                </div>
            </div>
            <div class="col-lg-8 col-md-12" id="filter_page">
                 <!-- Option bar start -->
                <!-- Property box 2 start -->
                @if($count > 0)
                @foreach($result as $res)
                <div class="property-box-2" >
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-pad">
                            <div class="property-thumbnail">
                                <a href="{{url('properte-details')}}" class="">
                                    <img src="{{myPropertiesImageUrl($res->id)}}" alt="properties" width="300" height="253">
                                    <div class="price-box"><span style="color:white;"> Rs </span><span>{{$res->price}}</span>/Per month</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-pad">
                            <div class="detail">
                                <div class="hdg">
                                    <h3 class="title">
                                        <a href="{{url('properte-details')}}">{{$res->title}}</a>
                                    </h3>
                                    <h5 class="location">
                                        <a href="{{url('properte-details')}}">
                                            <i class="flaticon-pin"></i>{{$res->address}}
                                        </a>
                                    </h5>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span>Area</span>{{$res->area}} Sqft
                                    </li>
                                    <li>
                                        <span>Beds</span>{{$res->bed}}
                                    </li>
                                    <li>
                                        <span>Baths</span>{{$res->bathroom}}
                                    </li>
                                    <li>
                                        <span>Kitchen</span>{{$res->kitchen}}
                                    </li>
                                </ul>
                                <div class="footer">
                                    <a href="#" tabindex="0">
                                        <i class="flaticon-people"></i>{{$res->kitchen}} Jhon Doe
                                    </a>
                                    <span>
                                          <i class="flaticon-calendar"></i>{{$res->kitchen}}5 Days ago
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
              
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           {{$result->links()}}
                        </ul>
                    </nav>
                </div>

                <!-- add here filter_page  -->
            </div>
        </div>
    </div>
</div>
<!-- Properties section end -->

@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('#search_button').on('click',function(){
        filterHome();
    });
    
   
    function filterHome(){
        var formvalue = $("#search_form").serialize();
        $.ajax({
            url : "search-filter" ,
            type : "GET",
            data: {'formvalue':formvalue},
            success: function(res){
                // console.log(res);
                if(res.status){
                    $("#filter_page").html(res.data);
                }
            }
        });
    }
    // filterHome();
	
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