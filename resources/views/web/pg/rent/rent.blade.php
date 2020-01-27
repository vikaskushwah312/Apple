@extends('web.pg.dashboard.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/css/bootstrap-datetimepicker/jquery-ui.css')}}">
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 -->
@endsection
@section('webcontent')

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Pay Rent</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('')}}">Home</a></li>
                <li class="active">Pay Rent</li>
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
                <div class="submit-address dashboard-list">
                    <form method="post" action="{{url('pg/book')}}" id="room_book_form" name="room_book_form" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="search-contents-sidebar">
                        <div class="row pad-20">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tenure in month<strong class="required">*</strong></label>
                                    <input type="number" name="tenure" id="tenure" class="form-control" placeholder="Tenure" value="" required="">
                                    <p class="error help-block" id="tenure">
                                    @if($errors->has('tenure'))
                                        <i class="error"></i> {{ $errors->first('tenure') }}
                                    @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Total Price (Rs)<strong class="required">*</strong></label>
                                    <p id="show_total_price">0</p>
                                    <input type="hidden" name="amount" id="amount" class="form-control" placeholder="Total Price" value="" required="">
                                    <p class="error help-block" id="amount">
                                    @if($errors->has('amount'))
                                        <i class="error"></i> {{ $errors->first('amount') }}
                                    @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Start Date<strong class="required">*</strong></label>
                                    <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date" value="" required="" autocomplete="off">
                                    <p class="error help-block" >
                                    @if($errors->has('start_date'))
                                        <i class="error"></i> {{ $errors->first('start_date') }}
                                    @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>End Date <strong class="required">*</strong></label>
                                    <input type="text" name="end_date" id="end_date" class="form-control" placeholder="End Date" value="" required="" autocomplete="off">
                                    <p class="error help-block">
                                    @if($errors->has('end_date'))
                                        <i class="error"></i> {{ $errors->first('end_date') }}
                                    @endif
                                    </p>
                                </div>
                            </div>


                            
                        </div>
                    </div>
                    
                    <input type="hidden" name="property_id" id="property_id" value="{{$result->id}}">
                    <input type="hidden" name="price_pm" id="price_pm" value="{{$result->price}}">
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 pull-right">
                        <button type="submit"  class="search-button" id="payment_btn" name="payment_btn">Payment</button>
                    </div>
                    </form>
                </div>
                <!-- Similar Properties start -->
            </div>
        </div>
    </div>
</div>
<!-- Properties section end -->

@stop
@section('js')
<script type="text/javascript" src="{{url('public/js/bootstrap-datetimepicker/jquery-1.12.4.js')}}"></script>
<script type="text/javascript" src="{{url('public/js/bootstrap-datetimepicker/jquery-ui.js')}}"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
    $('#money-active').addClass('active');
         
    $('#tenure').on('keyup mouseup', function() {                                                                   
        var tenure = $('#tenure').val();
        var price_pm = $('#price_pm').val();
        var total_price = price_pm*tenure;
        var amount = $("#amount").val(total_price);
        var amount = $("#show_total_price").text(total_price);                                                 
      
    });

    
});
$(window).on('load', function() {
 var tenure = $('#tenure').val('');
});


</script>
<script>
 $(function(){
        // alert("vikas");
        $("#start_date").datepicker();
        $("#end_date").datepicker();
        /*$("#end_date").datepicker().bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("dd/mm/yy", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#start_date").datepicker( "option", "minDate", minValue );
        })*/
    });
 /*$("#start_date").on('change',function(){
    
    $("#end_date").datepicker().bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("dd/mm/yy", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#start_date").datepicker( "option", "minDate", minValue );
        })
 })*/
</script>
@endsection