@extends('layout.mainkonten')

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

@section('artikel')
<div class="container py-4 sectiondua">
    <div class="row pb-3">
        <div class="col justify-content-xs-center angka-bg">
            <div class="p-3">
                <h2 class="text-white text-center">Berita dan Informasi Kampus </h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7 col-11">
            <!-- daftar berita -->
            @foreach ($artikel as $ar)
            <div class="row p-3">
                <div class="col-lg-4 col-md-4 col-12 mb-xs-3">
                    <a href="{{$ar->slug}}"><img class="card-img-top" src="src="{{ url('asset/img/berita/'.$ar->img)}}" alt="..."></a>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <a href="{{$ar->slug}}">
                    <p class="card-text fw-bold p-0 mb-2">{{$ar->judul}} </p>
                    <p class="fst-italic p-0 m-0">
                        <span class="mx-1" style="font-size: 1.5vh"><i class="fas fa-user-tie me-1"></i>By {{$ar->user->name}}</span>
                    </p>
                    <p class="fst-italic p-0 m-0">
                        <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-calendar-alt me-1"></i>{{date('d F, Y', strtotime($ar->created_at))}}</span>
                        <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-clock me-1"></i>{{date('H:i:s', strtotime($ar->created_at))}} WIB</span>
                        <span class="mx-1" style="font-size: 1.5vh"><i class="fas fa-layer-group me-1"></i>{{$ar->kategori->judul}}</span>
                    </p>
                    <p class="card-text" style="text-align: justify;">{!!Str::words($ar->isi, 25)!!}<span style="color:purple;"> Selengkapnya</span></p>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- end daftar berita -->

            <!-- pagination -->
            <div class="row mt-2 text-center">
                {{ $artikel->links() }}
            </div>
              <!-- end pagination -->
        </div>
        <div class="col-lg-4 col-md-4 col-11">
            <div class="col">
                <p class="fs-4 text-center">Berita Terpopuler</p>
                <div class="list-group">
                    @foreach ($populer as $po)
                    <a style="color: black !important;" href="{{url(''.$po->slug)}}" class="list-group-item list-group-item-action">
                        <span class="fw-bold me-1">{{$loop->iteration}}.</span>{{$po->judul}}
                        <span style="color: purple;"><i class="fas fa-eye mx-2"></i>{{ $po->dilihat }} Views</span>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="row mt-3">
                    <p class="fs-4 text-center">Berita Terbaru</p>
                </div>
                <!-- list berita terbaru -->
                @foreach ($terbaru as $ter)
                <div class="row border border-1 py-2">
                    <div class="col-lg-4 col-md-4 col-3">
                        <img class="card-img-top" src="src="{{ url('asset/img/berita/'.$ter->img)}}"" alt="...">
                    </div>
                    <div class="col-lg-8 col-md-8 col-9">
                        <a class="link-dark" href="{{url(''.$ter->slug)}}">{{$ter->judul}}</a><br>
                        <span class="mx-1" style="font-size:1.5vh"><i class="far fa-clock"></i> {{date('d F, Y H:i', strtotime($ter->created_at))}} WIB</span>
                    </div>
                </div>
                @endforeach
            </div>
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
            <li class="footer p-1"><a class="my-1 btn btn-primary" href="{{url('konten/'.$men->menusublink)}}">{{$men->judul}}</a></li>
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