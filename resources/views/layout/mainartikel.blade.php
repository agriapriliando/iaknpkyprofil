<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
<meta http-equiv="x-ua-compatible" content="ie=edge" />
@yield('meta_data')
<meta property="og:image:width" content="250" />
<meta property="og:image:height" content="250" />
<link rel="shortcut icon" type="image/x-icon" href="{{url('asset/img/logo_iaknpky-min.png')}}" />
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

<!-- start toolbar -->
<div class="container">
    <div class="row align-items-center">
        @yield('toolbar')
    </div>
</div>
<!-- end toolbar -->

<!-- start navbar -->
<nav class="navbar-area navbar navbar-expand-lg navbar-light mt-1" style="background-color: #f8f8f8;">
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

<!-- berita -->
@yield('artikel')
<!-- end berita -->

<!-- start share section -->
<div class="container my-0 py-0">
    <div class="row my-0 py-0">
        <div class="col-lg-4 col-md-4 text-lg-start text-md-start text-center">
            <p>Developed by<a href="iaknpky.ac.id" target="_blank"> IAKNPKY</a></p>
        </div>
        <div class="col-lg-4 col-md-4 col-12 text-center">
            <p class="p-0 m-0">Bagikan halaman ini | dilihat 1202 kali</p>
            <a class="px-1" href=""><span style="color: blue;" class="bagi"><i class="fab fa-facebook-square"></i></span></a>
            <a class="px-1" href=""><span style="color: green;" class="bagi"><i class="fab fa-whatsapp-square"></i></span></a>
            <a class="px-1" href=""><span style="color: #00acee;" class="bagi"><i class="fab fa-twitter-square"></i></span></a>
            <a class="px-1" href=""><span style="font-size: 38px; color: greenyellow;"><i class="fas fa-print"></i></span></a>
        </div>
        <div class="col-lg-4 col-md-4 text-lg-end text-md-end text-center">
            <a href=""></a><p>www.iaknpky.ac.id</p>
        </div>
    </div>
</div>
<!-- end share section -->

<!-- start footer -->
<div class="container-fluid my-3 bg-secondary" style="color: black">
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                    @yield('footsatu') 
                    @yield('footsosial')
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                @yield('footdua')
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                @yield('foottiga')
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

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