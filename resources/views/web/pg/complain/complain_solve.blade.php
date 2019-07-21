@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <div class="dashboard-message contact-2">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Subject <strong class="required"></strong></label>
                </div>
                 <p class="" id="subject" name="subject" >{{$complain->subject}}</p>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Complain<strong class="required"></strong></label>
                </div>
                <p class="" id="complain" name="complain" >{{$complain->complain}}</p>
            </div>

            <div class="col-sm-12 ">
                <div class="form-group pull-right">
                    <label class="">Reply Complain <strong class="required"></strong></label>
                    <p class="" id="reply" name="reply" >{{$complain->reply}}</p>
                </div>
            </div>

            <input type="hidden" name="property_id" id="property_id" value="{{$complain->property_id}}">
            <div class="col-lg-12">
                <!-- <div class="send-btn">
                    <button type="submit" class="btn btn-md button-theme pull-right">Submit</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
@stop