<?php

namespace App\Http\Middleware;

use App\Models\Tenant\Autorization\Module;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationModule
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $module
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $module)
    {
        //$module = Module::where('slug', 'like', $module)->first();
        $modules = $request->user()->modules->toArray();

        //dd($module);

        if (!(isset($module) && in_array($module, array_column($modules, 'slug'))
            && $modules[array_search($module, array_column($modules, 'slug'))]['status']))
        {
            abort(401);
        }
        return $next($request);
    }
}
