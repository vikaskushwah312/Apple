@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6"><h4>My Profile</h4></div>
                </div>
            </div>
            <div class="dashboard-list">
                <h3 class="heading">Profile Details</h3>
                <div class="dashboard-message contact-2 bdr clearfix">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <!-- Edit profile photo -->
                            <div class="edit-profile-photo">
                                <img src="http://placehold.it/198x165" alt="profile-photo" class="img-fluid">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i></span>
                                        <input type="file" class="upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group name">
                                            <label>Your Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="John Deo">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group email">
                                            <label>Your Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Your Title">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group subject">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group number">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group message">
                                            <label>Personal info</label>
                                            <textarea class="form-control" name="message" placeholder="Personal info"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-list">
                        <h3 class="heading">Change Password</h3>
                        <div class="dashboard-message contact-2">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group name">
                                            <label>Current Password</label>
                                            <input type="password" name="current-password" class="form-control" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group email">
                                            <label>New Password</label>
                                            <input type="password" name="new-password" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group subject">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="confirm-new-password" class="form-control" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn">
                                            <button type="submit" class="btn btn-md button-theme">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="sub-banner-2 text-center">© 2018 Theme Vessel. Trademarks and brands are the property of their respective owners.</p>
    </div>
</div>
@stop