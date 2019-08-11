@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <div class="dashboard-message contact-2">
        <form action="{{ url('pg/notice')}}" id="notice_form" name="notice_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Subject <strong class="required">*</strong></label>
                    </div>
                    <input type="text" name="subject" id="subject" placeholder="Subject" style="width: 98%" height="37px;" value="{{$notice?$notice->subject:''}}">
                    <p class="error help-block" id="subject">
                      @if($errors->has('subject'))
                        <i class="error"></i> {{ $errors->first('subject') }}
                      @endif
                    </p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Write Notice <strong class="required">*</strong></label>
                    </div>
                    <textarea class="" id="notice" name="notice" placeholder="notice" style="height: 240px;width: 1000px;margin-top: 0px;margin-bottom: 0px;">{{$notice?$notice->notice:''}}</textarea>
                    <p class="error help-block">
                      @if($errors->has('notice'))
                        <i class="error"></i> {{ $errors->first('notice') }}
                      @endif
                    </p>
                </div>
                @if(!empty($notice))
                <input type="hidden" name="property_id" id="property_id" value="{{$notice?$notice->property_id:''}}">
                @else
                <input type="hidden" name="property_id" id="property_id" value="{{$property->property_id}}">
                @endif
                <div class="col-lg-12">
                    <div class="send-btn">
                        <button type="submit" class="btn btn-md button-theme pull-right">Submit</button>
                    </div>
                    @if(!empty($notice))
                    <div class="">
                        <a href="{{url('pg/notice-cancel').'/'.$notice->id}}">
                        <button type="button" class="btn btn-md button-theme">Cancel</button></a>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@stop