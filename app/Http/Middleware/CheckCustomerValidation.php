<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckCustomerValidation
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
            if (auth()->user()->customer->isRegister != true) {
                return redirect()->to('/customer/account');
            }
        }else{
            return redirect()->to('/admin/dashboard');
        }

        return $next($request);
    }
}
