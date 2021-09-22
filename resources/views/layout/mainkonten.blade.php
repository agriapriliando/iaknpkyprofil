<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
<meta http-equiv="x-ua-compatible" content="ie=edge" />
@yield('meta_data')
<meta property="og:image:width" content="250" />
<meta property="og:image:height" content="250" />
<link rel="shortcut icon" type="image/x-icon" href="{{url('asset/img/logo_iaknpky_footer.png')}}" />
<!-- Place favicon.ico in the root directory -->

<!-- ========================= CSS here ========================= -->
<link rel="stylesheet" href="{{asset('css/base.css')}}" />
<link rel="stylesheet" href="{{asset('asset/css/main.css')}}" />

{{-- jquery --}}
<script src="{{asset('asset/js/jquery-3.5.1.min.js')}}"></script>
</head>

<body class="vh-100">
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

<!-- start navbar -->
<nav class="navbar-area navbar navbar-expand-lg navbar-light dayak-bg">
    <div class="container">
        @yield('logo_beranda')
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- navbar section --}}
            @yield('navbar')
            {{-- end navbar section --}}
        <div class="row">
            <div class="col ms-auto">
                <form method="POST" action="{{url('search')}}" class="d-flex">
                    @method('POST')
                    @csrf
                    <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</nav>
<!-- end navbar -->
    
@yield('konten')
@yield('artikel')

<!-- start footer -->
<div class="container-fluid pt-3 dayak-bg" style="color: black">
    <div class="container p-5">
        @yield('footer_konten')
    </div>
</div>
<!-- end footer -->

<!-- footer share button -->
<div class="container-fluid angka-bg">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-12 mt-4 text-center">
            <p style="color: white; font-weight: bold; letter-spacing: 2px;">@2021 IAKN PALANGKA RAYA</p>
        </div>
        @yield('share')
    </div>
</div>
<!-- end footer share button -->

<!-- ========================= scroll-top ========================= -->
<a href="#" class="scroll-top btn btn-primary">
    <i class="fas fa-arrow-up"></i>
</a>

<!-- ========================= JS here ========================= -->
<script src="{{asset('asset/js/navbarhover.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/preloaderbacktop.js')}}"></script>
<script src="{{asset('asset/js/jsawesome/all.min.js')}}"></script>
    
</body>

</html>