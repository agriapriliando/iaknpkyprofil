<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Phototag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    public function index()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();

        $phototags = Phototag::all();
        return view('user.photo.daftar', compact('phototags','user'));
    }

    public function storePhototag(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul' => 'required|unique:phototags',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->errors()->all()]
            );
        }

        $phototags = Phototag::updateOrCreate([
            'id' => $request->id],[
            'judul' => $request->judul
        ]);



        if (Phototag::find($request->id)){
            Session::flash('message', 'Tag berhasil dirubah');
        } else {
            Session::flash('message', 'Tag berhasil ditambahkan');
        }

        return response()->json([
            'data' => $phototags,
        ]);

    }

    public function editPhotoTag($id)
    {
        $phototags = Phototag::find($id);
        return response()->json([
            'data' => $phototags,
        ]);
    }

    public function deletePhotoTag($id)
    {
        Phototag::find($id)->delete();

        return response()->json([
            'status' => 'Data Berhasil dihapus',
        ]);
    }

    public function photo()
    {
        $photos = Photo::all();
        $phototags = Phototag::all();
        return view('user.photo.unggah', compact('photos','phototags'));
    }

    public function findPhoto($id)
    {
        $photo = Photo::find($id);
        return response()->json([
            'data' => $photo,
        ]);
    }

    public function editPhoto($id)
    {
        $photo = Photo::find($id);
        $phototags = Phototag::all();
        return view('user.photo.edit', compact('photo', 'phototags'));
    }

    public function editProcessPhoto(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:250',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
            'photo.size' => 'Ukuran Foto harus lebih kecil dari 200kb',
            'photo.dimensions' => 'Rasio Foto harus 4:3 landscape, contoh P 800 X L 400',
        ]);

        $photo = Photo::find($id);
        $phototag = Phototag::where('id', $request->phototag_id)->first('judul');

        if ($request->hasFile('photo')) {
            // nama file img baru, tambahan datetime format bulan tahun tanggal waktu
            $imageName = $phototag->judul.Carbon::now()->format('mYdHi').'.'.$request->file('photo')->extension();
            // set path thumbnails
            $destinationPath = storage_path('app/public/photos/thumbnails');
            // kode img intervention hingga save file
            $imgFile = Image::make($request->file('photo'));
            $imgFile->resize(320, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            // file request disimpan
            $request->file('photo')->storeAs('photos', $imageName);

            $size = Storage::size('photos/'.$imageName);
            $sizeKB = round($size / 1024, 2).'KB';

            // dapatkan nama foto lama
            $filename  = $photo->img;
            // tentukan foto lama utk dihapus
            if(Storage::exists('photos/'.$filename)) {
                Storage::delete([
                    'photos/'.$filename,
                    'photos/thumbnails/'.$filename
                ]);
            }

            }else if($request->missing('photo')) { //jika request file img tidak ada
                $imageName = $photo->img;
                $sizeKB = $photo->size;
        }

        $photo->phototag_id = $request->phototag_id;
        $photo->img = $imageName;
        $photo->judul = $request->judul;
        $photo->owner = Auth::user()->name;
        $photo->slug = Str::of($request->judul)->slug('-');
        $photo->size = $sizeKB;
        $photo->save();

        return redirect('admin/photo')->with('status', 'Data Photo berhasil dirubah');

    }

    public function storePhoto(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:250',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
            'photo.required' => 'Silahkan Memilih Foto',
            'photo.size' => 'Ukuran Foto harus lebih kecil dari 200kb',
            'photo.dimensions' => 'Rasio Foto harus 4:3 landscape, contoh P 800 X L 400',
        ]);

        $phototag = Phototag::where('id', $request->phototag_id)->first('judul');

        // nama file img baru, tambahan datetime format bulan tahun tanggal waktu
        $imageName = $phototag->judul.Carbon::now()->format('mYdHi').'.'.$request->file('photo')->extension();
        // set path thumbnails
        $destinationPath = storage_path('app/public/photos/thumbnails');
        // kode img intervention hingga save file
        $imgFile = Image::make($request->file('photo'));
        $imgFile->resize(320, 240, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        // file request disimpan
        $request->file('photo')->storeAs('photos', $imageName);

        $size = Storage::size('photos/'.$imageName);
        $sizeKB = round($size / 1024, 2);

        Photo::create([
            'phototag_id' => $request->phototag_id,
            'img' => $imageName,
            'judul' => $request->judul,
            'owner' => Auth::user()->name,
            'slug' => Str::of($request->judul)->slug('-'),
            'size' => $sizeKB.' KB',
        ]);

        return redirect('admin/photo')->with('status', 'Photo berhasil diupload');
    }

    public function deletePhoto($id)
    {
        $photo = Photo::find($id);
        $filename = $photo->img;
        if(Storage::exists('photos/'.$filename)) {
            Storage::delete([
                'photos/'.$filename,
                'photos/thumbnails/'.$filename
            ]);
        }
        $photo->delete();
        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
