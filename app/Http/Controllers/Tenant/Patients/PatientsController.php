<?php

namespace App\Http\Controllers\Tenant\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Tenant\CardType;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientsController extends Controller
{
    /**
     * View all patients
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $patients = Patient::all(['id', 'name', 'last_name', 'id_card']);

        return view('tenant.patients.index', compact($patients));
    }

    /**
     * Show the form for creating a new patient.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $card_types = CardType::all();

        return view('tenant.patients.create', compact('card_types'));
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param PatientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientRequest $request)
    {
        $patient = Patient::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'id_card' => $request->id_card,
            'photo' => $request->photo,
            'cellphone' => $request->cellphone,
            'phone' => $request->phone,
            'medical_security' => $request->medical_security
        ]);

        return redirect()->route('tenant.patients.index')
            ->with('success', __('trans.message-create-success', ['element' => 'patient']));
    }

    public function test()
    {
        return redirect()->route('tenant.patients.index')
            ->with('success', __('trans.message-create-success', ['element' => 'patient']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
