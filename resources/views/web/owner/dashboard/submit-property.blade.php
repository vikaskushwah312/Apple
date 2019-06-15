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
    </style>
@endsection
@section('webcontent')
<div class="submit-address dashboard-list">
    <h4 class="bg-grea-3">Basic Information</h4>
    <form method="post" action="{{url('owner/submit-property')}}" id="submit_property" name="submit_property" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="search-contents-sidebar">
            <div class="row pad-20">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Property Title</label>
                        <input type="text" class="input-text" name="your name" placeholder="Property Title">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="selectpicker search-fields" name="for-sale">
                            <option>For Sale</option>
                            <option>For Rent</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="input-text" name="your name" placeholder="USD">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Area/Location</label>
                        <input type="text" class="input-text" name="your name" placeholder="SqFt">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Rooms</label>
                        <select class="selectpicker search-fields" name="1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Bathroom</label>
                        <select class="selectpicker search-fields" name="1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Location</h4>
        <div class="row pad-20">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="input-text" name="address"  placeholder="Address">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>State</label>
                    <select class="selectpicker search-fields" name="choose-state">
                        <option>Choose State</option>
                        <option>Alabama</option>
                        <option>California</option>
                        <option>Florida</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Postal Code</label>
                    <input type="text" class="input-text" name="zip"  placeholder="Postal Code">
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Property Gallery</h4>
        <div class="container">
            <!-- <input type="file" id="image" name="image" style="" class="form-control" multiple> -->
            <fieldset class="form-group">
                <a href="javascript:void(0)" onclick="$('#image').click()">Upload Image</a>
                <input type="file" id="image" name="image[]" style="display: none;" class="form-control" multiple="">
            </fieldset>
            <div class="preview-images-zone">
                <div class="row col-sm-12" id="image_append">
                    <!-- append preview images -->
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Detailed Information</h4>
        <div class="row pad-20">
            <div class="col-lg-12">
                <textarea class="input-text" name="message" placeholder="Detailed Information"></textarea>
            </div>
        </div>
        <h4 class="bg-grea-3">Features (optional)</h4>
        <div class="row pad-20">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox1" type="checkbox">
                    <label for="checkbox1">
                        Free Parking
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox2" type="checkbox">
                    <label for="checkbox2">
                        Air Condition
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox4" type="checkbox">
                    <label for="checkbox4">
                        Swimming Pool
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox5" type="checkbox">
                    <label for="checkbox5">
                        Laundry Room
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox7" type="checkbox">
                    <label for="checkbox7">
                        Central Heating
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox8" type="checkbox">
                    <label for="checkbox8">
                        Alarm
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox3" type="checkbox">
                    <label for="checkbox3">
                        Places to seat
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox6" type="checkbox">
                    <label for="checkbox6">
                        Window Covering
                    </label>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Contact Details</h4>
        <div class="row pad-20">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="input-text" name="name" placeholder="Name">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="input-text" name="email" placeholder="Email">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Phone (optional)</label>
                    <input type="text" class="input-text" name="phone"  placeholder="Phone">
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
@endsection