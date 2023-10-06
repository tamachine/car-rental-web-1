<?php

namespace App\Http\Middleware;

use Closure;

class Affiliate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->has('affiliate_id')) {
            session(['affiliate' => $request->get('affiliate_id')]);
        }

        return $next($request);
    }
}
