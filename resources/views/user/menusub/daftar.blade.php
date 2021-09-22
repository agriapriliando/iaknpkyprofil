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
        <h1 class="mt-4">Daftar Sub Menu Navigasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sub Menu</li>
        </ol>
        <!-- row two -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                <a class="btn btn-primary" href="{{url('admin/menusub/tambah')}}"><i class="fas fa-plus "></i> Tambah Sub Menu</a>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Sub Menu</th>
                                <th>Menu Utama</th>
                                <th>Last Update</th>
                                <th>Last Insert</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Judul Sub Menu</th>
                                <th>Menu Utama</th>
                                <th>Last Update</th>
                                <th>Last Insert</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($menusub as $men)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td style="white-space: normal;">{{$men->judul}}</td>
                                <td style="white-space: normal;">{{$men->menu->judul}}</td>
                                <td> {{date('d/m/Y H:i', strtotime($men->updated_at))}} Wib</td>
                                <td> {{date('d/m/Y H:i', strtotime($men->created_at))}} Wib</td>
                                <td>
                                    <div class="text-center">
                                        <a class="pe-1" href="{{url('admin/menusub/'.$men->id)}}"><span><i class="fas fa-edit"></i></span> Edit</a>
                                        <form action="{{url('admin/menusub/hapus/'.$men->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin Hapus Data?')"><span><i class="pe-1 fas fa-trash"></i> Hapus</button>
                                        </form>
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