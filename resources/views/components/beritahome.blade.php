<div class="dayak-bg wow animate__animated animate__fadeInUp animate__faster">
<div class="container">
    <div class="row pt-3">
        <div class="col">
            <a href="https://iaknpky.ac.id/info/seleksi-mandiri" target="_blank">
                <img style="border-radius:7px" class="img-fluid mx-auto d-block" src="https://i.ibb.co/9Y7dK7m/button-pmb2023iii.gif" alt="button-pmb2023">
            </a>
        </div>
    </div>
    <div class="row py-3 wow animate__animated animate__fadeInUp animate__rubberBand">
        <div class="col justify-content-xs-center">
            <div class="p-3 text-center">
                <a href="{{url('artikel')}}">
                <h2 class="d-inline" style="color: #630640; font-weight: bold;">BERITA KAMPUS</h2>
                </a>
            </div>
        </div>
    </div>
    {{-- berita beranda --}}
    <div class="row justify-content-center wow animate__animated animate__fadeInUp">
        @foreach ($artikel as $ar)
        <div class="col-lg-3 col-md-3 col-10 mb-2 wow animate__animated animate__fadeInUp animate__delay-1s">
            <a href="{{$ar->slug}}">
            <div class="card">
                <img style="max-width: 250; max-height: 250px; object-fit: cover;" class="card-img-top" src="asset/img/berita/thumbnails/{{$ar->img}}" alt="...">
                <div class="card-body">
                    <p class="card-text fw-bold">{{$ar->judul}}</p>
                    <p class="card-text fst-italic fs-6">
                        {{-- <span><i class="fas fa-user-tie"></i> By {{$ar->user->name}} | </span>
                        <span><i class="fas fa-layer-group"></i> {{$ar->kategori->judul}} | </span><br> --}}
                        <span><i class="far fa-calendar-alt"></i>  {{date('d F, Y', strtotime($ar->created_at))}} | </span>
                        <span><i class="far fa-clock"></i> {{date('H.i.s', strtotime($ar->created_at))}} Wib</span></p>
                    <p class="card-text">{!!Str::words($ar->isi, 15)!!}</p>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="d-grid gap-2 col-lg-4 col-md-4 col-6 mx-auto text-center my-3 wow animate__animated animate__flipInY">
            <a href="{{url('artikel')}}" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
    </div>
</div>
</div>