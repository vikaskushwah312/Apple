@extends('layouts.master')
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
                <div class="properties-description mb-40">
                    <h3 class="heading-2">
                        Description
                    </h3>
                    <p>{{$result->description}}</p>
                </div>
                <!-- Properties amenities start -->
                <div class="properties-amenities mb-40">
                    <h3 class="heading-2">
                        Features
                    </h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <i class="fa fa-check"></i>Air conditioning
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Balcony
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Pool
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Room service
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Gym
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <i class="fa fa-check"></i>Wifi
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Parking
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Double Bed
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Home Theater
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Electric
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <i class="fa fa-check"></i>Telephone
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Jacuzzi
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Alarm
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Garage
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>Security
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Floor plans start -->
                <div class="floor-plans mb-50">
                    <h3 class="heading-2">Floor Plans</h3>
                    <table>
                        <tbody><tr>
                            <td><strong>Size</strong></td>
                            <td><strong>Rooms</strong></td>
                            <td><strong>Bathrooms</strong></td>
                            <td><strong>Garage</strong></td>
                        </tr>
                        <tr>
                            <td>1600</td>
                            <td>3</td>
                            <td>2</td>
                            <td>1</td>
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

@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){

	
});
</script>
@endsection