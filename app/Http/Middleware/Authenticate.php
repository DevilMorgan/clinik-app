<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Config;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();
            if ($hostname) {
                $fqdn = $hostname->fqdn;
                $explode = explode(".", $fqdn);

                // Config resources for various app
                $domain = (count($explode)  == 3) ? "{$explode[1]}.{$explode[2]}" : ((count($explode) == 2 ) ? "{$explode[0]}.{$explode[1]}":null);

                if ($domain != null)
                {
                    switch ($domain)
                    {
                        case env('DOMAIN_CLINIK_APP'):
                            return route('login');
                            break;
                        case env('DOMAIN_MEDHISTORIA'):
                            return route('medhistoria.login');
                            break;
                    }
                }
            }
        }
        return route('login');
    }
}
