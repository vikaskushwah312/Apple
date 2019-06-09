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
            <form class="form-horizontal" id="otpform" name="otpforms" action="{{ url('admin/otp') }}" method="POST" style="display: block;">
                {{ csrf_field() }}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <center>
                        <h3>Recover Password</h3>
                        </center>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="otp" name="otp" class="form-control" type="text" placeholder="otp">
                        <p class="error help-block" id="otp">
                            @if($errors->has('otp'))
                            <i class="error"></i> {{ $errors->first('otp') }}
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
                        <a href="{{ url('admin/login') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Back to login</a>
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
