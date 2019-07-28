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
                        <form action="{{url('forgot-password')}}" method="post" name="forgot_password" id="forgot_password">
                        @csrf
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="input-text" placeholder="Email Address" required>
                                <p class="error " id="email">
                                  @if($errors->has('email'))
                                    <i class="error help-block"></i> {{ $errors->first('email') }}
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