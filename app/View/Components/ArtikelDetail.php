<?php

namespace App\View\Components;

use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\View\Component;

class ArtikelDetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //passing data artikel
        $today = Carbon::now();
        $monthh = $today->month;
        $lastmonth = $today->subMonth()->month;
        // berita populer last two months
        $populer = Artikel::whereYear('created_at',$today->year)->whereMonth('created_at',$today->month)->whereMonth('created_at',$lastmonth)->orderByDesc('dilihat')->limit(4)->get();
        $terbaru = Artikel::orderByDesc('created_at')->limit(5)->get();

        return view('components.artikel-detail', compact(
            'populer',
            'terbaru',
        ));
    }
}
