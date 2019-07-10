@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <div class="dashboard-message contact-2">
        <form action="{{ url('pg/complain').'/'.$property_id }}" id="complain_form" name="complain_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="">
                    <div class="form-group">
                        <label>Write Complain <strong class="required">*</strong></label>
                    </div>
                    <textarea class="" id="complain" name="complain" placeholder="Complain" required="" value="" width="500px;" height=200px;></textarea>
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