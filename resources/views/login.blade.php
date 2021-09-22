@extends('layout.mainlogin')

@section('title', 'Login')

@section('login')
<!-- form login -->
<div class="container">
    <div class="row justify-content-center align-items-lg-center align-items-md-center" style="height: 500px;">
        <div class="col-lg-8 col-md-8 col-11">
            <div class="row mt-2 shadow-lg bg-white align-items-center" style="border-radius: 2vh;">
                <div class="col-lg-5 col-md-5 col-12 px-5 pt-2 pb-0 mb-0 text-center">
                    <img style="width: 120px;" src="/asset/img/logo_iaknpky_footer.png" alt="">
                    <p class="fs-5 mt-2 mb-0 pb-0">IAKN Palangka Raya</p>
                    <p class="fs-6 fw-bold">Institut Agama Kristen Negeri Palangka Raya</p>
                </div>
                <div class="col-lg-7 col-md-7 col-12 px-5 pt-3" style="border-top-right-radius: 2vh; border-end-end-radius: 2vh;">
                    <div class="row border-start border-end my-4">
                        <p class="fs-5 fw-bold pb-0"><span class="mx-2" style="color: purple;"><i class="fas fa-sign-in-alt"></i></span>Masuk</p>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{url('login')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input name="email" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label class="fw-light" for="floatingInput">Email</label>
                              </div>
                              <div class="form-floating">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label class="fw-light" for="floatingPassword">Password</label>
                            </div>
                            <div class="my-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
                              </div>
                            <div class="d-grid">
                                <button type="submit" class="login btn btn-primary">Masuk</button>
                                <a class="login btn btn-primary mt-2" href="{{url('')}}">Kembali ke Beranda</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-inline text-center pb-3">
                    <a href="#">www.iaknpky.ac.id | </a>
                    <a href=""><span style="color: blue;"><i class="fab fa-facebook-square"></i></span></a> |
                    <a href=""><span style="color: green;"><i class="fab fa-whatsapp-square"></i></span></a> |
                    <a href=""><span style="color: #00acee;"><i class="fab fa-twitter-square"></i></span></a> |
                    <a href=""><span style="color: red;"><i class="fab fa-youtube-square"></i></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end form login -->
@endsection