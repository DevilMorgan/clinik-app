<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class ViewDomain
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname) {
            $fqdn = $hostname->fqdn;
            $explode = explode(".", $fqdn);

            if (count($explode) == 3)
            {
                \URL::defaults([
                    //'account' => $request->route()->parameter('account')
                    'account' => $explode[0]
                ]);


                $request->route()->forgetParameter('account');
            }

            // Config resources for various app
            $domain = (count($explode)  == 3) ? "{$explode[1]}.{$explode[2]}" : ((count($explode) == 2 ) ? "{$explode[0]}.{$explode[1]}":null);

            if ($domain != null)
            {
                switch ($domain)
                {
                    case env('DOMAIN_CLINIK_APP'):
                        Config::set('view_domain.view', env('VIEW_CLINIK_APP'));
                        Config::set('app.APP_URL', env('URL_CLINIK_APP', 'clinik-app.com'));
                        break;
                    case env('DOMAIN_MEDHISTORIA'):
                        Config::set('view_domain.view', env('VIEW_MEDHISTORIA'));
                        Config::set('app.APP_URL', env('URL_MEDHISTORIA', 'medhistoria.com'));
                        break;
                }
            }
            return $next($request);
        }

        return abort(404);
    }
}
