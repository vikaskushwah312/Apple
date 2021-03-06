@extends('web.owner.dashboard.master')
@section('css')
<style type="text/css">
        .preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}
.preview-images-zone > .preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.close_image {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}

.container {
    padding-top: 50px;
}
.required{
    color: red;
    font-size: 20px;
}

    </style>
@endsection
@section('webcontent')
<div class="submit-address dashboard-list">
    <h4 class="bg-grea-3">Basic Information</h4>
    <form method="post" action="{{url('owner/my-properties/edit/'.$property_edit->id)}}" id="submit_property" name="submit_property" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        <div class="search-contents-sidebar">
            <div class="row pad-20">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Property Title <strong class="required">*</strong></label>
                        <input type="text" class="input-text" id="title" name="title" placeholder="Property Title" value="{{ $property_edit->title}}" required>
                        <p class="error help-block" id="title">
                          @if($errors->has('title'))
                            <i class="error"></i> {{ $errors->first('title') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Service Type <strong class="required">*</strong></label>
                        <select class="selectpicker search-fields" id="service_type" name="service_type" required>
                            <option value="">Select Type</option>
                            @if($property_edit->service_type == 'premium')
                                <option value="premium" selected>Premium</option>
                                <option value="ecostay">Ecostay</option>
                            @elseif(($property_edit->service_type == 'ecostay'))
                                <option value="premium" >Premium</option>
                                <option value="ecostay" selected>Ecostay</option>
                            @else
                                <option value="premium">Premium</option>
                                <option value="ecostay">Ecostay</option>
                            @endif

                        </select>
                        <p class="error help-block">
                          @if($errors->has('service_type'))
                            <i class="error"></i> {{ $errors->first('service_type') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Price <strong class="required">*</strong></label>
                        <input type="text" class="input-text" id="price" name="price" placeholder="Price" value="{{ $property_edit->price}}" required>
                        <p class="error help-block" id="price">
                          @if($errors->has('price'))
                            <i class="error"></i> {{ $errors->first('price') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Ac/Non-Ac<strong class="required">*</strong></label>
                        <select class="selectpicker search-fields" id="type" name="type" required>
                            <option value="">Select Type</option>
                            @if($property_edit->type == 'Ac')
                                <option value="Ac" selected="">Ac</option>
                                <option value="Non-Ac">Non-Ac</option>
                            @else
                                <option value="Ac" >Ac</option>
                                <option value="Non-Ac" selected="">Non-Ac</option>
                            @endif
                        </select>
                        <p class="error help-block" id="type">
                          @if($errors->has('type'))
                            <i class="error"></i> {{ $errors->first('type') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Area(Sqft) <strong class="required"></strong></label>
                        <input type="text" class="input-text" id="area" name="area" value="{{ $property_edit->area}}" placeholder="SqFt">
                        <p class="error help-block" id="area">
                          @if($errors->has('area'))
                            <i class="error"></i> {{ $errors->first('area') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Girls/Boys <strong class="required">*</strong></label>
                        <select class="selectpicker search-fields" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                             @if($property_edit->gender == 'Girls')
                                <option value="Girls" selected="">Girls</option>
                                <option value="Boys">Boys</option>
                                <option value="Both">Both</option>
                            @elseif($property_edit->gender == 'Boys')
                                <option value="Girls">Girls</option>
                                <option value="Boys" selected="">Boys</option>
                                <option value="Both">Both</option>
                            @elseif($property_edit->gender == 'Both')
                                <option value="Girls">Girls</option>
                                <option value="Boys">Boys</option>
                                <option value="Both" selected="">Both</option>
                            @endif
                        </select>
                        <p class="error help-block" id="gender">
                          @if($errors->has('gender'))
                            <i class="error"></i> {{ $errors->first('gender') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Rooms <strong class="required">*</strong></label>
                        <input type="number" class="input-text" id="room" name="room" placeholder="Rooms" required value="{{ $property_edit->room}}" >
                        <p class="error help-block" id="room">
                          @if($errors->has('room'))
                            <i class="error"></i> {{ $errors->first('room') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Sharing <strong class="required">*</strong></label>
                        <input type="number" class="input-text" id="share_bed" name="share_bed" placeholder="Sharing" value="{{ $property_edit->share_bed}}" required>
                        <p class="error help-block" id="share_bed">
                          @if($errors->has('share_bed'))
                            <i class="error"></i> {{ $errors->first('share_bed') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Bed <strong class="required">*</strong></label>
                        <input type="number" class="input-text" id="bed" name="bed" placeholder="Bed" value="{{ $property_edit->bed}}" required>
                        <p class="error help-block" id="bed">
                          @if($errors->has('bed'))
                            <i class="error"></i> {{ $errors->first('bed') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>BathRooms <strong class="required">*</strong></label>
                        <input type="number" class="input-text" id="bathroom" name="bathroom" placeholder="BathRooms" value="{{ $property_edit->bathroom}}" required>
                        <p class="error help-block" id="bathroom">
                          @if($errors->has('bathroom'))
                            <i class="error"></i> {{ $errors->first('bathroom') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Kitchen <strong class="required">*</strong></label>
                        <input type="number" class="input-text" id="kitchen" name="kitchen" placeholder="Kitchen" value="{{ $property_edit->kitchen}}" required>
                        <p class="error help-block" id="kitchen">
                          @if($errors->has('kitchen'))
                            <i class="error"></i> {{ $errors->first('kitchen') }}
                          @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Location </h4>
        <div class="row pad-20">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Address <strong class="required">*</strong></label>
                    <input type="text" class="input-text" id="address" name="address"  placeholder="Address" value="{{ $property_edit->address}}" required>
                    <p class="error help-block" id="address">
                      @if($errors->has('address'))
                        <i class="error"></i> {{ $errors->first('address') }}
                      @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>State</label>
                    <select class="selectpicker search-fields" id="state" name="state">
                        <option>Choose State</option>
                        @foreach($state as $s)
                            <option value="{{$s->id}}" {{ $property_edit->state? $property_edit->state == $s->id?'selected':'' :''}}>{{$s->state_name}}</option>
                        @endforeach
                    </select>
                    <p class="error help-block" id="state">
                      @if($errors->has('state'))
                        <i class="error"></i> {{ $errors->first('state') }}
                      @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Postal Code</label>
                    <input type="text" class="input-text" id="postal_code" name="postal_code" value="{{ $property_edit->postal_code}}"  placeholder="Postal Code">
                    <p class="error help-block" id="postal_code">
                      @if($errors->has('postal_code'))
                        <i class="error"></i> {{ $errors->first('postal_code') }}
                      @endif
                    </p>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Property Gallery</h4>
        <div class="container">
            <!-- <input type="file" id="image" name="image" style="" class="form-control" multiple> -->
            <fieldset class="form-group">
                <a href="javascript:void(0)" onclick="$('#image').click()">Upload Image<strong class="required">*</strong></a>
                <input type="file" id="image" name="image[]" style="display: none;" class="form-control" multiple="" required>

                <p class="error help-block" id="image">
                  @if($errors->has('image'))
                    <i class="error"></i> {{ $errors->first('image') }}
                  @endif
                </p>
            </fieldset>
            <div class="preview-images-zone" >
                <div class="row col-sm-12" id="image_append">
                    @foreach($image_gallery as $img)
                    @if($img->image != '')
                    <div class="col-lg-2 col-md-2 preview-image preview-show-{{$img->id}} ">
                        <div class="close_image image-cancel" data-no="{{$img->id}}">x</div>
                        <div class="image-zone">
                            <img id="image-{{$img->id}}" src="{{url('public/uploads/gallery_image').'/'.$img->image}}" width="150px;" height="150px;">
                        </div>
                        <input type="hidden" name="image_edit[]" id="image_edit" value="{{$img->image}}">
                    </div>
                    @endif
                    @endforeach
                    <!-- append preview images -->
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Detailed Information <strong class="required">*</strong></h4>
        <div class="row pad-20">
            <div class="col-lg-12">
                <textarea class="input-text" id="description" name="description" placeholder="Detailed Information" required="" value="">{{ $property_edit->description}}</textarea>
                <p class="error help-block" id="description">
                  @if($errors->has('description'))
                    <i class="error"></i> {{ $errors->first('description') }}
                  @endif
                </p>
            </div>
        </div>
        <!-- <h4 class="bg-grea-3">Features (optional)</h4>
        <div class="row pad-20">
            @foreach($features as $key=>$fe)
                @php
                    $checked='';
                    if(in_array($fe->id,$propertey_features)){
                        $checked= 'checked';
                    }
                    
                @endphp
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="features_{{$key}}" type="checkbox" name="features[]" value="{{$fe->id}}" {{$checked}}>
                    <label for="features_{{$key}}">
                        {{$fe->feature}}
        
                    </label>
                </div>
            </div>
            @endforeach
        </div> -->
        <h4 class="bg-grea-3">Contact Details</h4>
        <div class="row pad-20">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="input-text" id="name" name="name" placeholder="Name" required="" value="{{ $property_edit['cop']->name}}">
                    <p class="error help-block" id="name">
                      @if($errors->has('name'))
                        <i class="error"></i> {{ $errors->first('name') }}
                      @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="input-text" id="email" name="email" placeholder="Email" required="" value="{{ $property_edit['cop']->email}}">
                    <p class="error help-block" id="email">
                      @if($errors->has('email'))
                        <i class="error"></i> {{ $errors->first('email') }}
                      @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Phone (optional)</label>
                    <input type="text" class="input-text" id="phone" name="phone"  placeholder="Phone" required="" value="{{ $property_edit['cop']->phone}}" >
                    <p class="error help-block" id="phone">
                      @if($errors->has('phone'))
                        <i class="error"></i> {{ $errors->first('phone') }}
                      @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <button class="btn btn-md button-theme" type="submit">Submit Property</button>
            </div>
        </div>
    </form>
</div>

@stop
@section('js')
<script type="text/javascript">
$(document).ready(function() {

   /*******************************************************************/
    var num=1;
    function readImage() {
        console.log("i am in readImage");
        if (window.File && window.FileList && window.FileReader) {
            var files = event.target.files; //FileList object

            var output = $("#image_append");
            output.empty();
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')){
                    return alert(file.name + " is not an image");
                } else {
                    var picReader = new FileReader();
                    
                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        var html =  '<div class="col-lg-2 col-md-2 preview-image preview-show-' + num + '">' +
                                    '<div class="close_image image-cancel" data-no="' + num + '">x</div>' +
                                    '<div class="image-zone"><img id="image-' + num + '" src="' + picFile.result + '" width="150px;" height="150px;"></div>' +
                                    '</div>';

                        output.append(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                }
                
            }
            $("#pro-image").val('');
        } else {
            console.log('Browser not support');
        }
    }

    //when click on  upload image
    document.getElementById('image').addEventListener('change', readImage, false);
    //close the preview image
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});
</script>
<script type="text/javascript">
    //google autocomplete
     function initAutocomplete() {
  
        var autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('address'), {types: ['geocode']});
        autocomplete.setFields(['address_component']);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD48RM8R6yisl1QRVKIJd77de5EtwT7-WY&libraries=places&callback=initAutocomplete"
        async defer></script>
@endsection