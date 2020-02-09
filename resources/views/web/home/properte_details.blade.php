@extends('layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('public/css/font.css')}}">

@endsection
<!-- Banner start -->
@section('home')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties Detail</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('')}}">Home</a></li>
                <li class="active">Properties Detail</li>
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
                    
                    <div class="send-btn pull-right"> <!-- {{url('vigit').'/'.$result->id}} -->
                        <!-- data-toggle="modal" data-target="#vigit" -->
                        <!-- id="vigit" -->
                        <!-- data-toggle="modal" data-target="#vigit" -->
                        <a href="{{url('vigit').'/'.$result->id}}" class="btn btn-md button-theme"  id="vigit" target="_blank">Visit</a>
                        <a href="{{url('pg/book-room').'/'.$result->id}}" class="btn btn-md button-theme">Book</a>
                    </div>
                    <h1>{{$result->title}}</h1>
                    <div class="mb-30"><span class="property-price">Rs {{$result->price}} / month</span> <span class="rent">{{$result->status}}</span> <span class="location"><i class="flaticon-pin"></i>{{$result->address}},</span></div>
                </div>
                

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- main slider carousel items -->
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                    <div class="carousel-inner">
                       
                        @foreach($images as $key => $img)
                            @if($key == 0)
                                <div class="active item carousel-item" data-slide-number="{{$key}}">
                                    <center>
                                    {!! searchBigImage($img->id) !!}
                                    </center>
                                </div>
                            @else
                                <div class="item carousel-item" data-slide-number="{{$key}}">
                                    <center>
                                    {!! searchBigImage($img->id) !!}
                                    </center>
                                </div>
                            @endif
                        @endforeach
                        <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                        @foreach($images as $key => $img)
                            @if($key == 0)
                               <li class="list-inline-item active">
                                   <a id="carousel-selector-{{$key}}" class="selected" data-slide-to="{{$key}}" data-target="#propertiesDetailsSlider">
                                    <center>
                                       {{!! searchSmallImage($img->id) !!}}
                                    </center>
                                   </a>
                               </li>
                            @else
                               <li class="list-inline-item">
                                   <a id="carousel-selector-{{$key}}" data-slide-to="{{$key}}" data-target="#propertiesDetailsSlider">
                                    <center>
                                       {{!! searchSmallImage($img->id) !!}}
                                    </center>
                                   </a>
                               </li>
                            @endif
                        @endforeach
                   </ul>

                   
                    <!-- main slider carousel items -->
                </div>
                <!-- Advanced search start -->
                <!-- Properties description start -->
                <div class="properties-description mb-40 ">
                    <h3 class="heading-2">
                        Description
                    </h3>
                    <span>{{$result->description}}</span>
                </div>
                <!-- Properties amenities start -->
                @if($result->service_type)
                <div class="properties-amenities mb-40">
                    <h3 class="heading-2">
                       Home Amenities
                    </h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <i class="fa fa-bed"></i>Bed
                            </li>
                            </ul>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <img src="{{url('public/services/bed.png')}}"><i></i>Mattress
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <img src="{{url('public/services/pillow.png')}}"><i></i>Pillow & Cover
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <img src="{{url('public/services/stage.png')}}"><i></i>Curtain
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <img src="{{url('public/services/couch.png')}}"><i></i>Sofa
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <img src="{{url('public/services/man-in-office-desk-with-computer.png')}}"><i></i>Chair
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <img src="{{url('public/services/washing-machine.png')}}"><i></i>Washing Machine
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <img src="{{url('public/services/camera.png')}}"><i></i>Camera
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <i class="fa fa-television "></i>Television 
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <i class="fa fa-table"></i>Table 
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <i class="fa fa-cutlery"></i>Cutlery 
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <i class="fa fa-bitbucket"></i>Bucket  
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <i class="fa fa-bitbucket"></i>Bucket  
                            </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                            <li>
                                <i class="fa fa-bitbucket"></i>Bucket  
                            </li>
                            </ul>
                        </div>



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
                
                <!-- Similar Properties start -->
            </div>
        </div>
    </div>
</div>
<!-- Properties section end -->
<!-- modal section here #vigit -->
<div id="vigit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Vigiter Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="submit-address dashboard-list">
        <form method="post" action="{{url('submit-vigit')}}" id="vigit_property" name="vigit_property" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="search-contents-sidebar">
                <div class="row pad-20">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>First Name<strong class="required">*</strong></label>
                            <input type="text" class="input-text" id="first_name" name="first_name" placeholder="First Name" value="{{old('first_name')}}" required>
                            <p class="error help-block" id="first_name">
                              @if($errors->has('first_name'))
                                <i class="error"></i> {{ $errors->first('first_name') }}
                              @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Last Name<strong class="required">*</strong></label>
                            <input type="text" class="input-text" id="last_name" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" required>
                            <p class="error help-block" id="last_name">
                              @if($errors->has('last_name'))
                                <i class="error"></i> {{ $errors->first('last_name') }}
                              @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Email<strong class="required">*</strong></label>
                            <input type="text" class="input-text" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
                            <p class="error help-block" id="email">
                              @if($errors->has('email'))
                                <i class="error"></i> {{ $errors->first('email') }}
                              @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Contact<strong class="required">*</strong></label>
                            <input type="text" class="input-text" id="contact" name="contact" placeholder="Contact" value="{{old('contact')}}" required>
                            <p class="error help-block" id="contact">
                              @if($errors->has('contact'))
                                <i class="error"></i> {{ $errors->first('contact') }}
                              @endif
                            </p>
                        </div>
            
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn button-theme" >Submit</button>
            </div>
        </form>
        </div>
        </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>


@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    /*$("#vigit").on('click',function(){
        var property_id = $('#property_id').val();
        console.log(property_id);
        $.ajax({
            url: "{{url('vigit')}}",
            data:{'property_id':property_id},
            cache: false,
            success: function(res){
            console.log('res',res);
            if (res.status) {
                $("#vigit").modal('show')
            }
            
          }
        });
    });*/
    /*$('#vigit').on('click',function(){

        // $('#vigit_property').rest();
        $("#vigit_property").trigger("reset");

    });*/
	
});
</script>
@endsection