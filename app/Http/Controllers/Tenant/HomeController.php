<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view(config('view_domain.view') . '.home');
    //     //return view(config('view_domain.view') . '.home');
    // }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.form-perfil');
    //     //return view(config('view_domain.view') . '.home');
    // }

    //     public function index()
    // {
    //     return view(config('view_domain.view') . '.mi-perfil');
    //     //return view(config('view_domain.view') . '.home');
    // }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.contactenos');
    //     //return view(config('view_domain.view') . '.home');
    // }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.operative.history-medical.create');
    //     //return view(config('view_domain.view') . '.home');
    // }

    //     public function index()
    // {
    //     return view(config('view_domain.view') . '.operative.history-medical.index');
    //     //return view(config('view_domain.view') . '.home');
    // }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.operative.reports.prescripciones');
    //     //return view(config('view_domain.view') . '.home');
    // }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.operative.reports.autorizaciones');
    //     //return view(config('view_domain.view') . '.home');
    // }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.operative.reports.incapacidades');
    //     //return view(config('view_domain.view') . '.home');
    // }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.operative.reports.vacunacion');
    //     //return view(config('view_domain.view') . '.home');
    // }

    public function index()
    {
        return view(config('view_domain.view') . '.operative.reports.convenios');
        //return view(config('view_domain.view') . '.home');
    }

    // public function index()
    // {
    //     return view(config('view_domain.view') . '.operative.reports.contactos');
    //     //return view(config('view_domain.view') . '.home');
    // }
}
