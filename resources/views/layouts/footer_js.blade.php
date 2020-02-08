<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

<!-- daterangepicker -->
<script  src="{{url('public/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('public/admin/bower_components/bootstrap/js/transition.js')}}"></script>
<script src="{{url('public/admin/bower_components/bootstrap/js/collapse.js')}}"></script>
<script src="{{url('public/js/bootstrap.min.js')}}"></script>
<!-- <script src="{{url('public/js/bootstrap-datetimepicker.min.js')}}"></script> -->
<!-- datepicker -->
<!-- <script src="{{url('public/admin/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script> -->
<!-- <script src="{{url('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script> -->

<script src="{{url('public/js/popper.min.js')}}"></script>
<script  src="{{url('public/js/bootstrap-submenu.js')}}"></script>
<script  src="{{url('public/js/rangeslider.js')}}"></script>
<script  src="{{url('public/js/jquery.mb.YTPlayer.js')}}"></script>
<script  src="{{url('public/js/bootstrap-select.min.js')}}"></script>
<script  src="{{url('public/js/jquery.easing.1.3.js')}}"></script>
<script  src="{{url('public/js/jquery.scrollUp.js')}}"></script>
<script  src="{{url('public/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script  src="{{url('public/js/leaflet.js')}}"></script>
<script  src="{{url('public/js/leaflet-providers.js')}}"></script>
<script  src="{{url('public/js/leaflet.markercluster.js')}}"></script>
<script  src="{{url('public/js/dropzone.js')}}"></script>
<script  src="{{url('public/js/slick.min.js')}}"></script>
<script  src="{{url('public/js/jquery.filterizr.js')}}"></script>
<script  src="{{url('public/js/jquery.magnific-popup.min.js')}}"></script>
<script  src="{{url('public/js/jquery.countdown.js')}}"></script>
<script  src="{{url('public/js/maps.js')}}"></script>
<script  src="{{url('public/js/app.js')}}"></script>


<!-- <script src="{{url('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script> -->
<!-- <script src="{{url('public/admin/bower_components/bootstrap/js/collapse.js')}}"></script> -->
<!-- <script src="{{url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> -->
<!-- <script src="{{url('public/admin/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script> -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="{{url('public/js/ie10-viewport-bug-workaround.js')}}"></script>
<!-- Custom javascript -->
<script  src="{{url('public/js/ie10-viewport-bug-workaround.js')}}"></script>

<script  src="{{url('public/js/customjs.js')}}"></script>
<script type="text/javascript">
 $('.dashoard-list li.active').removeClass('active');
 
 $(".navbar-toggler").click(function(){  
    // alert('Hello');
    $("body").toggleClass("open-db-header");  
}); 
</script>
@yield('js')
</body>
</html>
