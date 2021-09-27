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
            <div class="row m-3">
                <div class="col-lg-4 col-md-4 col-12 mb-xs-3">
                    <a href="{{$ar->slug}}"><img class="card-img-top" src="{{ url('asset/img/berita/thumbnails/'.$ar->img)}}" alt="..."></a>
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
                    <p class="card-text" style="text-align: justify;">{!!Str::words($ar->isi, 20)!!}<span style="color:purple;"> Selengkapnya</span></p>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- end daftar berita -->

            <!-- pagination -->
            <div class="row mt-2">
                <div class="col">
                    {{ $artikel->links() }}
                    {{ $slot }}
                </div>
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
                        <img class="card-img-top" src="{{ url('asset/img/berita/thumbnails/'.$ter->img)}}" alt="...">
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