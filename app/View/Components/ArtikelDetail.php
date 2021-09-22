<?php

namespace App\View\Components;

use App\Models\Artikel;
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
        $populer = Artikel::orderByDesc('dilihat')->limit(5)->get();
        $terbaru = Artikel::orderByDesc('created_at')->limit(5)->get();

        return view('components.artikel-detail', compact(
            'populer',
            'terbaru',
        ));
    }
}
