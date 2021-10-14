<div class="container py-4 sectiondua">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-12 card px-3">
            <!-- start isi berita -->
            {{ $slot }}
            <!-- end isi berita -->
            <div class="row mb-3">
                <a href="{{url('artikel')}}" class="btn btn-primary">Lihat Berita Lainnya</a>
            </div>
            <!-- end daftar berita -->
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="row ms-2">
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
            <div class="row mt-2 ms-2">
                <div class="col-12">
                    <p class="fs-4 text-center">Berita Terbaru</p>
                </div>
                <!-- list berita terbaru -->
                @foreach ($terbaru as $ter)
                <div class="row border border-1 py-2">
                    <div class="col-lg-4 col-md-4 col-3">
                        <img class="card-img-top" src="{{ url('asset/img/berita/thumbnails/'.$ter->img) }}" alt="...">
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