<?php

namespace App\Http\Controllers\Tenant\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Tenant\Autorization\Module;
use App\Models\Tenant\CardType;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PatientsController extends Controller
{
    public $MODULE = 'paciente';

    /**
     * View all patients
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $patients = Patient::all(['id', 'name', 'last_name', 'id_card', 'age', 'status']);

        return view('tenant.patients.index', compact('patients'));
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
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'id_card'       => $request->get('id_card'),
            'card_type_id'  => $request->get('type_card'),
            //'photo' => $request->get('type_card'),
            'date_birth'    => $request->get('date-birth'),
            'place_birth'   => $request->get('place-birth'),
            'age'           => $request->get('age'),
            'gender'        => $request->get('gender'),
            'occupation'    => $request->get('occupation'),
            'marital_status'=> $request->get('marital-status'),
            'status'        => $request->get('status'),

            'cellphone'     => $request->get('cellphone'),
            'phone'         => $request->get('phone'),
            'email'         => $request->get('email'),
            'address'       => $request->get('address'),
            'neighborhood'  => $request->get('neighborhood'),
            'city'          => $request->get('city'),

            'entity'                => $request->get('medical-entity'),
            'contributory_regime'   => $request->get('contributory-regime'),
            'status_medical'        => $request->get('status-medical'),
        ]);

        return redirect()->route('tenant.patients.index')
            ->with('success', __('trans.message-create-success', ['element' => 'patient']));
    }


    /**
     * @param Patient $patient
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Patient $patient)
    {

    }

    /**
     * @param Patient $patient
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Patient $patient)
    {
        $card_types = CardType::all();

        return view('tenant.patients.edit', compact('patient', 'card_types'));
    }

    /**
     * @param PatientRequest $request
     * @param Patient $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update([
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'id_card'       => $request->get('id_card'),
            'card_type_id'  => $request->get('type_card'),
            //'photo' => $request->get('type_card'),
            'date_birth'    => $request->get('date-birth'),
            'place_birth'   => $request->get('place-birth'),
            'age'           => $request->get('age'),
            'gender'        => $request->get('gender'),
            'occupation'    => $request->get('occupation'),
            'marital_status'=> $request->get('marital-status'),
            'status'        => $request->get('status'),

            'cellphone'     => $request->get('cellphone'),
            'phone'         => $request->get('phone'),
            'email'         => $request->get('email'),
            'address'       => $request->get('address'),
            'neighborhood'  => $request->get('neighborhood'),
            'city'          => $request->get('city'),

            'entity'                => $request->get('medical-entity'),
            'contributory_regime'   => $request->get('contributory-regime'),
            'status_medical'        => $request->get('status-medical'),
        ]);

        return redirect()->route('tenant.patients.index')
            ->with('success', __('trans.message-update-success', ['element' => 'patient']));
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
