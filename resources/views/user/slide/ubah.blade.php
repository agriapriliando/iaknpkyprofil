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
                <div class="row">
                    <div class="col-12 col-md-6 border rounded-2 p-1">
                        <img src="{{asset('uploads/slide/slide1.png')}}" class="img-fluid d-block" alt="...">
                        <div class="text-center">
                            <a href="#" class="btn btn-primary btn-sm m-1">Urut : 1 - Ubah Gambar</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 border rounded-2 p-1">
                        <img src="{{asset('uploads/slide/slide2.png')}}" class="img-fluid d-block" alt="...">
                        <div class="text-center">
                            <a href="#" class="btn btn-primary btn-sm m-1">Urut : 2 - Ubah Gambar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row two -->
    </div>
</main>    
@endsection