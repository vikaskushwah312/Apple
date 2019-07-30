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
<div class="submit-address dashboard-list">
    <h4 class="bg-grea-3">Basic Information</h4>
   <form method="post" action="{{url('submit-vigit')}}" id="submit_property" name="submit_property" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="search-contents-sidebar">
                <div class="row pad-20">
                    <div class="col-lg-6 col-md-6 col-sm-6">
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
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
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
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
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
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
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
                      <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <button type="submit" class="btn btn-default pull-right button-theme" >Submit</button>
                      </div>
                    </div>
                </div>
            </div>
        </form>
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