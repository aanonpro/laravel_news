<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- link import from admin panel --}}
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    {{-- summernote css link --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- datatable css link --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0px !important;
            margin: 0px !important;
        }
        div.dataTables_wrapper div.dataTables_length select {
            width: 50% !important;
        }
    </style>

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.inc.admin-navbar')
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            @include('layouts.inc.admin-sidebar')

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
            {{-- end begin page content --}}
            </div>
            @include('layouts.inc.admin-footer')
         </div>
         {{-- end content wrapper --}}
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    {{-- script add from admin panel --}}
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      <!-- Core plugin JavaScript-->
      <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

      <!-- Custom scripts for all pages-->
      <script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>

      {{-- datatable js link --}}
      <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready( function () {
            $('#myDataTable').DataTable();
        } );
      </script>


	
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#mySummernote' ) )
        .catch( error => {
        console.error( error );
        } );
    </script> --}}

      {{-- summernote js link --}}
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
      <script>
        $(document).ready(function() {
            $("#mySummernote").summernote({
                height: 250,
            });
            $('#mySummernote').summernote({
        fontNames: [
        'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
        'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
        'Tahoma', 'Times New Roman', 'Verdana', 'Microsoft YaHei',
        'Roboto'
      ],
});
            // $("img").addClass("img-responsive");
            $('.dropdown-toggle').dropdown();
        });
        </script>


    @yield('scripts')

</body>
</html>
