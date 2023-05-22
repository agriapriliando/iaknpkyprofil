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
        <h1 class="mt-4">FormUbah Berita</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Berita - Ubah</li>
        </ol>
        <!-- row two -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                <a class="btn btn-primary" href="{{url('admin/artikel/tambah')}}"><i class="fas fa-plus "></i> Tambah Berita</a>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
            <div class="card-body">
                <form action="{{url('admin/artikel/ubah/'.$artikel->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                      <div class="mb-3">
                          <label class="form-label">Judul</label>
                          <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul',$artikel->judul)}}">
                          @error('judul')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <textarea name="isi" id="mytextarea" class="form-control @error('isi') is-invalid @enderror" rows="3">{{old('isi',$artikel->isi)}}</textarea>
                        @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select form-select-sm @error('kategori_id') is-invalid @enderror" aria-label=".form-select-sm">
                            <option value=""> == Pilih == </option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id}}" {{ old('kategori_id',$artikel->kategori_id) == $kat->id ? 'selected' : null }}>{{ $loop->iteration }}. {{$kat->judul}} </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label class="form-label me-2">Foto Utama</label>
                        <img style="max-width: 150px" class="img-responsive mb-2" src="{{url('asset/img/berita/'.$artikel->img)}}" alt="">
                        <a class="btn btn-primary" href="{{url('asset/img/berita/'.$artikel->img)}}" target="_blank">Lihat Foto</a>
                        <p style="font-style: italic; font-weight: bold;">Jika ingin mengganti foto, ukuran harus lebih kecil dari 300kb dan ideal rasio 4:3 landscape</p>
                        <input name="img" type="file" class="form-control @error('img') is-invalid @enderror">
                        @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Judul / Caption Foto</label>
                        <input name="img_judul" type="text" class="form-control @error('img_judul') is-invalid @enderror" value="{{old('img_judul',$artikel->img_judul)}}">
                        @error('img_judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Owner Foto</label>
                        <input name="img_owner" type="text" class="form-control @error('img_owner') is-invalid @enderror" value="{{old('img_owner',$artikel->img_owner)}}">
                        @error('img_owner')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Tanggal dan Waktu</label>
                        <input name="created_at" type="text" class="form-control @error('img_owner') is-invalid @enderror" value="{{date('d-m-Y H:i', strtotime($artikel->created_at))}}">
                        @error('created_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                      <div class="mb-3">
                          <a href="{{url('admin/artikel')}}" class="btn btn-danger">Kembali</a>
                      </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <h5>Daftar 6 Foto Terbaru dari Gallery Foto <a href="{{ url('admin/photo') }}">Lihat Foto-Foto</a></h5>
                    </div>
                    @foreach ($photos as $photo)
                    <div class="col-md-4 col-6 p-1">
                        <div class="position-relative">
                            <input hidden type="text" value="{{ asset('storage/photos/'.$photo->img) }}" id="{{ $photo->id }}">
                            <input hidden id="urlimg{{ $photo->id }}" type="text" value="{{ asset('storage/photos/'.$photo->img)}}">
                            <button class="btn btn-warning position-absolute btn-sm" onclick="copyTextHTML('urlimg{{ $photo->id }}')">Copy URL</button>
                            <button style="right:0" class="btn btn-warning position-absolute btn-sm" onclick="copyText({{ $photo->id }})">Copy HTML</button>
                            <img class="img-fluid" src="{{ asset('storage/photos/thumbnails/'.$photo->img)}}">
                        </div>
                    </div>
                    @endforeach
                </div>
                <script>
                    function copyText(element) {
                    /* Get the text field */
                    var copyText = document.getElementById(element).value;
                    copyText = '<img class="img-fluid" src="'+copyText+'">'
                    console.log(copyText);
                    /* Copy the text inside the text field */
                    navigator.clipboard.writeText(copyText);
                    /* Alert the copied text */
                    alert("HTML Copied : "+ copyText);
                }
                function copyTextHTML(element) {
                    var copyTextHTML = document.getElementById(element).value;
                    console.log(copyTextHTML);
                    /* Copy the text inside the text field */
                    navigator.clipboard.writeText(copyTextHTML);
                    /* Alert the copied text */
                    alert("URL Copied : " + copyTextHTML);
                    }
                </script>
            </div>
        </div>
        <!-- end row two -->
    </div>
</main>    
@endsection