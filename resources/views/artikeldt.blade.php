<x-app-layout>
    <!-- start navbar -->
    <x-navbar></x-navbar>
    <!-- end navbar -->
    <x-artikel-detail>
        <div class="row">
            <div class="col-12">
                <p class="fw-bold fs-2">{{$artikeldt->judul}}</p>
                <p class="fst-italic p-0 m-0">
                    <span class="mx-1" style="font-size: 1.5vh"><i class="fas fa-user-tie"></i>By {{ $artikeldt->user->name }}</span>
                    <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-eye"></i>{{ $viewed_tot }} Views</span>
                </p>
                <p class="fst-italic px-0 mx-0">
                    <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-calendar-alt"></i>{{date('d F, Y', strtotime($artikeldt->created_at))}}</span>
                    <span class="mx-1" style="font-size: 1.5vh"><i class="far fa-clock"></i>{{date('H.i.s', strtotime($artikeldt->created_at))}} WIB</span>
                    <span class="mx-1" style="font-size: 1.5vh"><i class="fas fa-layer-group"></i>{{$artikeldt->kategori->judul}}</span>
                </p>
                <img class="card-img-top" src="{{ url('asset/img/berita/'.$artikeldt->img)}}" alt="...">
                <p class="text-center mt-2">{{$artikeldt->img_judul}} <span class="fw-bold">({{$artikeldt->img_owner}})</span></p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <p class="card-text">
                    {!!$artikeldt->isi!!}
                </p>
            </div>
        </div>
    </x-artikel-detail>

    <!-- start footer -->
    <x-footer>
        <div class="mt-3">
            <div class="row">
                <span style="font-weight: bold; color: #630640;"><i class="fa fa-eye me-2"></i>Hari ini dilihat : {{$viewed}} Kali</span>
            </div>
            <div class="row">
                <span style="font-weight: bold; color: #630640;"><i class="fa fa-eye me-2"></i>Jumlah dilihat : {{$viewed_tot}} Kali</span>
            </div>
        </div>
    </x-footer>
    <!-- end footer -->

    <!-- footer share button -->
    <x-sharebutton></x-sharebutton>
    <!-- end footer share button -->
</x-app-layout>
