<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $users = DB::table('users')->where('email', $request->email)->first();
            if($users->role == 'admin') {
                session([
                    'user' => $users->role,
                    'id' => $users->id,
                    ]);
                return redirect('admin');
            } elseif($users->role == 'editor') {
                session([
                    'user' => $users->role,
                    'id' => $users->id,
                    ]);
                return redirect('admin');
            }
        }

        return redirect('/login')->with('status','Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->forget('user'); untuk menghapus id user pada session
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
