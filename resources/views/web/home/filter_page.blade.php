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
<div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           {{$result->links()}}
                        </ul>
                    </nav>
                </div>
    