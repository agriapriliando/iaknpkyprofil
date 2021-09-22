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
        <h1 class="mt-4">Daftar Halaman Info</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Info</li>
        </ol>
        <!-- row two -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Halaman Info
                <div class="col">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Author /<br>Last Update</th>
                                <th>Isi Ringkas</th>
                                <th>Kategori</th>
                                <th>Tgl Input</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Author /<br>Last Update</th>
                                <th>Isi Ringkas</th>
                                <th>Kategori</th>
                                <th>Tgl Input</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($konten as $kon)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td style="white-space: normal;">{{$kon->judul}}</td>
                        <td style="font-size: 1.5vh">{{$kon->user->name}}<br>{{date('d-m-Y H:i', strtotime($kon->updated_at))}}</td>
                        <td>{{Str::words($kon->isi,8)}}</td>
                        <td>{{$kon->menusub->judul}}</td>
                        <td>{{date('d F, Y', strtotime($kon->created_at))}}</td>
                        <td>
                            <div class="text-center">
                                <a class="pe-1" href="{{url('admin/konten/'.$kon->id)}}"><span><i class="fas fa-edit"></i></span> Edit</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row two -->
    </div>
</main>    
@endsection