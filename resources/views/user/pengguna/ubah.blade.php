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
        <h1 class="mt-4">Ubah Data Akun / Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>
        <!-- row two -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
            </div>
            <div class="card-body">
                <form action="{{url('admin/pengguna/ubah/'.$user_all->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                      <div class="mb-3">
                          <label class="form-label">Nama</label>
                          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$user_all->name)}}">
                          @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Role</label>
                          <input name="role" type="text" class="form-control @error('role') is-invalid @enderror" value="{{old('role',$user_all->role)}}">
                          @error('role')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('email',$user_all->email)}}">
                          @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                      <div class="mb-3">
                          <a href="{{url('admin/pengguna')}}" class="btn btn-danger">Kembali</a>
                      </div>
                </form>
            </div>
        </div>
        <!-- end row two -->
    </div>
</main>    
@endsection