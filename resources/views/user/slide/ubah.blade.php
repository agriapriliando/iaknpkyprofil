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
                <div class="row mb-2">
                    <div class="col-12 col-md-6">
                        <div class="border p-2">
                            <form action="{{ url('admin/slideupload/') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <select name="urutan" class="form-select" aria-label="Default select example" required>
                                    <option value="">Pilih Slide yang diganti</option>
                                    <option value="1">Satu</option>
                                    <option value="2">Dua</option>
                                    <option value="3">Tiga</option>
                                    <option value="4">Empat</option>
                                </select>

                                <input name="imgslide" type="file" class="mt-1 px-3 form-control @error('imgslide') is-invalid @enderror" required>
                                @error('imgslide')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-1">Unggah Slide</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($slides as $item)
                    {{-- slide 1 --}}
                    <div class="col-12 col-md-8 mb-3 border rounded-2 p-1">
                        <p class="h-6 text-center">Slide {{ $item->urutan }}</p>
                        <img src="{{asset('uploads/slide/'.$item->nameimg)}}" class="img-fluid d-block" alt="...">
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
        <!-- end row two -->
    </div>
</main>    
@endsection