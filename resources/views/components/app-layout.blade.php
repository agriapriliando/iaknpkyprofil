<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-seo-render></x-seo-render>

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('asset/img/logo_iaknpky_footer.png') }}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">

    {{-- jquery --}}
    <script src="{{ asset('asset/js/jquery-3.5.1.min.js') }}"></script>
</head>
@yield('carousel_style')
<body class="vh-100">
  <!-- Preloader -->
  {{-- <div class="preloader">
      <div class="preloader-inner">
          <div class="preloader-icon">
              <span></span>
              <span></span>
          </div>
      </div>
  </div> --}}
  <!-- /End Preloader -->
  {{ $slot }}

  <!-- ========================= scroll-top ========================= -->
  {{-- <a href="#" class="scroll-top btn btn-primary">
      <i class="fas fa-arrow-up"></i>
  </a> --}}

  <!-- ========================= JS here ========================= -->
  <script src="{{asset('asset/js/navbarhover.js')}}"></script>
  <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('asset/js/preloaderbacktop.js')}}"></script>
  <script src="{{asset('asset/js/jsawesome/all.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}
  <script>
  let slider = tns({
    container: '.my-slider',
    slideBy: 'page',
    responsive: {
      320: {
        items: 4
      },
      1000: {
        items: 5
      },
      1400: {
        items: 7
      }
    },
    speed: 400,
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