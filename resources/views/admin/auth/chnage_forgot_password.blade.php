<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ Config::get('constants.SITE_NAME') }}</title>

  <link rel="stylesheet" href="{{url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  
  <link rel="stylesheet" href="{{url('public/admin/dist/css/AdminLTE.min.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
<script src="{{url('public/sweetalert/sweetalert.min.js')}}"></script>
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
            <p class="login-box-msg">Change Password !!</p>
            <form action="{{ url('admin/forgot-password') }}" id="change_password" name="change_password" method="POST">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <p class="error help-block" style="color: red;" id="error">
                        @if ($errors->has('new_password'))
                        <i class="fa fa-times-circle-o"></i> {{ $errors->first('new_password') }}
                        @endif
                    </p>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <p class="error help-block" style="color: red;" id="error">
                        @if ($errors->has('confirm_password'))
                        <i class="fa fa-times-circle-o"></i> {{ $errors->first('confirm_password') }}
                        @endif
                    </p>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@if(Session::has('success'))
      <script type="text/javascript">
        swal({
            title: 'Success!',
            text: "{{Session::get('success')}}",
            timer: 3000,
            type: 'success'
        }).then((value) => {
            //location.reload();
        }).catch(swal.noop);
      </script>
  @endif

  @if(Session::has('fail'))
  <script type="text/javascript">
    swal({
        title: 'Oops!',
        text: "{{Session::get('fail')}}",
        type: 'error',
        timer: 3000
    }).then((value) => {
        //location.reload();
    }).catch(swal.noop);
  </script>
  @endif
</body>
</html>