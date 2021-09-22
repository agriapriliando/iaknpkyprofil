<div class="container-fluid mt-3 dayak-bg" style="color: black">
    <div class="container p-5">
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
                {{ $slot }}                
            </div>
        </div>
    </div>
</div>