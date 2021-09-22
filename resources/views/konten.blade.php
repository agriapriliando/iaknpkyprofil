<x-app-layout>
    <!-- start navbar -->
    <x-navbar></x-navbar>
    <!-- end navbar -->
    <x-info>
        <div class="row p-4 text-center angka-bg">
            <h3 style="color: white;">{{$konten->judul}} </h3>
        </div>
        <div class="row justify-content-center">
            <div class="my-4 p-3 bg-white">
                <div class="ps-3">
                {!!$konten->isi!!}
                </div>
                <p class="text-end">By {{$konten->user->name}} </p>
                <div class="text-center">
                    <p>Tag</p>
                    <a class="btn btn-primary" href="{{url('info/'.$konten->slug)}}"> {{$konten->menusub->judul}}</a>
                </div>
            </div>
        </div>
    </x-info>

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
