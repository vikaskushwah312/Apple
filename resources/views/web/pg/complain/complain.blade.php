@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <div class="dashboard-message contact-2">
        <form action="{{ url('pg/complain').'/'.$property_id }}" id="complain_form" name="complain_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Subject <strong class="required">*</strong></label>
                    </div>
                    <input type="text" name="subject" id="subject" placeholder="Subject" style="width: 98%" height="37px;">
                    <p class="error help-block" id="subject">
                      @if($errors->has('subject'))
                        <i class="error"></i> {{ $errors->first('subject') }}
                      @endif
                    </p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Write Complain <strong class="required">*</strong></label>
                    </div>
                    <textarea class="" id="complain" name="complain" placeholder="Complain" style="height: 240px;width: 1000px;margin-top: 0px;margin-bottom: 0px;"></textarea>
                    <p class="error help-block" id="complain">
                      @if($errors->has('complain'))
                        <i class="error"></i> {{ $errors->first('complain') }}
                      @endif
                    </p>
                </div>

                <input type="hidden" name="property_id" id="property_id" value="{{$property_id}}">
                <div class="col-lg-12">
                    <div class="send-btn">
                        <button type="submit" class="btn btn-md button-theme pull-right">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop