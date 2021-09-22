<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('user') != 'editor') {
            return redirect('/');
        }
        return $next($request);
    }
}
