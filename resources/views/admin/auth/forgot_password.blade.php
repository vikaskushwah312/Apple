<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> {{ Config::get('constants.SITE_NAME') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('public/admin/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/admin/dist/css/AdminLTE.min.css') }}">
        <!-- iCheck -->
        <!--  <link rel="stylesheet" href="{{ asset('public/theme/plugins/iCheck/square/blue.css') }}"> -->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style type="text/css">
            .error{color: red;}
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="javascript:void(0)"><b>{{ Config::get('constants.SITE_FIRST_NAME') }}</b>{{ Config::get('constants.SITE_LAST_NAME') }}</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">

                <!-- <p class="login-box-msg">Forgot Password</p> -->

                <form class="form-horizontal" id="forgotpasswordform" name="forgotpasswordforms" action="{{ url('admin/post-forgot') }}" method="POST" style="display: block;">
                    {{ csrf_field() }}
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" name="email" class="form-control" type="text" placeholder="Email">
                            <p class="error help-block" id="email">
                                @if($errors->has('email'))
                                <i class="error"></i> {{ $errors->first('email') }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                        </div>
                    </div>
                     <div class="form-group">
                            <div class="col-md-12">
                                 <a href="{{ url('admin/login') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Back to login</a> </div>
                        </div>
                </form>



            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="{{ asset('public/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('public/admin/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('public/admin/custom-validation.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    </body>
</html>
