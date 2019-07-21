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
                        <a href="{{url('properte-details').'/'.$res->id}}">
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
<div class="pagination-box hidden-mb-45 text-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
           {{$result->links()}}
        </ul>
    </nav>
</div>
    