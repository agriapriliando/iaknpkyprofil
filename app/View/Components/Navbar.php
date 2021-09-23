<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class Navbar extends Component
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
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $menu = Menu::where('judul','!=','hidden')->
                where('judul','!=','draft')->get();
        return view('components.navbar', compact('menu'));
    }
}
