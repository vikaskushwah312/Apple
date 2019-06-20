@extends('web.owner.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <h3 class="heading">Profile Details</h3>
    <div class="dashboard-message contact-2 bdr clearfix">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form action="{{url('owner/my-profile')}}" method="POST" id="my_profile" name="my_profile" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="name">
                                <label>First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{$info->first_name}}">
                                <p class="error help-block" id="first_name">
                                  @if($errors->has('first_name'))
                                    <i class="error"></i> {{ $errors->first('first_name') }}
                                  @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="name">
                                <label>Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{$info->last_name}}">
                                <p class="error help-block" id="last_name">
                                  @if($errors->has('last_name'))
                                    <i class="error"></i> {{ $errors->first('last_name') }}
                                  @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="subject">
                                <label>Phone</label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Phone" value="{{$info->contact_no}}">
                                <p class="error help-block" id="contact_no">
                                  @if($errors->has('contact_no'))
                                    <i class="error"></i> {{ $errors->first('contact_no') }}
                                  @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="number">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{$info->email}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label>Profile Image</label>
                            <div class="">
                                    @if($info->image != "")
                                    <img src="{{url('public/uploads/profile_image/'.$info->image)}}" alt="profile-photo" class="img-fluid" id="preview" name="preview">
                                    @else
                                    <img src="{{url('public/uploads/no_image.jpg')}}" alt="profile-photo" class="img-fluid" id="preview" name="preview">
                                    @endif
                                <input type="file" class="upload" id="image" name="image" style="margin-top: 10px;">
                                <!-- <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i></span>
                                        <input type="file" class="upload" id="image" name="image">
                                    </div>
                                </div> -->
                                <p class="error help-block" id="image">
                                  @if($errors->has('image'))
                                    <i class="error"></i> {{ $errors->first('image') }}
                                  @endif
                                </p>

                            </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="send-btn">
                            <button type="submit" class="btn btn-md button-theme pull-right">Update Profile</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
    });
});
</script>
@stop