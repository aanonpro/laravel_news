<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title','world news')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Nisai news">
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{asset('frontend/assets/vendors/mdi/css/materialdesignicons.min.css')}}"
    />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/aos/dist/aos.css/aos.css')}}" />

    <!-- End plugin css for this page -->
    @php
    $setting = App\Models\Setting::find(1);
  @endphp
  @if ($setting)
    <link rel="shortcut icon" href="{{asset('uploads/settings/'.$setting->favicon)}}" type="image/x-icon"/>
    @endif
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <!-- endinject -->

  </head>

<body>

    @include('frontend.inc.frontend-header')

    @yield('content')

    @include('frontend.inc.frontend-footer')
   <!-- partial -->
</div>
</div>
<!-- inject:js -->
<script src="{{ asset('frontend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('frontend/assets/vendors/aos/dist/aos.js/aos.js')}}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{asset('frontend/assets/js/demo.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.easeScroll.js')}}"></script>
<!-- End custom js for this page-->
</body>
</html>
