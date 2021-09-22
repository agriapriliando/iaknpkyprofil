<x-app-layout>

<!-- start navbar -->
<x-navbar></x-navbar>
<!-- end navbar -->

<!-- start sectiondua -->
<x-slider></x-slider>
<!-- end sectiondua -->

<!-- berita -->
<x-beritahome></x-beritahome>
<!-- end berita -->

<!-- start service -->
<x-dalamangka></x-dalamangka>
<!-- end service -->

<!-- start service -->
<x-layanan></x-layanan>
<!-- end service -->

<!-- start service -->
<x-kerjasama></x-kerjasama>
<!-- end service -->

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