<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Logging
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
        /*
        we will be logging our full URL including the query params 
        */
        \Log::info(
            $request->fullUrl(),
            [
                'method' => $request->method(),
                'input' => $request->all()
            ]
        );
        return $next($request);
    }
}
