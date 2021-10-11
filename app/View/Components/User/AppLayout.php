<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\View\Component;

class AppLayout extends Component
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
        $id_ses = session()->get('id');
        $user = User::where('id',$id_ses)->first();
        return view('components.user.app-layout', compact('user'));
    }
}
