@extends('user.main')

@section('title', 'Info')

@section('role_brand')
<a class="navbar-brand" href="#"><span style="font-size: 2.5vh;"><i class="fas fa-house-user"></i> Role {{Str::ucfirst($user->role)}}</span></a>
@endsection

@section('sidenav_footer')
<div class="sb-sidenav-footer">
    <div class="small">Logged in Sebagai:</div>
    {{Str::ucfirst($user->name)}}
</div>
@endsection

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Daftar Gambar Slide Beranda</h1>
        {{-- <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Slide</li>
        </ol> --}}
        <!-- row two -->
        <div class="card mb-4">
            <div class="card-header">
                <li class="breadcrumb-item active">Slide</li>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    {{-- slide 1 --}}
                    <div class="col-12 col-md-8 mb-3 border rounded-2 p-1">
                        <img src="{{asset('uploads/slide/slide1.jpg')}}" class="img-fluid d-block" alt="...">
                        <div class="text-center">
                            <form action="{{ url('admin/slideupload/slide1.jpg') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <input name="imgslide" type="file" class="mt-1 px-3 form-control @error('imgslide') is-invalid @enderror" required>
                                @error('imgslide')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-1">Ganti Foto Slide Pertama</button>
                            </form>
                        </div>
                    </div>
                    {{-- slide 2 --}}
                    <div class="col-12 col-md-8 mb-3 border rounded-2 p-1">
                        <img src="{{asset('uploads/slide/slide2.jpg')}}" class="img-fluid d-block" alt="...">
                        <div class="text-center">
                            <form action="{{ url('admin/slideupload/slide2.jpg') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <input name="imgslide" type="file" class="mt-1 px-3 form-control @error('imgslide') is-invalid @enderror" required>
                                @error('imgslide')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-1">Ganti Foto Slide Kedua</button>
                            </form>
                        </div>
                    </div>
                    {{-- slide 3 --}}
                    <div class="col-12 col-md-8 mb-3 border rounded-2 p-1">
                        <img src="{{asset('uploads/slide/slide3.jpg')}}" class="img-fluid d-block" alt="...">
                        <div class="text-center">
                            <form action="{{ url('admin/slideupload/slide3.jpg') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <input name="imgslide" type="file" class="mt-1 px-3 form-control @error('imgslide') is-invalid @enderror" required>
                                @error('imgslide')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-1">Ganti Foto Slide Ketiga</button>
                            </form>
                        </div>
                    </div>
                    {{-- slide 4 --}}
                    <div class="col-12 col-md-8 mb-3 border rounded-2 p-1">
                        <img src="{{asset('uploads/slide/slide4.jpg')}}" class="img-fluid d-block" alt="...">
                        <div class="text-center">
                            <form action="{{ url('admin/slideupload/slide4.jpg') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <input name="imgslide" type="file" class="mt-1 px-3 form-control @error('imgslide') is-invalid @enderror" required>
                                @error('imgslide')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-1">Ganti Foto Slide Keempat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row two -->
    </div>
</main>    
@endsection