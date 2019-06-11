<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
 <meta name="viewport" content="width=device-width"/>
  <title>HMMinistry</title>
    <!-- Favicon-->
  <link rel="icon" href="{{asset('public/assets/img/logo.png')}}" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="{{ asset('public/css/formwizard.css') }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
 <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('public/admin/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('public/admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/select2/dist/css/select2.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('public/admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{  asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Calendar -->
  <link rel="stylesheet" href="{{  asset('public/admin/bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{  asset('public/admin/bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/admin/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/css/master.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/fontawesome-iconpicker.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/assets/css/_all-skins.min.css')}}">
  <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('public/css/bootstrap-dynamic-tabs.css') }}">

  <link rel="stylesheet" href="{{ asset('public/css/imagea.css') }}">
  <style type="text/css">
  @media (max-width: @screen-sm) {
    .btn-group-responsive {
      margin-bottom: -10px;
      .btn {
        .btn-block(); // Reuse btn-block code
        margin-bottom: 10px;
      }
      .pull-left, .pull-right {
        float: none !important;
      }
    }
  }
  .list-active {
    border: none;
    outline: none;
    padding: 10px 16px;
    background-color: #7777774f;
    cursor: pointer;
  }
  div.dataTables_wrapper {
    width: 0 auto;
    margin: 0 auto;
  }
  .dataTables_filter, .dataTables_info { display: none; }
  .filters input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
  }
  div.dt-buttons{
    position:relative;
    float:right;
  }
  .tabs-left, .tabs-right {
    border-bottom: nerone;
    padding-top: 2px;
  }
  .tabs-left {
    border-right: 1px solid #ddd;
  }
  .tabs-right {
    border-left: 1px solid #ddd;
  }
  .tabs-left>li, .tabs-right>li {
    float: none;
    margin-bottom: 2px;
  }
  .tabs-left>li {
    margin-right: -1px;
  }
  .tabs-right>li {
    margin-left: -1px;
  }
  .tabs-left>li.active>a,
  .tabs-left>li.active>a:hover,
  .tabs-left>li.active>a:focus {
    border-bottom-color: #ddd;
    border-right-color: transparent;
  }

  .tabs-right>li.active>a,
  .tabs-right>li.active>a:hover,
  .tabs-right>li.active>a:focus {
    border-bottom: 1px solid #ddd;
    border-left-color: transparent;
  }
  .tabs-left>li>a {
    border-radius: 4px 0 0 4px;
    margin-right: 0;
    display:block;
  }
  .tabs-right>li>a {
    border-radius: 0 4px 4px 0;
    margin-right: 0;
  }
  .vertical-text {
    margin-top:50px;
    border: none;
    position: relative;
  }
  .vertical-text>li {
    height: 20px;
    width: 120px;
    margin-bottom: 100px;
  }
  .vertical-text>li>a {
    border-bottom: 1px solid #ddd;
    border-right-color: transparent;
    text-align: center;
    border-radius: 4px 4px 0px 0px;
  }
  .vertical-text>li.active>a,
  .vertical-text>li.active>a:hover,
  .vertical-text>li.active>a:focus {
    border-bottom-color: transparent;
    border-right-color: #ddd;
    border-left-color: #ddd;
  }
  .vertical-text.tabs-left {
    left: -50px;
  }
  .vertical-text.tabs-right {
    right: -50px;
  }
  .vertical-text.tabs-right>li {
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    transform: rotate(90deg);
  }
  .vertical-text.tabs-left>li {
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
  }
  body.dragging, body.dragging * {
    cursor: move !important;
  }
  
  .dragged {
    position: absolute;
    opacity: 0.5;
    z-index: 2000;
  }

  ol.example li.placeholder {
    position: relative;
    /** More li styles **/
  }
  ol.example li.placeholder:before {
    position: absolute;
    /** Define arrowhead **/
  }
  </style>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('backend.header')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('backend.sidebar')
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->

  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('backend.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('public/admin/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('public/admin/bower_components/morris.js/morris.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('public/admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ asset('public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ asset('public/admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('public/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('public/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('public/admin/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('public/admin/plugins/iCheck/icheck.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/admin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('public/admin/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{ asset('public/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('public/admin/dist/js/pages/dashboard.js')}}"></script>
 --><!-- AdminLTE App -->
<script src="{{ asset('public/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('public/js/fontawesome-iconpicker.js')}}"></script>
<script src="{{asset('public/js/sweetalert.js')}}"></script>
<script src="{{asset('public/js/sortable.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-dynamic-tabs.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>







@include('jquery.datatables')
@include('jquery.advance')
@include('jquery.wilayah')
@include('jquery.institusi')
@include('jquery.image')
@include('jquery.event')


@stack('script')
@stack('scripts')
@stack('scriptt')
@stack('scriptz')
@stack('ajax')
<script type="text/javascript">
  $(":input").inputmask();
  $(function  () {
    $("ol.example").sortable();
  });
   $('.icp-auto').iconpicker();
   $('.icp').on('iconpickerSelected', function (e) {
      $('.lead .picker-target').get(0).className = 'picker-target fa-5x ' +
        e.iconpickerInstance.options.iconBaseClass + ' ' +
        e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
    });
  $("#mytabsb").bootstrapDynamicTabs();

  function FillBilling(f) {
     if (f.sama.checked == true) {
        f.wa.value = f.nohp.value;
     }else if(f.sama.checked == false) {
        $("#input").val("");
     }
  }
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreview').css('background-image', 'url('+e.target.result +')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
      readURL(this);
  });
  function readURLa(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreviewa').css('background-image', 'url('+e.target.result +')');
          $('#imagePreviewa').hide();
          $('#imagePreviewa').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload2").change(function() {
      readURLa(this);
  });
  function readURLb(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreviewb').css('background-image', 'url('+e.target.result +')');
          $('#imagePreviewb').hide();
          $('#imagePreviewb').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload3").change(function() {
      readURLb(this);
  });
  function readURLc(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreviewc').css('background-image', 'url('+e.target.result +')');
          $('#imagePreviewc').hide();
          $('#imagePreviewc').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload4").change(function() {
      readURLc(this);
  });
  function readURLd(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreviewd').css('background-image', 'url('+e.target.result +')');
          $('#imagePreviewd').hide();
          $('#imagePreviewd').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload5").change(function() {
      readURLd(this);
  });
  function readURLe(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreview6').css('background-image', 'url('+e.target.result +')');
          $('#imagePreview6').hide();
          $('#imagePreview6').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload6").change(function() {
      readURLe(this);
  });
  function readURLptot(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview_o').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview_o').hide();
            $('#imagePreview_o').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload_o").change(function() {
    readURLptot(this);
  });
  $(document).ready(function(){
    $("#belumNikah").change(function(){
      $(".belumNikah").prop('disabled', $(this).val() == 'Belum Menikah');
    });
    $("#alasan").change(function(){
      $(".alasan").prop('disabled', $(this).val() != 'Ijin');
    });

    $("#all_allow").click(function(){
        $(".check-allow").prop("checked", true);
    });
    $("#all_deny").click(function(){
        $(".check-deny").prop("checked", true);
    });
    
  });
  $(".datepickerlight").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
  });

</script>

</body>
</html>