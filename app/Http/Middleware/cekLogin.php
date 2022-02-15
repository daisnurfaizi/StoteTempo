<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }

        // $user = Auth::user();
        // if ($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3) {
        //     return $next($request);
        // }
        // return redirect('login')->with('error', "kamu gak punya akses");
        if (!session()->get('login')) {
            return redirect('login')->with('error', 'Harap login terlebih dahulu !!');
        }
        return $next($request);
    }
}
