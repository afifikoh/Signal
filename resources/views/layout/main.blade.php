<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="/img/LOGO MMII.png" rel="icon">
  <title>SIGNAL-NU</title>
  <link href="{{ asset('/') }}asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" >
  <link href="{{ asset('/') }}asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
  <link href="{{ asset('/') }}asset/css/ruang-admin.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="{{ asset('/') }}asset/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap DatePicker -->  
  <link href="{{ asset('/') }}asset/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
  <!-- Bootstrap Touchspin -->
  <link href="{{ asset('/') }}asset/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" >
  <!-- ClockPicker -->
  <link href="{{ asset('/') }}asset/vendor/clock-picker/clockpicker.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body id="page-top">
  <div id="wrapper">

    {{-- sidebar --}}
    @include('layout.sidebar')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

    {{-- -header --}}
    @include('layout.header')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            {{-- judul --}}
            @yield('judul')
        </div>
    
    

        {{-- -isi --}}
        @yield('isi')
      </div>

</div>
<!---Container Fluid-->
{{-- </div> --}}

{{-- -footer --}}
@include('sweetalert::alert')
@include('layout.footer')
</div>
</div>

<!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <script src="{{ asset('/') }}asset/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('/') }}asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}asset/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{ asset('/') }}asset/js/ruang-admin.min.js"></script>
  <script src="{{ asset('/') }}asset/vendor/chart.js/Chart.min.js"></script>
  <script src="{{ asset('/') }}asset/js/demo/chart-area-demo.js"></script>
  <!-- Page level plugins -->  
  <script src="{{ asset('/') }}asset/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Select2 -->
  <script src="{{ asset('/') }}asset/vendor/select2/dist/js/select2.min.js"></script>
  <!-- Bootstrap Datepicker -->
  <script src="{{ asset('/') }}asset/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap Touchspin -->
  <script src="{{ asset('/') }}asset/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <!-- ClockPicker -->
  <script src="{{ asset('/') }}asset/vendor/clock-picker/clockpicker.js"></script>
  
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
  
  @stack('footer-script')
  <script>
     $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
      $('#dataTableHover2').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script>
    $(document).ready(function () {
      $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
      });      

      // Select2 Multiple
      $('.select2-multiple').select2();

      // Bootstrap Date Picker
      $('#simple-date1 .input-group.date').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,        
      });

      $('#simple-date2 .input-group.date').datepicker({
        startView: 1,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date3 .input-group.date').datepicker({
        startView: 2,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date4 .input-daterange').datepicker({        
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });    

      // TouchSpin

      $('#touchSpin1').TouchSpin({
        min: 0,
        max: 100,                
        boostat: 5,
        maxboostedstep: 10,        
        initval: 0
      });

      $('#touchSpin2').TouchSpin({
        min:0,
        max: 100,
        decimals: 2,
        step: 0.1,
        postfix: '%',
        initval: 0,
        boostat: 5,
        maxboostedstep: 10
      });

      $('#touchSpin3').TouchSpin({
        min: 0,
        max: 100,
        initval: 0,
        boostat: 5,
        maxboostedstep: 10,
        verticalbuttons: true,
      });

      $('#clockPicker1').clockpicker({
        donetext: 'Done'
      });

      $('#clockPicker2').clockpicker({
        autoclose: true
      });

      let input = $('#clockPicker3').clockpicker({
        autoclose: true,
        'default': 'now',
        placement: 'top',
        align: 'left',
      });

      $('#check-minutes').click(function(e){        
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
      });

    });
  </script>

</body>
</html>


    