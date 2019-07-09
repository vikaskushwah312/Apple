@extends('web.pg.dashboard.master')
@section('webcontent')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties Book</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('')}}">Home</a></li>
                <li class="active">Properties Book</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Properties section start -->
<div class="properties-details-page content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Heading properties 3 start -->
                <div class="heading-properties-3">
                    <!-- <button class="btn pull-right" type="button">For Book</button> -->
                    <h1>{{$result->title}}</h1>
                    <div class="mb-30"><span class="property-price">Rs {{$result->price}} / month</span> <span class="rent">{{$result->status}}</span> <span class="location"><i class="flaticon-pin"></i>{{$result->address}},</span></div>
                </div>
                

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- main slider carousel items -->
                <!-- Advanced search start -->
                <!-- Properties description start -->
                <div class="properties-description mb-40 ">
                    <h3 class="heading-2">
                        Description
                    </h3>
                    <span>{{$result->description}}</span>
                </div>
                 <!-- Properties amenities start -->
                @if(count($propertey_features)> 0)
                <div class="properties-amenities mb-40">
                    <h3 class="heading-2">
                        Features
                    </h3>
                    <div class="row">
                        @foreach($features as $key=>$fe)
                            @php
                                if(in_array($fe->id,$propertey_features)){
                                
                            @endphp
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <ul class="amenities">
                                    <li>
                                        <i class="fa fa-check"></i>{{$fe->feature}}
                                    </li>
                                    </ul>
                                </div>
                            @php
                                }
                                
                            @endphp
                        @endforeach
                    </div>
                </div>
                @endif
           
                <!-- Floor plans start -->
                <div class="floor-plans mb-50">
                    <h3 class="heading-2">Floor Plans</h3>
                    <table>
                        <tbody><tr>
                            <td><strong>Size</strong></td>
                            <td><strong>Ac/Non-Ac</strong></td>
                            <td><strong>Share Bed</strong></td>
                            <td><strong>Kitchen</strong></td>
                            <td><strong>Rooms</strong></td>
                            <td><strong>Bathrooms</strong></td>
                        </tr>
                        <tr>
                            <td>{{$result->area}}</td>
                            <td>{{$result->type}}</td>
                            <td>{{$result->share_bed}}</td>
                            <td>{{$result->kitchen}}</td>
                            <td>{{$result->room}}</td>
                            <td>{{$result->bathroom}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Location start -->
                <h3 class="heading">Tenure</h3>
                <div class="dashboard-message contact-2 bdr clearfix">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <form  id="room_book_form" name="room_book_form" method="Post" action="{{url('pg/book')}}">
                                {{ csrf_field() }}
                                <div class="row col-sm-12">
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <div class="name">
                                            <label>Tenure in month<strong class="required">*</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name">
                                            <input type="number" name="tenure" id="tenure" class="form-control" placeholder="Tenure" value="" required="">
                                              @if($errors->has('tenure'))
                                                <i class="error"></i> {{ $errors->first('tenure') }}
                                              @endif
                                        </div>
                                    </div>
                                </div>
                                <h3 class="heading">Payment</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name">
                                            <label>First Name <strong class="required">*</strong></label>
                                            <input type="text" name="amount" id="amount" class="form-control" placeholder="First Name" value="" required="">
                                            <p class="error help-block" id="amount">
                                              @if($errors->has('amount'))
                                                <i class="error"></i> {{ $errors->first('amount') }}
                                              @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name">
                                            <label>Last Name <strong class="required">*</strong></label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="" required="">
                                            <p class="error help-block" id="last_name">
                                              @if($errors->has('last_name'))
                                                <i class="error"></i> {{ $errors->first('last_name') }}
                                              @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="property_id" id="property_id" value="{{$result->id}}">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 pull-right">
                                    <button type="submit"  class="search-button" id="advance_search_button" name="advance_search_button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Similar Properties start -->
            </div>
        </div>
    </div>
</div>
<!-- Properties section end -->

@stop
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('#invoices-active').addClass('active');
});
</script>
@endsection