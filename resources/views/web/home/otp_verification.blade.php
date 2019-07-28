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
                        <a href="{{url('')}}">
                            {!! logoImage()!!}
                        </a>
                        <!-- Name -->
                         <h3>Otp Verification</h3>
                        <!-- Form start -->
                        <form action="{{url('otp-verification').'/'.$user_info->id}}" method="post" enctype="multipart/form-data" name="otp_verification" id="otp_verification">
                            @csrf 
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="input-text" placeholder="Email" value="{{$user_info->email}}" disabled>
                                <p class="error help-block" id="email">
                                  @if($errors->has('email'))
                                    <i class="error"></i> {{ $errors->first('email') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="otp" id="otp" class="input-text" placeholder="Otp">
                                <p class="error help-block" id="otp">
                                  @if($errors->has('otp'))
                                    <i class="error"></i> {{ $errors->first('otp') }}
                                  @endif
                                </p>
                            </div>
                            <!-- <div class="checkbox">
                                <a href="{{url('owner/forgot-password')}}" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div> -->
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">login</button>
                            </div>
                        </form>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Don't have an account?Register here <a href="{{url('owner/signup')}}">As Owner</a>/<a href="{{url('pg/signup')}}">As PG</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

@include('layouts.footer_js')