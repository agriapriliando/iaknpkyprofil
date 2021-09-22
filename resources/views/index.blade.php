@extends('layout.main')

@section('meta_data')
{{ seo()->render() }}
@endsection

{{-- logo beranda --}}
@section('logo_beranda')
<a class="navbar-brand mx-0 px-0" href="#">
    <img style="width: 36vh;" src="{{url('asset/img/logo_iaknpky-min.png')}}" alt="">
</a>
@endsection

{{-- navbar --}}
@section('navbar')
<ul class="navbar-nav navbar-right ms-auto mb-2 mb-lg-0">
    @foreach ($menu as $c)
    @if ($c->menusub->isEmpty())
    <li class="nav-item">
    <a class="nav-link" href="{{url('')}}">{{$c->judul}}</a>
    </li>
    @else
    <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{$c->judul}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($c->menusub as $d)
            <li><a class="dropdown-item" href="{{url('info/'.$d->menusublink)}}">{{$d->judul}}</a></li>
            @endforeach
        </ul>
    </li>
    @endif
    @endforeach
</ul>
@endsection

@section('slide')
<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('uploads/slide/slide1.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('uploads/slide/slide2.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('uploads/slide/slide3.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('uploads/slide/slide4.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('uploads/slide/slide5.png')}}" class="d-block w-100" alt="...">
    </div>
</div>
@endsection

@section('berita_beranda')
<div class="row justify-content-center">
    @foreach ($artikel as $ar)
    <div class="col-lg-4 col-md-4 col-10 mb-2">
        <a href="{{$ar->slug}}">
        <div class="card">
            <img class="card-img-top" src="asset/img/berita/{{$ar->img}}" alt="...">
            <div class="card-body">
                <p class="card-text fw-bold">{{$ar->judul}}</p>
                <p class="card-text fst-italic">
                    <span><i class="fas fa-user-tie"></i> By {{$ar->user->name}} | </span>
                    <span><i class="fas fa-layer-group"></i> {{$ar->kategori->judul}} | </span><br>
                    <span><i class="far fa-calendar-alt"></i>  {{date('d F, Y', strtotime($ar->created_at))}} | </span>
                    <span><i class="far fa-clock"></i> {{date('H.i.s', strtotime($ar->created_at))}} Wib</span></p>
                <p class="card-text">{!!Str::words($ar->isi, 15)!!}</p>
            </div>
        </div>
        </a>
    </div>
    @endforeach
</div>
@endsection

@section('angka')
<div class="row justify-content-center my-3">
    <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="{{url('info/fakultas')}}">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_fakultas.png')}}" alt="...">
                <p class="fs-5 text-white">3 Fakultas</p>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="{{url('info/programs-studi')}}">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_jurusan.png')}}" alt="...">
                <p class="fs-5 text-white">6 Jurusan</p>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="{{url('info/programs-studi')}}">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_prodi.png')}}" alt="...">
                <p class="fs-5 text-white">15 Program Studi (S1)</p>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="{{url('info/pascasarjana')}}">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_pasca.png')}}" alt="...">
                <p class="fs-5 text-white">5 Program Studi (S2 & S3)</p>
            </div>
        </a>
    </div>
    <!-- baris kedua -->
    <!-- <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="#">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_luas.png')}}" alt="...">
                <p class="fs-5 text-white">10 Hektar</p>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="#">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_SDM.png')}}" alt="...">
                <p class="fs-5 text-white">131 Tenaga Pendidik dan Kependidikan</p>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="#">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_mahasiswa.png')}}" alt="...">
                <p class="fs-5 text-white">1100 Mahasiswa</p>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-6 my-2 angka">
        <a href="#">
            <div class="text-center">
                <img src="{{url('asset/img/layanan/icon_alumni.png')}}" alt="...">
                <p class="fs-5 text-white">1000 Lulusan</p>
            </div>
        </a>
    </div> -->
</div>
@endsection

@section('layanan')
<div class="row justify-content-center">
    <div class="servis col-lg-3 col-md-3 col-5 my-4 p-2 text-center">
        <a href="http://ecampus.iaknpky.ac.id" target="_blank"><span class="layanan"><i class="fas fa-user-graduate"></i></span><br>
            SIMAK <br>Sistem Informasi Akademik dan Kemahasiswaan
        </a>
    </div>
    <div class="servis col-lg-3 col-md-3 col-5 my-4 p-2 text-center">
        <a href="https://alumni.iaknpky.ac.id" target="_blank"><span class="layanan"><i class="fas fa-graduation-cap"></i></span><br>
            ASIA <br>Aplikasi dan Sistem Informasi bagi Alumni
        </a>
    </div>
    <div class="servis col-lg-3 col-md-3 col-5 my-4 p-2 text-center">
        <a href="http://sister.iaknpky.ac.id" target="_blank"><span class="layanan"><i class="fas fa-chalkboard-teacher"></i></span><br>
            SISTER <br> Sistem Informasi Sumberdaya Terintegrasi
        </a>
    </div>
    <div class="servis col-lg-3 col-md-3 col-5 my-4 p-2 text-center">
        <a href="https://ejournal.iaknpky.ac.id" target="_blank"><span class="layanan"><i class="fas fa-book-open"></i></span><br>
            EJOURNAL <br>Sistem dan Layanan Jurnal Elektronik 
        </a>
    </div>
</div>
@endsection

@section('kerjasama')
<div class="my-slider col-lg-10 col-md-10 col-12">
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/banpt.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/BKN1.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/IAIN.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/kemenag.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/kemenristekdikti.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/pddikti1.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/STAHN~1.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
    <div class="text-center">
        <a href="#"><img src="{{url('asset/img/kerjasama/STT_GKE1.png')}}" class="img-fluid kerjasama" alt="..."></a>
    </div>
</div>
@endsection

@section('footer_konten')
<div class="row">
    <div class="col-lg-4 col-md-4 col-12">
            <a href="#"><img style="width: 10vh;padding-right: 1.5vh;" src="{{url('asset/img/logo_iaknpky_footer.png')}}" alt="#"><span class="fw-bold">IAKN Palangka Raya</span></a>
            <p class="mt-3">(0536) 3241811 - 3241812 <br>
            Faksimile (0536) 3241813 <br>
            
            @foreach ($tb_email as $a)
            {{$a->isi}}<br>
            @endforeach

            @foreach ($tb_alamat as $b)
            {{$b->isi}}<br>
            @endforeach
            
            </p> 
    </div>
    <div class="col-lg-4 col-md-4 col-12">
        <h4>Quick Link</h4>
        <ul class="list-unstyled">
            @foreach ($menusub as $men)
            <li class="footer p-1"><a class="my-1 btn btn-primary" href="{{url('info/'.$men->menusublink)}}">{{$men->judul}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-12 text-center">
        <h4>IKUTI KAMI</h4>
        <div class="row d-inline">
            <a class="p-0 m-0" href="{{$tb_fb->isi}}"><span class="footer p-1 m-1"><i class="footer fab fa-facebook-square"></i></span></a>
            <a class="p-0 m-0" href="{{$tb_insta->isi}}"><span class="footer p-1 m-1"><i class="footer fab fa-instagram-square"></i></span></a>
            <a class="p-0 m-0" href="{{$tb_twitt->isi}}"><span class="footer p-1 m-1"><i class="footer fab fa-twitter-square"></i></span></a>
            <a class="p-0 m-0" href="{{$tb_yt->isi}}"><span class="footer p-1 m-1"><i class="footer fab fa-youtube-square"></i></span></a>
        </div>
        <div class="mt-3">
            <div class="row">
                <span style="font-weight: bold; color: #630640;"><i class="fa fa-eye me-2"></i>Hari ini dilihat : {{$viewed}} Kali</span>
            </div>
            <div class="row">
                <span style="font-weight: bold; color: #630640;"><i class="fa fa-eye me-2"></i>Jumlah dilihat : {{$viewed_tot}} Kali</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('share')
<div class="col-lg-4 col-md-4 col-12">
    <div class="text-center">
        <p class="mt-2 foot" style="color: white; font-weight: bold;">Bagikan Halaman Ini :
        <a class="px-1 mx-1" href=""><span style="color: blue;" class="bagi"><i class="fab fa-facebook-square bg-secondary p-1 rounded-3"></i></span></a>
        <a class="px-1 mx-1" href=""><span style="color: green;" class="bagi"><i class="fab fa-whatsapp-square bg-secondary p-1 rounded-3"></i></span></a>
        <a class="px-1 mx-1" href=""><span style="color: #00acee;" class="bagi"><i class="fab fa-twitter-square bg-secondary p-1 rounded-3"></i></span></a>
        <a class="px-1 mx-1" href=""><span class="btn-print" style="font-size: 4vh; color: #630640;"><i class="fas fa-print bg-secondary p-1 rounded-3"></i></span></a>
        </p>
    </div>
</div>
@endsection