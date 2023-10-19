<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VerifyMobile
{
    use LivewireAlert;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // dd($request,Auth::user()->role,Auth::user()->mobile);
        if (Auth::user()->mobile == '' && Auth::user()->role == 'admin') {
            // return 'hello';
            
            return redirect()->route('profile.show')->with('error', 'Please Update Mobile Number First ');
        } else {
            return $next($request);
        }
    }
}
