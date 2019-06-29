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
                    <div class="widget advanced-search" id="advance_search">
                      <h3 class="sidebar-title">Advanced Search</h3>
                        <form  id="advance_search_form" name="advance_search_form" method="get">
                            <div class="form-group">
                                <input type="text" class="filter-option-inner selectpicker search-fields" name="location" id="location" style="height: 54px;text-align: center;width: 100%;" placeholder="Location" value="{{$address}}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="rooms" id="rooms">
                                          <option value="">Rooms</option>
                                          <option value="1" {{ ( $room == 1 ) ? 'selected' : '' }}>1</option>
                                          <option value="2" {{ ( $room == 2) ? 'selected':''}}>2</option>
                                          <option value="3" {{ ( $room == 3) ? 'selected':''}}>3</option>
                                          <option value="4" {{ ( $room == 4) ? 'selected':''}}>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathroom" id="bathroom">
                                            <option value="">Bathroom</option>
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
                                            <option value="">Sharing</option>
                                            <option value="1" {{ ( $share_bed == 1 ) ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ ( $share_bed == 2 ) ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ ( $share_bed == 3 ) ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ ( $share_bed == 4 ) ? 'selected' : '' }}>4</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="type" id="type">
                                          <option value="">select Ac/Non-Ac</option>
                                            <option value="Ac" {{ ( $type == 'Ac' ) ? 'selected' : '' }}>Ac</option>
                                            <option value="Non-Ac" {{ ( $type == 'Non-AC' ) ? 'selected' : '' }}>Non-Ac</option>
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
                            <div class="form-group mb-0">
                                <button type="button"  class="search-button" id="advance_search_button" name="advance_search_button">Search</button>
                            </div>
                        </form>
                        <!-- advance search -->
                    </div>
                    <!-- Recent properties start -->
                   
                    <!-- Posts by category Start -->
                    
                    <!-- Our agent sidebar start -->
                    
                </div>
            </div>
            <div class="col-lg-8 col-md-12" id="advance_search_result">
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
                                        <a href="{{url('properte-details').'/'.$res->id}}">{{$res->title}}</a>
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
                                        <span>Sharing</span>{{$res->share_bed}}
                                    </li>
                                    <li>
                                        <span>Rooms</span>{{$res->room}}
                                    </li>
                                    <li>
                                        <span>Ac/Non-Ac</span>{{$res->type}}
                                    </li>
                                </ul>
                                <div class="footer">
                                    <a href="#" tabindex="0">
                                        <i class="flaticon-people"></i>{!! copName($res->id)!!}
                                      </a>
                                    <span>
                                          <i class="flaticon-phone"></i>{!! copPhone($res->id)!!}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div style="text-align: center;"><strong class="error">No Recored Found</strong> </div>
                @endif
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           
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
    $('#advance_search_button').on('click',function(){
        advanceSearch('{{ url("advance-search") }}');
    });
  
  //Get the filter result of advance search 
    function advanceSearch(url){
        var formvalue = $("#advance_search_form").serialize();
        /*var location = $('#location').val();
        var rooms = $('#rooms').val();
        var bathroom = $('#bathroom').val();
        var share_bed = $('#share_bed').val();
        var type = $('#type').val();
        'location':location,'rooms':rooms,'bathroom':bathroom,'share_bed':share_bed,'type':type*/

        $.ajax({
            url : url ,
            type : "GET",
            data: {'formvalue':formvalue},
            success: function(res){
                if(res.status){
                    $("#advance_search_result").html(res.data);
                }
            }
        });
    }
    // advanceSearch();

/*******************Advance Search Filter  pagiantion *************************************/
    $('body').on('click', '.pagination a', function(e) {
        var url = $(this).attr('href');
        if (url != '#') {
          advanceSearch(url);
          e.preventDefault();
        } 
        
    });

	
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