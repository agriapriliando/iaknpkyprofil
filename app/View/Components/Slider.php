<?php

namespace App\View\Components;

use App\Models\Slide;
use Illuminate\View\Component;

class Slider extends Component
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
        $slide1 = Slide::where('urutan',1)->first();
        $slide2 = Slide::where('urutan',2)->first();
        $slide3 = Slide::where('urutan',3)->first();
        $slide4 = Slide::where('urutan',4)->first();
        return view('components.slider',compact('slide1','slide2','slide3','slide4'));
    }
}
