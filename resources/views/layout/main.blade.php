<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>

<!-- By Agri Apriliando - 085249441182 - TIPD IAKN PALANGKA RAYA -->

<meta http-equiv="x-ua-compatible" content="ie=edge" />
@yield('meta_data')
<meta property="og:image:width" content="250" />
<meta property="og:image:height" content="250" />
<link rel="shortcut icon" type="image/x-icon" href="{{url('asset/img/logo_iaknpky_footer.png')}}" />
<!-- Place favicon.ico in the root directory -->

<!-- ========================= CSS here ========================= -->
<link rel="stylesheet" href="{{asset('css/base.css')}}" />
<link rel="stylesheet" href="{{asset('asset/css/main.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">

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

<!-- start sectiondua -->
<div class="pb-2 sectiondua">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        @yield('slide')
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
<!-- end sectiondua -->

<!-- berita -->
<div class="dayak-bg">
<div class="container">
    <div class="row py-3">
        <div class="col justify-content-xs-center">
            <div class="p-3 text-center">
                <a href="{{url('artikel')}}">
                <h2 class="d-inline" style="color: #630640; font-weight: bold;">BERITA KAMPUS</h2>
                </a>
            </div>
        </div>
    </div>
    {{-- berita beranda --}}
    @yield('berita_beranda')
    <div class="row">
        <div class="d-grid gap-2 col-lg-4 col-md-4 col-6 mx-auto text-center my-3">
            <a href="{{url('artikel')}}" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
    </div>
</div>
</div>
<!-- end berita -->

<!-- start service -->
<div class="container-fluid angka-bg py-3">
    <div class="container">
        <div class="row pt-3 pb-2 mt-3 text-center bg-white" style="border: 1px white solid; border-radius: 2vh;">
            <h3 class="angka-font" style="color: #630640" class="fw-bold">IAKN PALANGKA RAYA DALAM ANGKA</h3>
        </div>
        <div class="mt-4">
            @yield('angka')
        </div>
    </div>
</div>
<!-- end service -->

<!-- start service -->
<div class="container-fluid dayak-bg py-4">
    <div class="container">
        <div class="row p-4 text-center" style="border: 0px white solid; border-radius: 2vh; background-color: rgba(102, 0, 102, 0.1); ">
            <h3 class="fw-bold" style="color: #630640; letter-spacing: 4px;">LAYANAN</h3>
        </div>
        @yield('layanan')
    </div>
</div>
<!-- end service -->

<!-- start service -->
<div class="container-fluid my-3 pb-4">
    <div class="container">
        <div class="row p-4 text-center">
            <h3 style="opacity: 1.0;">Kerja Sama</h3>
        </div>
        <div class="row justify-content-center">
            @yield('kerjasama')
            <div id="controls" class="col-lg-3 col-md-3 col-6 text-center mt-2 pt-2">
                <button class="previous btn btn-primary">Prev</button>
                <button class="next btn btn-primary">Next</button>
                <button class="auto" style="display: none;"></button>
            </div>
        </div>
    </div>
</div>
<!-- end service -->

<!-- start footer -->
<div class="container-fluid mt-3 dayak-bg" style="color: black">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
let slider = tns({
  container: '.my-slider',
  slideBy: 'page',
  responsive: {
    320: {
      items: 3
    },
    1000: {
      items: 4
    },
    1400: {
      items: 7
    }
  },
  controlsContainer: '#controls',
  prevButton: '.previous',
  nextButton: '.next',
  autoplayButton: '.auto',
  autoplay: true,
  autoplayText: ['Start', 'Stop'],
  nav: false,
});
</script>
    
</body>

<!-- By Agri Apriliando - 085249441182 - TIPD IAKN PALANGKA RAYA -->

</html>