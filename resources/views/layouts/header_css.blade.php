<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>{{Config::get('constants.SITE_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{url('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/bootstrap-submenu.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('public/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('public/css/leaflet.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('public/css/map.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/fonts/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{url('public/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{url('public/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{url('public/css/slick.css')}}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{url('public/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{url('public/css/skins/default.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon" >
    

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{url('public/css/ie10-viewport-bug-workaround.css')}}">

    <script src="{{ asset('public/js/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('public/admin/jquery.validate.min.js') }}"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="{{url('public/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->
    <script  src="{{url('public/js/ie-emulation-modes-warning.js')}}"></script>
    <script src="{{url('public/sweetalert/sweetalert.min.js')}}"></script>



    <!-- HTML5 shim and Respond.js')}} for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="{{url('public/js/html5shiv.min.js')}}"></script>
    <script  src="{{url('public/js/respond.min.js')}}"></script>
    <![endif]-->

    <script type="text/javascript">
    var SITEURL = '{{URL::to('')}}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>   
   @yield('css')
</head>

<body>
     @if(Session::has('success'))
      <script type="text/javascript">
        swal({
            title: 'Success!',
            text: "{{Session::get('success')}}",
            timer: 4000,
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
        timer: 4000
    }).then((value) => {
        //location.reload();
    }).catch(swal.noop);
  </script>
  @endif

<!-- <div class="page_loader" style="display: none"></div> -->
@yield('content')