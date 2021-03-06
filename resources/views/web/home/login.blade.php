@include('layouts.header_css')

@if(Session::has('message'))
<script type="text/javascript">
        swal({
            title: 'Success!',
            text: "{{Session::get('message')}}",
            timer: 3000,
            type: 'success',
             button: false,
        }).then((value) => {
            //location.reload();
        }).catch(swal.noop);
      </script>
@endif
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
                         <h3>Login</h3>
                        <!-- Form start -->
                        <form action="{{url('login')}}" method="post" enctype="multipart/form-data" name="login" id="login">
                            @csrf 
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="input-text" placeholder="Email">
                                <p class="error help-block" id="email">
                                  @if($errors->has('email'))
                                    <i class="error"></i> {{ $errors->first('email') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="input-text" placeholder="Password">
                                <p class="error help-block" id="password">
                                  @if($errors->has('password'))
                                    <i class="error"></i> {{ $errors->first('password') }}
                                  @endif
                                </p>
                            </div>
                            <div class="checkbox">
                                <a href="{{url('forgot-password')}}" class="link-not-important pull-right" ><strong style="color: red;"> Forgot Password</strong></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">login</button>
                            </div>
                        </form>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Don't have an account?Register here <a href="{{url('owner/signup')}}">As Owner</a>/<a href="{{url('pg/signup')}}">As User</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

@include('layouts.footer_js')