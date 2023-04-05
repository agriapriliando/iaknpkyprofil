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
        $slide5 = Slide::where('urutan',5)->first();
        $slide6 = Slide::where('urutan',6)->first();
        $slide7 = Slide::where('urutan',7)->first();
        $slide8 = Slide::where('urutan',8)->first();
        $slide9 = Slide::where('urutan',9)->first();
        $slide10 = Slide::where('urutan',10)->first();
        return view('components.slider',compact('slide1','slide2','slide3','slide4','slide5','slide6','slide7','slide8','slide9','slide10'));
    }
}
