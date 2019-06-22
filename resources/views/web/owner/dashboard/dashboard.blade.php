@extends('web.owner.dashboard.master')
@section('webcontent')
<div class="dashboard-header clearfix">
    <div class="row">
        <div class="col-sm-12 col-md-6"><h4>Hello ,{{$info->first_name}}</h4></div>
    </div>
</div>
<div class="alert alert-success alert-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-success">
            <div class="left">
                <h4>242</h4>
                <p>Active Listings</p>
            </div>
            <div class="right">
                <i class="fa fa-map-marker"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-warning">
            <div class="left">
                <h4>1242</h4>
                <p>Listing Views</p>
            </div>
            <div class="right">
                <i class="fa fa-eye"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-active">
            <div class="left">
                <h4>786</h4>
                <p>Reviews</p>
            </div>
            <div class="right">
                <i class="fa fa-comments-o"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="ui-item bg-dark">
            <div class="left">
                <h4>42</h4>
                <p>Bookmarked</p>
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