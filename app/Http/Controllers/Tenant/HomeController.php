<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view(config('view_domain.view') . '.home');
        //return view(config('view_domain.view') . '.home');
    }
}
