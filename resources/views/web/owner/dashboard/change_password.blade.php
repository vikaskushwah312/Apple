@extends('web.owner.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <div class="dashboard-message contact-2">
        <form action="{{ url('owner/change-password') }}" id="change_password" name="change_password" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group email">
                        <label>New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" >
                        <p class="error help-block" id="new_password">
                          @if($errors->has('new_password'))
                            <i class="error"></i> {{ $errors->first('new_password') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group subject">
                        <label>Confirm New Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm New Password">
                        <p class="error help-block" id="confirm_password">
                          @if($errors->has('confirm_password'))
                            <i class="error"></i> {{ $errors->first('confirm_password') }}
                          @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="send-btn">
                        <button type="submit" class="btn btn-md button-theme pull-right">Change Password</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

    
@stop