@extends('web.owner.dashboard.master')
@section('css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
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
    padding-bottom: 16px;
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
    <form method="post" action="{{url('owner/submit-property')}}" id="submit_property" name="submit_property" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="search-contents-sidebar">
            <div class="row pad-20">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Property Title <strong class="required">*</strong></label>
                        <input type="text" class="input-text" id="title" name="title" placeholder="Property Title" value="{{old('title')}}" required>
                        <p class="error help-block" id="title">
                          @if($errors->has('title'))
                            <i class="error"></i> {{ $errors->first('title') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Price <strong class="required">*</strong></label>
                        <input type="text" class="input-text" id="price" name="price" placeholder="Price" value="{{old('price')}}" required>
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
                            <option value="Ac">Ac</option>
                            <option value="Non-Ac">Non-Ac</option>
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
                        <input type="text" class="input-text" id="area" name="area" value="{{old('area')}}" placeholder="SqFt">
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
                            <option value="Girls">Girls</option>
                            <option value="Boys">Boys</option>
                            <option value="Both">Both</option>
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
                        <input type="number" class="input-text" id="room" name="room" placeholder="Rooms" required value="{{old('room')}}">
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
                        <input type="number" class="input-text" id="share_bed" name="share_bed" placeholder="Sharing" value="{{old('share_bed')}}" required>
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
                        <input type="number" class="input-text" id="bed" name="bed" placeholder="Bed" value="{{old('bed')}}" required>
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
                        <input type="number" class="input-text" id="bathroom" name="bathroom" placeholder="BathRooms" value="{{old('bathroom')}}" required>
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
                        <input type="number" class="input-text" id="kitchen" name="kitchen" placeholder="Kitchen" value="{{old('kitchen')}}" required>
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
                    <input type="text" class="input-text" id="address" name="address"  placeholder="Address" value="{{old('address')}}" required>
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
                            <option value="{{$s->id}}">{{$s->state_name}}</option>
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
                    <input type="text" class="input-text" id="postal_code" name="postal_code" value="{{old('postal_code')}}"  placeholder="Postal Code">
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
            <fieldset class="form-group">
                <a href="javascript:void(0)" onclick="$('#image').click()"><button class="btn btn-outline pricing-btn button-theme">Upload Image</button> <strong class="required">*</strong></a>
                <input type="file" id="image" name="image[]" style="display: none;" class="form-control" multiple="" required>
                <p class="error help-block" id="image">
                  @if($errors->has('image'))
                    <i class="error"></i> {{ $errors->first('image') }}
                  @endif
                </p>
            </fieldset>
            <div class="preview-images-zone">
                <div class="row col-sm-12" id="image_append">
                    <!-- append preview images -->
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Detailed Information <strong class="required">*</strong></h4>
        <div class="row pad-20">
            <div class="col-lg-12">
                <textarea class="input-text" id="description" name="description" placeholder="Detailed Information" required="" value="{{old('description')}}"></textarea>
                <p class="error help-block" id="description">
                  @if($errors->has('description'))
                    <i class="error"></i> {{ $errors->first('description') }}
                  @endif
                </p>
            </div>
        </div>
        <h4 class="bg-grea-3">Features (optional)</h4>
        <div class="row pad-20">
            @foreach($features as $key=>$fe)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="features_{{$key}}" type="checkbox" name="features[]" value="{{$fe->id}}">
                    <label for="features_{{$key}}">
                        {{$fe->feature}}
                    </label>
                </div>
            </div>
            @endforeach
        </div>
        <h4 class="bg-grea-3">Contact Details</h4>
        <div class="row pad-20">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="input-text" id="name" name="name" placeholder="Name" required="" value="{{old('name')}}">
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
                    <input type="email" class="input-text" id="email" name="email" placeholder="Email" required="" value="{{old('email')}}">
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
                    <input type="text" class="input-text" id="phone" name="phone"  placeholder="Phone" required="" value="{{old('phone')}}">
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
    // sub-active
    $('#sub-active').addClass('active');
$(document).ready(function() {

   /*******************************************************************/
    var num=1;
    function readImage() {
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