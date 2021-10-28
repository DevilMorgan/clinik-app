<?php

namespace App\Http\Controllers\Tenant\Operative\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Calendar\Consent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $consents = Consent::all(['id', 'name']);
        return view('tenant.operative.consent.index', compact('consents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('tenant.operative.consent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'content' => ['required'],
        ]);

        Consent::query()->create([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('tenant.operative.consent.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.consent')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Consent $consent
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Consent $consent)
    {
        return view('tenant.operative.consent.edit', compact('consent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Consent $consent
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Consent $consent)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'content' => ['required'],
        ]);

        $consent->update([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('tenant.operative.consent.index')
            ->with('success', __('trans.message-update-success', ['element' => __('trans.consent')]));
    }
}
