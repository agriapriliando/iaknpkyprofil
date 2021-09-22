<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Menusub;
use App\Models\Artikel;
use App\Models\Konten;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $tb_email = DB::table('toolbars')->where('jenis', 'email')->get();
        $tb_alamat = DB::table('toolbars')->where('jenis', 'alamat')->get();
        $tb_fb = DB::table('toolbars')->where('jenis', 'facebook')->first();
        $tb_insta = DB::table('toolbars')->where('jenis', 'instagram')->first();
        $tb_twitt = DB::table('toolbars')->where('jenis', 'twitter')->first();
        $tb_yt = DB::table('toolbars')->where('jenis', 'youtube')->first();
        $menu = Menu::all();
        $menusub = Menusub::all();

        if($request->has('search')){
            $kata = $request->search;
            $hasil = Artikel::search($request->search)->take(5)->get();
            $hasill = Konten::search($request->search)->take(2)->get();
        }else{
            $kata = '';
            $hasil = Artikel::limit(2)->get();
            $hasill = Konten::limit(2)->get();
        }

        // return $hasil;

        return view('cari.daftar', compact(
            'tb_email',
            'tb_alamat',
            'tb_fb',
            'tb_insta',
            'tb_twitt',
            'tb_yt',
            'menu',
            'menusub',
            'kata',
            'hasil',
            'hasill'
        ));
    }
}
