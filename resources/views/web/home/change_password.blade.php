@include('layouts.header_css')


<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        <a href="index.html">
                            {!! logoImage()!!}
                        </a>
                        <!-- Name -->
                        <h3>Recover your password</h3>
                        <!-- Form start -->
                        <form action="{{url('change-password')}}" method="post" name="change_password" id="change_password">
                        @csrf
                            <div class="form-group">
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                                <p class="error help-block" id="new_password">
                                  @if($errors->has('new_password'))
                                    <i class="error"></i> {{ $errors->first('new_password') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm New Password" required="">
                                <p class="error help-block" id="confirm_password">
                                  @if($errors->has('confirm_password'))
                                    <i class="error"></i> {{ $errors->first('confirm_password') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">Submit</button>
                            </div>
                        </form>
                        <!-- Social List -->
                        <!-- <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul> -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Already a member? <a href="{{url('login')}}">Login here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Full Page Search -->
@include('layouts.footer_js');