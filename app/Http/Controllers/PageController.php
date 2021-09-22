<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konten;
use App\Models\Pageview;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $ip = $request->ip(); //get ip
        $minutes = 10; //set menit
        if($request->cookie('beranda') == null)
        {
            $pageview = new Pageview;
            $pageview->page = "Beranda";
            $pageview->ip_add = $ip;
            $pageview->save();
        }
        Cookie::queue('beranda', $ip , $minutes); //set cookie
        // data kunjungan
        $today = Carbon::today();
        $viewed = Pageview::where('page','Beranda')->whereDate('created_at',$today)->count();
        $viewed_tot = Pageview::where('page','Beranda')->count();

        return view('home', compact(
            'viewed',
            'viewed_tot',
        ));
    }

    public function konten(Request $request, $slug)
    {
        $konten = Konten::where('slug', $slug)->first();

        $ip = $request->ip(); //get ip
        $minutes = 10; //set menit
        if($request->cookie($slug) == null)
        {
            $pageview = new Pageview;
            $pageview->page = $konten->slug;
            $pageview->ip_add = $ip;
            $pageview->save();
        }
        Cookie::queue($slug, $ip , $minutes); //set cookie

        $today = Carbon::today();
        $viewed = Pageview::where('page',$slug)->whereDate('created_at',$today)->count();
        $viewed_tot = Pageview::where('page',$slug)->count();

        return view('konten', compact(
            'konten',
            'viewed',
            'viewed_tot',
        ));
    }

}