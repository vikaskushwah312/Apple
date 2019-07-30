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
   <form method="post" action="{{url('owner/submit-property')}}" id="submit_property" name="submit_property" enctype="multipart/form-data" >
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