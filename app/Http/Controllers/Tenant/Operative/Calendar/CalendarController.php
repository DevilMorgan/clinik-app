<?php

namespace App\Http\Controllers\Tenant\Operative\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('tenant.operative.calendar.index', compact('user'));
    }

    public function list_free_date()
    {

    }
}
