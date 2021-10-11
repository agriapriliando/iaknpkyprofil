<x-user.app-layout>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Form Edit Foto</h1>
            <ol class="breadcrumb mb-4">
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
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/photo/'.$photo->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul',$photo->judul) }}" required>
                                    @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Pilih Tag</label>
                                    <select class="custom-select" name="phototag_id" required>
                                        <option value="">Open this select menu</option>
                                        @foreach ($phototags as $item)
                                        <option value="{{ $item->id }}" {{ old('phototag_id',$photo->phototag->id) == $item->id ? 'selected' : null }} >{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <img class="img-thumbnail rounded" src="{{ asset('storage/photos/thumbnails/'.$photo->img)}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Pilih File - Untuk mengganti foto</label>
                                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
                                    @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row two -->
        </div>
    </main>
</x-user.app-layout>