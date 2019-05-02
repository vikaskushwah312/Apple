@include('layouts.header_css')
@section('css')
@endsection
<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo-->
                        <a href="index.html">
                            <img src="img/black-logo.png" class="cm-logo" alt="black-logo">
                        </a>
                        <!-- Name -->
                        <h3>Create an account for Owner </h3>
                        <!-- Form start-->
                        <form action="{{url('owner/post-signup')}}" method="post" enctype="multipart/form-data" name="signup" id="signup">
                            @csrf 
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="input-text" placeholder="First Name" value="{{old('first_name')}}">
                                <p class="error " id="first_name">
                                  @if($errors->has('first_name'))
                                    <i class="error help-block"></i> {{ $errors->first('first_name') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="input-text" placeholder="Last Name" value="{{old('last_name')}}">
                                <p class="error help-block" id="last_name">
                                  @if($errors->has('last_name'))
                                    <i class="error"></i> {{ $errors->first('last_name') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="input-text" placeholder="Email" value="{{old('email')}}">
                                <p class="error help-block" id="email">
                                  @if($errors->has('email'))
                                    <i class="error"></i> {{ $errors->first('email') }}
                                  @endif
                                </p>
                            </div>
                           
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="input-text" placeholder="Password" value="{{old('password')}}">
                                <p class="error help-block" id="password">
                                  @if($errors->has('password'))
                                    <i class="error"></i> {{ $errors->first('password') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_Password" id="confirm_Password" class="input-text" placeholder="Confirm Password" value="{{old('confirm_Password')}}">
                                <p class="error" style="margin-left: -67px" id="confirm_Password">
                                  @if($errors->has('confirm_Password'))
                                    <i class="error"></i> {{ $errors->first('confirm_Password') }}
                                  @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="contact_no" id="contact_no" class="input-text" placeholder="Contact Number" value="{{old('contact_no')}}">
                                <p class="error help-block" id="contact_no">
                                  @if($errors->has('contact_no'))
                                    <i class="error"></i> {{ $errors->first('contact_no') }}
                                  @endif
                                </p>
                            </div>
                            
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">Signup</button>
                            </div>
                        </form>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Already a member? <a href="{{url('owner/login')}}">Login here</a></span>
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
@section('js')


<script type="text/javascript">
    $(document).ready(function(){
        alert("hello");
    });
</script>
@endsection