<div class="dayak-bg wow animate__animated animate__fadeInUp animate__faster">
    <div class="container">
        <div class="d-none row pt-2 wow animate__animated animate__fadeInUp justify-content-center">
            {{-- penjaringan calon rektor --}}
            <div class="col-12 col-md-6 mt-2">
                <a href="https://iaknpky.ac.id/info/download-dokumen" target="_blank">
                    <img style="border-radius:7px" class="img-fluid mx-auto d-block" src="https://i.ibb.co/fS9tWgB/penjaringan.png" alt="penjaringan rektor iakn palangka raya">
                </a>
            </div>
            {{-- banner pddikti --}}
            <div class="col-12 col-md-6 mt-2">
                <a href="https://forms.gle/vTE2BvvQZkwURn9Q7" target="_blank">
                    <img style="border-radius:7px" class="img-fluid mx-auto d-block" src="https://i.ibb.co/vkbRJ6z/perbaikanpddikti2023.jpg" alt="perbaikanpddikti2023">
                </a>
            </div>
        </div>
        {{-- banner pmb --}}
        <div class="row pt-4 wow animate__animated animate__fadeInUp justify-content-center">
            <div class="col-12 col-md-6">
                <a href="https://iaknpky.ac.id/info/seleksi-mandiri" target="_blank">
                    <img style="border-radius:7px" class="img-fluid mx-auto d-block" src="https://iaknpky.ac.id/storage/photos/PMB0520242912534186.gif" alt="button-pmb2023">
                </a>
            </div>
        </div>
        <div class="row py-3 wow animate__animated animate__fadeInUp animate__rubberBand">
            <div class="col justify-content-xs-center">
                <div class="p-3 text-center">
                    <a href="{{ url('artikel') }}">
                        <h2 class="d-inline" style="color: #630640; font-weight: bold;">BERITA KAMPUS</h2>
                    </a>
                </div>
            </div>
        </div>
        {{-- berita beranda --}}
        <div class="row justify-content-center wow animate__animated animate__fadeInUp">
            @foreach ($artikel as $ar)
                <div class="col-lg-3 col-md-3 col-10 mb-2 wow animate__animated animate__fadeInUp animate__delay-1s">
                    <a href="{{ $ar->slug }}">
                        <div class="card">
                            <img style="max-width: 240; max-height: 193px; object-fit: cover;" class="card-img-top" src="asset/img/berita/thumbnails/{{ $ar->img }}" alt="...">
                            <div class="card-body">
                                <p class="card-text fw-bold">{{ $ar->judul }}</p>
                                <p class="card-text fst-italic fs-6">
                                    {{-- <span><i class="fas fa-user-tie"></i> By {{$ar->user->name}} | </span>
                        <span><i class="fas fa-layer-group"></i> {{$ar->kategori->judul}} | </span><br> --}}
                                    <span><i class="far fa-calendar-alt"></i> {{ date('d F, Y', strtotime($ar->created_at)) }} | </span>
                                    <span><i class="far fa-clock"></i> {{ date('H.i.s', strtotime($ar->created_at)) }} Wib</span>
                                </p>
                                <div class="d-none">
                                    <p class="card-text d-none">{!! Str::words($ar->isi, 15) !!}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="d-grid gap-2 col-lg-4 col-md-4 col-6 mx-auto text-center my-3 wow animate__animated animate__flipInY">
                <a href="{{ url('artikel') }}" class="btn btn-primary">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
