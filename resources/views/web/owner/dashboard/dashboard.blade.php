@extends('web.owner.dashboard.master')
@section('webcontent')
<div class="dashboard-header clearfix">
    <div class="row">
        <div class="col-sm-12 col-md-6"><h4>Hello ,{{$info->first_name}}</h4></div>
    </div>
</div>
<!-- <div class="alert alert-success alert-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
</div> -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-success">
            <div class="left">
                <h4>{{$resolved_complains}}</h4>
                <p>Resolved Complains</p>
            </div>
            <div class="right">
                <i class="fa fa-map-marker"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-warning">
            <div class="left">
                <h4>{{$complain}}</h4>
                <p>Unresolved Complains</p>
            </div>
            <div class="right">
                <i class="fa fa-eye"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-active">
            <div class="left">
                <h4>{{$total_property}}</h4>
                <p>Totoal Listings</p>
            </div>
            <div class="right">
                <i class="fa fa-comments-o"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-dark">
            <div class="left">
                <h4>{{$vigits}}</h4>
                <p>Present Month Enquires</p>
            </div>
            <div class="right">
                <i class="fa fa-heart-o"></i>
            </div>
        </div>
    </div>
</div>
 @stop
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('#dashboard-active').addClass('active'); 
});
</script>
@endsection