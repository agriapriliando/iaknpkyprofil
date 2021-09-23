<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Pageview;
use App\Models\Konten;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use CyrildeWit\EloquentViewable\Support\Period;

class DashadminController extends Controller
{
    public function index()
    {
        $id = session()->get('id');
        $user = User::where('id',$id)->first();
        $bulanini = Carbon::today()->format('F Y');
        $bulan = Carbon::today()->month;
        $bulanlalu = Carbon::now()->subMonth()->month;

        // jumlah artikel
        $artikel_tot = Artikel::count();
        // artikel bulan ini
        $artikel_blnini = Artikel::whereMonth('created_at',$bulan)->count();
        // artikel bulan lalu
        $artikel_blnlalu = Artikel::whereMonth('created_at',$bulanlalu)->count();
        // selisih artikel
        $artikel_slsih = $artikel_blnini - $artikel_blnlalu;

        // jumlah viewer
        // total viewer bulan ini
        $viewer_blnini = Pageview::whereMonth('created_at',$bulan)->select('ip_add')->distinct()->get()->count();

        // total viewer bulan lalu
        $viewer_blnlalu = Pageview::whereMonth('created_at',$bulanlalu)->select('ip_add')->distinct()->get()->count();
        $viewer_slsih = $viewer_blnini - $viewer_blnlalu;

        // total all viewer
        $viewer_tot = Pageview::select('ip_add')->distinct()->get()->count();

        //jumlah konten
        $konten_tot = Konten::count();

        // return view('user.index');

        return view('user.index',compact(
            'user',
            'bulanini',
            'artikel_tot',
            'artikel_blnini',
            'artikel_blnlalu',
            'artikel_slsih',
            'viewer_blnini',
            'viewer_blnlalu',
            'viewer_tot',
            'viewer_slsih',
            'konten_tot'
        ));
        // return $viewer_tot;
    }
}
