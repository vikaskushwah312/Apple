@extends('web.pg.dashboard.master')
@section('css')
<style type="text/css">
.required{
    color: red;
    font-size: 20px;
}
</style>
@endsection
@section('webcontent')
<div class="dashboard-list">
    <div class="dashboard-message contact-2 bdr clearfix">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form action="{{url('pg/complain')}}" method="POST" id="my_profile" name="my_profile" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="name">
                                <label>First Name <strong class="required">*</strong></label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{$info->first_name}} {{$info->last_name}}" readonly="">
                                <p class="error help-block" id="first_name">
                                  @if($errors->has('first_name'))
                                    <i class="error"></i> {{ $errors->first('first_name') }}
                                  @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="subject">
                                <label>Phone <strong class="required">*</strong></label>
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
                                <label>Email <strong class="required">*</strong></label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{$info->email}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="subject">
                                <label>Subject <strong class="required">*</strong></label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" value="">
                                <p class="error help-block" id="subject">
                                  @if($errors->has('subject'))
                                    <i class="error"></i> {{ $errors->first('subject') }}
                                  @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="subject">
                                <label>Subject <strong class="required">*</strong></label>
                                <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                <p class="error help-block" id="message">
                                  @if($errors->has('message'))
                                    <i class="error"></i> {{ $errors->first('message') }}
                                  @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="send-btn">
                            <button type="submit" class="btn btn-md button-theme pull-right">Submit</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop