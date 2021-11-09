<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SharepointController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('auth.sharepoint');
    }

    public function search_sharepoint(Request $request)
    {
        $all = ['sharepoint' => $request->sharepoint . '.' . env('APP_DOMAIN')];
        $validator = Validator::make($all, [
            'sharepoint' =>
                ['required', 'exists:hostnames,fqdn']
        ]);

        if ($validator->fails()) return redirect()->route('init')
            ->withErrors($validator)->withInput();

        return redirect()->to(env('APP_HTTP') . $request->sharepoint . '.' . env('APP_DOMAIN'));
    }
}
