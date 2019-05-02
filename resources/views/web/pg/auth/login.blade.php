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
                            <span style="color:red;">Logo Image</span>
                            <!-- <img src="img/black-logo.png" class="cm-logo" alt="black-logo"> -->
                        </a>
                        <!-- Name -->
                         <h3>Login as Paying Guest</h3>
                        <!-- Form start -->
                        <form action="{{url('pg/post-login')}}" method="post" enctype="multipart/form-data" name="login" id="login">
                            @csrf 
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="input-text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="input-text" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <a href="{{url('pg/forgot-password')}}" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">login</button>
                            </div>
                        </form>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Don't have an account? <a href="{{url('pg/signup')}}">Register here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

@include('layouts.footer_js')