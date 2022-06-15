@extends('layout.mainkonten')

@section('title', 'Beranda')

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

@section('artikel')
<div class="container py-4 sectiondua">
    <div class="row pb-3">
        <div class="col justify-content-xs-center angka-bg">
            <div class="p-3">
                <h2 class="text-white text-center">Hasil Pencarian : "{{$kata}}"</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9 col-11">
            <div class="p-1 mb-1">
                <h3>Halaman Info</h3>
            </div>
            @if($hasill->count())
            <!-- daftar info -->
            @foreach ($hasill as $al)
            <div class="row p-1">
                <div class="col-lg-10 col-md-10 col-12">
                    <a href="info/{{$al->slug}}">
                    <p class="card-text fw-bold p-0 mb-2"><span class="btn btn-primary">{{$loop->iteration}}</span> {{$al->judul}} 
                        <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-calendar-alt me-1"></i>{{date('d F, Y', strtotime($al->created_at))}}</span>
                        <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-clock me-1"></i>{{date('H:i:s', strtotime($al->created_at))}} WIB</span>
                    </p>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- end daftar info -->
            @else
            <div class="row p-3">
                <div class="col-12">
                    <p class="text-center card-text fw-bold p-0 mb-2">Data Tidak Ditemukan </p>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9 col-11">
            <div class="p-1 mb-1">
                <h3>Kolom Berita</h3>
            </div>
            @if($hasil->count())
            <!-- daftar berita -->
            @foreach ($hasil as $ar)
            <div class="row p-1">
                <div class="col-lg-10 col-md-10 col-12">
                    <a href="{{$ar->slug}}">
                    <p class="card-text fw-bold p-0 mb-2"><span class="btn btn-primary">{{$loop->iteration}}</span> {{$ar->judul}}

                        <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-calendar-alt me-1"></i>{{date('d F, Y', strtotime($ar->created_at))}}</span>
                        <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-clock me-1"></i>{{date('H:i:s', strtotime($ar->created_at))}} WIB</span>
                        <span class="mx-1" style="font-size: 1.5vh"><i class="fas fa-layer-group me-1"></i>{{$ar->kategori->judul}}</span>
                    </p>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- end daftar berita -->

            <!-- pagination -->
            {{-- <div class="row mt-2 text-center">
                {{ $hasil->links() }}
            </div> --}}
              <!-- end pagination -->
            @else
            <div class="row p-3">
                <div class="col-12">
                    <p class="text-center card-text fw-bold p-0 mb-2">Data Tidak Ditemukan </p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer_konten')
<div class="row">
    <div class="col-lg-4 col-md-4 col-12">
            <a href="index.html"><img style="width: 10vh;padding-right: 1.5vh;" src="asset/img/logo_iaknpky_footer.png" alt="#"><span class="fw-bold">IAKN Palangka Raya</span></a>
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