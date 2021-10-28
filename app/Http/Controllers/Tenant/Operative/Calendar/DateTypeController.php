<?php

namespace App\Http\Controllers\Tenant\Operative\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Calendar\DateType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateTypeController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dateTypes = DateType::all();
        return view('tenant.operative.date-type.index', compact('dateTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tenant.operative.date-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'price' => ['required', 'min:0']
        ]);

        DateType::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('tenant.operative.date-type.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.date-type')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(DateType $dateType)
    {
        return view('tenant.operative.date-type.edit', compact('dateType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  DateType $dateType
     * @return RedirectResponse
     */
    public function update(Request $request, DateType $dateType)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'price' => ['required', 'min:0']
        ]);

        $dateType->update([
            'name' => $request->get('name'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('tenant.operative.date-type.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.date-type')]));
    }
}
