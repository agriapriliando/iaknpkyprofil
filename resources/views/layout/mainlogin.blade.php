<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>App - @yield('title')</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
<!-- Place favicon.ico in the root directory -->

<!-- ========================= CSS here ========================= -->
<link rel="stylesheet" href="{{asset('css/base.css')}}" />
<link rel="stylesheet" href="{{asset('asset/css/main.css')}}" />

</head>

<body class="vh-100" style="background-image: linear-gradient(0deg, #eeb4b3ff, #c179b9ff, #a42cd6ff);">
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

@yield('login')

<!-- ========================= JS here ========================= -->
<script src="{{asset('asset/js/navbarhover.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/preloaderbacktop.js')}}"></script>
<script src="{{asset('asset/js/jsawesome/all.min.js')}}"></script>
    
</body>

</html>