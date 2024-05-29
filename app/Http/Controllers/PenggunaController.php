<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konten;
use App\Models\Menu;
use App\Models\Menusub;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\Photo;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekadmin');
    }

    public function index()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $konten = Konten::with('menusub')->get();

        return view('user.info.daftar', compact('user','konten'));
    }

    public function ubahkonten($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $konten = Konten::with('menusub')->where('id', $id)->first();
        $menusub = Menusub::where('id','!=',$id)->get();

        return view('user.info.ubah', compact('user','konten','menusub'));
    }

    public function updatekonten($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'isi' => 'required|min:5',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
            'isi.required' => 'Kolom Isi Tidak Boleh Kosong',
        ]);

        $konten = Konten::find($id);
        $konten->judul = $request->judul;
        $konten->isi = $request->isi;
        $konten->user_id = session()->get('id');
        $konten->slug = Str::of($request->judul)->slug('-');
        $konten->save();

        return redirect('admin/konten')->with('status', 'Konten Berhasil diupdate');
    }

    public function menu()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $menu = Menu::all();

        return view('user.menu.daftar', compact('user','menu'));
    }

    public function ubahmenu($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $menu = Menu::where('id', $id)->first();

        return view('user.menu.ubah', compact('user','menu'));
    }

    public function updatemenu($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
        ]);

        $menu = Menu::find($id);
        $menu->judul = $request->judul;
        $menu->save();

        return redirect('admin/menu')->with('status', 'Menu Berhasil dirubah');
    }

    public function tambahmenu()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();

        return view('user.menu.tambah',compact('user'));
    }

    public function simpanmenu(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5'
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong'
        ]);

        $menu = New Menu;
        $menu->judul = $request->judul;
        $menu->save();

        return redirect('admin/menu')->with('status', 'Menu Berhasil ditambah');
    }

    public function hapusmenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('admin/menu')->with('status', 'Menu Berhasil dihapus');
    }

    public function menusub()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $menusub = Menusub::with('menu')->get();

        return view('user.menusub.daftar', compact('user','menusub'));
    }

    public function ubahmenusub($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $menusub = Menusub::where('id', $id)->first();
        $menu = Menu::where('id','!=',1)->get();

        return view('user.menusub.ubah', compact('user','menusub','menu'));
    }

    public function updatemenusub($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
        ]);

        $menusub = Menusub::find($id);
        $menusub->judul = $request->judul;
        $menusub->menu_id = $request->menu_id;
        $menusub->menusublink = Str::of($request->judul)->slug('-');
        $menusub->save();

        $konten = Konten::where('menusub_id',$id)->first();
        $konten->judul = $request->judul;
        $konten->user_id = session()->get('id');
        $konten->slug = Str::of($request->judul)->slug('-');
        $konten->save();

        return redirect('admin/menusub')->with('status', 'Sub Menu Berhasil dirubah');
    }

    public function tambahmenusub()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $menu = Menu::where('id','!=',1)->get();

        return view('user.menusub.tambah',compact('user','menu'));
    }

    public function simpanmenusub(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'judul' => 'required|unique:menusubs|min:5'
        ],[
            'menu_id.required' => 'Pilih Menu Utama',
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
            'judul.unique' => 'Judul sudah ada'
        ]);

        $menusub = New Menusub;
        $menusub->menu_id = $request->menu_id;
        $menusub->judul = $request->judul;
        $menusub->menusublink = Str::of($request->judul)->slug('-');
        $menusub->save();

        $konten = New Konten;
        $konten->judul = $request->judul;
        $konten->isi = ('Isi '.$request->judul);
        $konten->user_id = session()->get('id');
        $konten->menusub_id = $menusub->id;
        $konten->slug = Str::of($request->judul)->slug('-');
        $konten->save();

        return redirect('admin/menusub')->with('status', 'Sub Menu dan Konten Berhasil ditambah');
    }

    public function hapusmenusub($id)
    {
        $konten = Konten::where('menusub_id',$id)->first();
        $konten->delete();
        $menusub = Menusub::find($id);
        $menusub->delete();

        return redirect('admin/menusub')->with('status', 'Sub Menu dan Konten Terkait Berhasil dihapus');
    }

    public function artikel()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $artikel = Artikel::with('kategori')->orderByDesc('created_at')->get();

        return view('user.berita.daftar', compact('user','artikel'));
    }

    public function ubahartikel($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $artikel = Artikel::where('id', $id)->first();
        $kategori = Kategori::all();
        $photos = Photo::latest()->take(6)->get();

        return view('user.berita.ubah', compact('user','artikel','kategori', 'photos'));
    }

    public function updateartikel($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'isi' => 'required',
            // 'img' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:ratio=4/3',
            'img' => 'image|mimes:png,jpg,jpeg|max:300',
            'img_judul' => 'required',
            'img_owner' => 'required',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
            'img.size' => 'Ukuran Foto harus lebih kecil dari 300kb',
        ]);

        // $image = $request->img->getRealPath();
        // return $image;

        $id_ses = session()->get('id');
        
        $artikel = Artikel::find($id);

        // jika ada request img
        if ($request->hasFile('img')) {
            // nama file img baru, tambahan datetime format bulan tahun tanggal waktu
            $imageName = Carbon::now()->format('mYdHi').'.'.$request->file('img')->extension();
            
            // set path thumbnails
            $destinationPath = public_path('asset/img/berita/thumbnails');
            // kode img intervention hingga save file
            $imgFile = Image::make($request->file('img'));
            $imgFile->resize(240, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            
            // file request disimpan
            $request->file('img')->storeAs('', $imageName, 'public_artikel');

            // dapatkan nama foto lama
            $filename  = $artikel->img;
            // tentukan foto lama utk dihapus
            if(Storage::disk('public_artikel')->exists($filename)) {
                Storage::disk('public_artikel')->delete($filename);
            }
            if(Storage::disk('public_artikel_thumbnail')->exists($filename)) {
                Storage::disk('public_artikel_thumbnail')->delete($filename);
            }

            }else if($request->missing('img')) { //jika request file img tidak ada
                $imageName = $artikel->img;
        }
        // return $imageName;
        // return $filename;
        
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->user_id = $id_ses;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->slug = Str::of($request->judul)->slug('-');
        $artikel->img = $imageName;
        $artikel->img_judul = $request->img_judul;
        $artikel->img_owner = $request->img_owner;
        $artikel->created_at = $request->created_at;
        $artikel->save();

        return redirect('admin/artikel')->with('status', 'Berita berhasil dirubah');
    }

    public function tambahartikel()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $kategori = Kategori::all();
        $photos = Photo::latest()->take(6)->get();


        return view('user.berita.tambah',compact('user','kategori','photos'));
    }

    public function simpanartikel(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'isi' => 'required',
            // 'img' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:ratio=4/3',
            'img' => 'required|image|mimes:png,jpg,jpeg|max:300',
            'img_judul' => 'required',
            'img_owner' => 'required',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
            'img.required' => 'Silahkan Memilih Foto',
            'img.size' => 'Ukuran Foto harus lebih kecil dari 300kb',
            // 'img.dimensions' => 'Rasio Foto harus 4:3 landscape, contoh P 400 X L 300',
        ]);

        $id_ses = session()->get('id');

        $artikel = New Artikel;
        // nama file img baru, tambahan datetime format bulan tahun tanggal waktu
        $imageName = Carbon::now()->format('mYdHi').'.'.$request->file('img')->extension();

        // set path thumbnails
        $destinationPath = public_path('asset/img/berita/thumbnails');
        // kode img intervention hingga save file
        $imgFile = Image::make($request->file('img'));
        $imgFile->resize(240, 240, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        // file request disimpan
        $request->file('img')->storeAs('', $imageName, 'public_artikel');
        
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->user_id = $id_ses;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->slug = Str::of($request->judul)->slug('-');
        $artikel->img = $imageName;
        $artikel->img_judul = $request->img_judul;
        $artikel->img_owner = $request->img_owner;
        $artikel->dilihat = 0;
        $artikel->save();

        return redirect('admin/artikel')->with('status', 'Berita berhasil ditambahkan');
    }

    public function slideupload(Request $request)
    {
        $request->validate([
            'urutan' => 'required'
        ]);

        // kode lama cek ada atau tidak slide yang ingin diganti
        // $slidecari = Slide::where('urutan',$request->urutan)->first();
        // $slide = Slide::where('urutan',$request->urutan)->first();
        // $nameimg = "slide".$request->urutan.".".$request->file('imgslide')->extension();
        
        $nameimg = Carbon::now()->format('mYdHi')."slide".$request->urutan.".jpg";
        
        $slidecari = Slide::updateOrCreate(
            ['urutan' =>  $request->urutan],
            ['nameimg' => $nameimg]
        );
        
        if(Storage::disk('image_slide')->exists($nameimg)) {
            Storage::disk('image_slide')->delete($nameimg);
        }
        
        // kode lama
        // $slide->nameimg = $nameimg;
        // $slide->save();

        $request->file('imgslide')->storeAs('', $nameimg, 'image_slide');

        return redirect('admin/slide')->with('status', 'Gambar Slide : '.$slidecari->urutan.' berhasil dirubah');
    }

    public function hapusartikel($id)
    {
        $artikel = Artikel::find($id);
        
        $filename  = $artikel->img;
        // dapatkan nama foto
        // tentukan foto utk dihapus
        if(Storage::disk('public_artikel')->exists($filename)) {
            Storage::disk('public_artikel')->delete($filename);
        }

        if(Storage::disk('public_artikel_thumbnail')->exists($filename)) {
            Storage::disk('public_artikel_thumbnail')->delete($filename);
        }

        $artikel->delete();

        return redirect('admin/artikel')->with('status', 'Berita Berhasil dihapus');
    }

    public function kategori()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $kategori = Kategori::all();

        return view('user.kategori.daftar', compact('user','kategori'));
    }

    public function ubahkategori($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $kategori = Kategori::find($id);

        return view('user.kategori.ubah', compact('user','kategori'));
    }

    public function updatekategori($id, Request $request)
    {
        $request->validate([
            'judul' => 'required',
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong',
        ]);

        $kategori = Kategori::find($id);
        $kategori->judul = $request->judul;
        $kategori->save();

        return redirect('admin/kategori')->with('status', 'Kategori Berita Berhasil dirubah');
    }

    public function tambahkategori()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();

        return view('user.kategori.tambah',compact('user'));
    }

    public function simpankategori(Request $request)
    {
        $request->validate([
            'judul' => 'required'
        ],[
            'judul.required' => 'Kolom Judul Tidak Boleh Kosong'
        ]);

        $kategori = New Kategori;
        $kategori->judul = $request->judul;
        $kategori->save();

        return redirect('admin/kategori')->with('status', 'Kategori Berita Berhasil ditambah');
    }

    public function hapuskategori($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('admin/kategori')->with('status', 'Kategori Berita Berhasil dihapus');
    }

    public function pengguna()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $user_all = User::where('email','!=','admin@email.com')->get();

        return view('user.pengguna.daftar', compact('user','user_all'));
    }

    public function ubahpengguna($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $user_all = User::find($id);

        return view('user.pengguna.ubah', compact('user','user_all'));
    }

    public function updatepengguna($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
        ],[
            'email.required' => 'Kolom Email Tidak Boleh Kosong',
        ]);

        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->role = $request->role;
        $pengguna->email = $request->email;
        $pengguna->save();

        return redirect('admin/pengguna')->with('status', 'Data Pengguna / Akun Berhasil dirubah');
    }

    public function tambahpengguna()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();

        return view('user.pengguna.tambah',compact('user'));
    }

    public function simpanpengguna(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required'
        ],[
            'email.unique' => 'Email sudah digunakan akun lain'
        ]);

        $pengguna = New User;
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->password = Hash::make($request->password);
        $pengguna->role = "editor";
        $pengguna->save();

        return redirect('admin/pengguna')->with('status', 'Pengguna Berhasil ditambah');
    }

    public function hapuspengguna($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();

        return redirect('admin/pengguna')->with('status', 'Pengguna Berhasil dihapus');
    }

    public function resetpengguna($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $user_all = User::find($id);

        return view('user.pengguna.reset', compact('user','user_all'));
    }

    public function savepassword($id, Request $request)
    {
        $pengguna = User::find($id);
        $pengguna->password = Hash::make($request->password);
        $pengguna->save();

        return redirect('admin/pengguna')->with('status', 'Data Pengguna / Akun Berhasil dirubah');
    }

    public function passakun($id)
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $user_all = User::find($id);

        return view('user.navigasi.ubahpass', compact('user','user_all'));
    }

    public function savepassakun($id, Request $request)
    {
        $pengguna = User::find($id);
        $pengguna->password = Hash::make($request->password);
        $pengguna->save();

        return redirect('admin/akun/pass/'.$id)->with('status', 'Password Anda Berhasil dirubah');
    }

    public function slide()
    {
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        $slides = Slide::all();

        return view('user.slide.ubah',compact('user','slides'));
    }

}