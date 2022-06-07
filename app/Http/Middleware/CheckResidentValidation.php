<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckResidentValidation
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
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '3'){
            if (auth()->user()->resident->isApprove == 0) {
                return redirect()->to('/resident/account');
            }
        }else{
            return redirect()->to('/admin/dashboard');
        }
        
        return $next($request);
    }
}
