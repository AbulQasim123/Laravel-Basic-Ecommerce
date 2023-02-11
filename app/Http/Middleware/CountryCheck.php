<?php

namespace App\Http\Middleware;
use Illuminate\Support\Str;
use Closure;
use Illuminate\Http\Request;

class CountryCheck
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
            // Globally middleware
        $country = $request->country;
        echo Str::upper($country);
        if ($request->country && !in_array($request->country, array("uk","in","us","pak","afg"))) {
            return redirect('noaccess');
        }
        return $next($request);
    }
}
