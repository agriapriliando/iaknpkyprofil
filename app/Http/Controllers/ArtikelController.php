<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Menusub;
use App\Models\Artikel;
use App\Models\Pageview;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip(); //get ip
        $minutes = 10; //set menit
        if($request->cookie('artikel') == null)
        {
            $pageview = new Pageview;
            $pageview->page = "Artikel";
            $pageview->ip_add = $ip;
            $pageview->save();
        }
        Cookie::queue('artikel', $ip , $minutes); //set cookie
        // data kunjungan
        $today = Carbon::today();
        $viewed = Pageview::where('page','Artikel')->whereDate('created_at',$today)->count();
        $viewed_tot = Pageview::where('page','Artikel')->count();

        return view('artikel', compact(
            'viewed',
            'viewed_tot',
        ));

    }    

    public function detail(Request $request, $slug)
    {
        $artikeldt = Artikel::where('slug', $slug)->first();

        $ip = $request->ip(); //get ip
        $minutes = 10; //set menit
        $setCookieArtikel = 'id_artikel_'.$artikeldt->id;
        if($request->cookie($setCookieArtikel) == null)
        {
            $pageview = new Pageview;
            $pageview->page = $setCookieArtikel;
            $pageview->ip_add = $ip;
            $pageview->save();
        }
        Cookie::queue($setCookieArtikel, $ip , $minutes); //set cookie
        // data kunjungan
        $today = Carbon::today();
        $viewed = Pageview::where('page',$setCookieArtikel)->whereDate('created_at',$today)->count();
        $viewed_tot = Pageview::where('page',$setCookieArtikel)->count();

        return view('artikeldt', compact(
            'viewed',
            'viewed_tot',
            'artikeldt',
        ));
    }
}
