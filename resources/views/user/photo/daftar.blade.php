@extends('user.main')

@section('title', 'Photo')

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
        <h1 class="mt-4">Daftar Photo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Photo</li>
        </ol>
        <!-- row two -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                {{-- <a class="btn btn-primary" href="{{url('admin/phototag/tambah')}}"><i class="fas fa-plus "></i> Tambah Tags</a> --}}
                <!-- Button trigger modal -->
                <button id="PhotoTagTambah" type="button" class="btn btn-primary" data-toggle="modal" data-target="#PhotoTagModal">
                    <i class="fas fa-plus "></i> Tambah Photo Tag
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="PhotoTagModal" tabindex="-1">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Tambah Tag</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" id="PhotoTagData">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="phototag_id" id="phototag_id">
                                    <input type="text" class="form-control" name="judul" id="judul">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" id="saveBtnPhotoTag">
                                </div>
                                <div class="alert alert-success mb-2" style="display: none">              
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Modal Delete-->
                <div class="modal fade" id="PhotoTagModalDelete" tabindex="-1">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Yakin ingin hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" id="PhotoTagData">
                                <div class="alert alert-success mb-2" style="display: none">              
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="phototag_id" id="phototag_id">
                                    <p class="fst-5" id="judul"></p>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Hapus Data" class="btn btn-primary" id="deleteBtnPhotoTag">
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

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
                                <th>Nama Photo Tag</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Photo Tag</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($phototags as $phototag)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td style="white-space: normal;">{{$phototag->judul}}</td>
                                {{-- <td> {{date('d/m/Y H:i', strtotime($phototag->updated_at))}} Wib</td>
                                <td> {{date('d/m/Y H:i', strtotime($phototag->created_at))}} Wib</td> --}}
                                <td>
                                    <div class="text-center">
                                        <div class="input-group">
                                            <button id="PhotoTagEdit" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#PhotoTagModal" data-id="{{ $phototag->id }}">
                                                <i class="fas fa-edit "></i>
                                            </button>
                                            <button id="PhotoTagDelete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#PhotoTagModalDelete" data-id="{{ $phototag->id }}">
                                                <i class="fas fa-trash "></i>
                                            </button>
                                            {{-- <form action="{{url('admin/phototag/hapus/'.$phototag->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin Hapus Data?')"><i class="pe-1 fas fa-trash"></i></button>
                                            </form> --}}
                                        </div>
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