<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
     protected $tenantName = null;

     public function __construct()
     {
         $this->middleware('guest');
         $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();
         if ($hostname) {
             $fqdn = $hostname->fqdn;
             $this->tenantName = explode(".", $fqdn)[0];
         }
     }

    /**
     * Display the login view.
     *
     * @return View
     */
    public function create()
    {
        if (config('view_domain.view') == 'medhistoria')
        {
            if (isset($errors)) dd($errors);
            return view('medhistoria.auth.login');
        }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate($this->tenantName);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        dd($request);
//        if ($this->tenantName != null)
//        {
//            Auth::guard('web_tenant')->logout();
//        } else {
//            Auth::guard('web');
//        }
//
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();
//
//        return redirect('/');
    }
}
