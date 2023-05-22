<x-user.app-layout>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Photo</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active">Photo</li> --}}
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </ol>
            <!-- row two -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    <!-- Modal Delete-->
                    <div class="modal fade" id="PhotoModalDelete" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title">Yakin ingin hapus Foto</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" id="PhotoData">
                                        <div class="alert alert-success mb-2" style="display: none">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="photo_id" id="photo_id">
                                            <p class="fst-5" id="judul"></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Hapus Data" class="btn btn-primary" id="deleteBtnPhoto">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/photo') }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required>
                                    @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Pilih Tag</label>
                                    <select class="custom-select" name="phototag_id" required>
                                        <option value="">Open this select menu</option>
                                        @foreach ($phototags as $item)
                                        <option value="{{ $item->id }}" {{ old('phototag_id')==$item->id ? 'selected' : null }} >{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Pilih File <small class="text-muted">Size Max 300KB, Rasio Bebas</small></label>
                                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" required>
                                    @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Unggah Foto" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTablePhoto" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Judul</th>
                                    <th>Tag</th>
                                    <th>Size</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Judul</th>
                                    <th>Tag</th>
                                    <th>Size</th>
                                    <th>Kelola</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($photos as $photo)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{ asset('storage/photos/thumbnails/'.$photo->img)}}" class="img-fluid"> <br>
                                        {{date('d-m-Y H:i', strtotime($photo->created_at))}}</td>
                                    <td>
                                        {{$photo->judul}} <small>by {{$photo->owner}}</small><br>
                                        <input hidden type="text" value="{{ asset('storage/photos/'.$photo->img) }}" id="{{ $photo->id }}">
                                        <input hidden id="urlimg{{ $photo->id }}" type="text" value="{{ asset('storage/photos/'.$photo->img)}}">
                                        <button class="btn btn-primary btn-sm" onclick="copyTextHTML('urlimg{{ $photo->id }}')">Copy URL</button>
                                        <button class="btn btn-primary btn-sm" onclick="copyText({{ $photo->id }})">Copy HTML</button>
                                    </td>
                                    
                                    <td>{{$photo->phototag->judul}}</td>
                                    <td>{{$photo->size}}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="input-group">
                                                <a href="{{ url('admin/photo/'.$photo->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit "></i></a>
                                                <button id="PhotoDelete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#PhotoModalDelete" data-id="{{ $photo->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <script>
                                    function copyText(element) {
                                    /* Get the text field */
                                    var copyText = document.getElementById(element).value;
                                    copyText = '<img class="img-fluid" src="'+copyText+'">'
                                    // console.log(copyText);
                                    /* Copy the text inside the text field */
                                    navigator.clipboard.writeText(copyText);
                                    /* Alert the copied text */
                                    alert("HTML Copied : "+ copyText);
                                }
                                function copyTextHTML(element) {
                                    var copyTextHTML = document.getElementById(element).value;
                                    // console.log(copyTextHTML);
                                    /* Copy the text inside the text field */
                                    navigator.clipboard.writeText(copyTextHTML);
                                    /* Alert the copied text */
                                    alert("URL Copied : " + copyTextHTML);
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row two -->
        </div>
    </main>
</x-user.app-layout>