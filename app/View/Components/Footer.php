<?php

namespace App\View\Components;

use App\Models\Menusub;
use App\Models\Pageview;
use App\Models\Toolbar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;
use Illuminate\Http\Request;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $menusub = Menusub::all();
        $tb_email = Toolbar::where('jenis', 'email')->get();
        $tb_alamat = Toolbar::where('jenis', 'alamat')->get();
        $tb_fb = Toolbar::where('jenis', 'facebook')->first();
        $tb_insta = Toolbar::where('jenis', 'instagram')->first();
        $tb_twitt = Toolbar::where('jenis', 'twitter')->first();
        $tb_yt = Toolbar::where('jenis', 'youtube')->first();

        return view('components.footer', compact(
            'menusub',
            'tb_email',
            'tb_alamat',
            'tb_fb',
            'tb_insta',
            'tb_twitt',
            'tb_yt',
        ));
    }
}
