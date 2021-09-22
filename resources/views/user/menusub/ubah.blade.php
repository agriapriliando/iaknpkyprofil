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
        <h1 class="mt-4">Ubah Sub Menu Navigasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sub Menu - Ubah</li>
        </ol>
        <!-- row two -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
            </div>
            <div class="card-body">
                <form action="{{url('admin/menusub/ubah/'.$menusub->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                      <div class="mb-3">
                          <label class="form-label">Menu Utama</label>
                          <select name="menu_id" class="form-select form-select-sm @error('menu_id') is-invalid @enderror" aria-label=".form-select-sm">
                              <option value=""> == Pilih == </option>
                              @foreach ($menu as $men)
                                  <option value="{{ $men->id}}" {{ old('menusub_id',$menusub->menu_id) == $men->id ? 'selected' : null }}>{{ $loop->iteration }}. {{$men->judul}} </option>
                              @endforeach
                          </select>
                          @error('judul')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Judul</label>
                          <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul',$menusub->judul)}}">
                          @error('judul')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                      <div class="mb-3">
                          <a href="{{url('admin/menu')}}" class="btn btn-danger">Kembali</a>
                      </div>
                </form>
            </div>
        </div>
        <!-- end row two -->
    </div>
</main>    
@endsection