<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sabberworm\CSS\Value\URL;

class Subdomain
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
        $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname) {
            $fqdn = $hostname->fqdn;
            $explode = explode(".", $fqdn);

            if (count($explode) == 3) \URL::defaults([
                //'account' => $request->route()->parameter('account')
                'account' => $explode[0]
            ]);
        }
        return $next($request);
    }
}
