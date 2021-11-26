<?php

namespace App\Http\Controllers\Tenant\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Tenant\Autorization\Module;
use App\Models\Tenant\CardType;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PatientsController extends Controller
{
    public $MODULE = 'paciente';

    /**
     * View all patients
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $patients = Patient::all(['id', 'name', 'last_name', 'id_card', 'age', 'status']);

        return view('tenant.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new patient.
     *
     * @return Application|Factory|View
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
     * @return RedirectResponse
     */
    public function store(PatientRequest $request)
    {
        $patient = [
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'id_card'       => $request->get('id_card'),
            'card_type_id'  => $request->get('type_card'),
            //'photo' => $request->get('type_card'),
            'date_birth'    => $request->get('date-birth'),
            'place_birth'   => $request->get('place-birth'),
            'blood_group'   => $request->get('blood_group'),
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
        ];

        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $directory = app(\Hyn\Tenancy\Website\Directory::class);

            $file = $directory->put('media/patients', $request->photo);
            $patient['photo'] = $file;
        }

        Patient::query()->create($patient);

        return redirect()->route('tenant.patients.index')
            ->with('success', __('trans.message-create-success', ['element' => 'patient']));
    }

    /**
     * @param Patient $patient
     * @return Application|Factory|View
     */
    public function edit(Patient $patient)
    {
        $card_types = CardType::all();

        return view('tenant.patients.edit', compact('patient', 'card_types'));
    }

    /**
     * @param PatientRequest $request
     * @param Patient $patient
     * @return RedirectResponse
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $update = [
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'id_card'       => $request->get('id_card'),
            'card_type_id'  => $request->get('type_card'),
            //'photo' => $request->get('type_card'),
            'date_birth'    => $request->get('date-birth'),
            'place_birth'   => $request->get('place-birth'),
            'blood_group'           => $request->get('blood_group'),
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
        ];

        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $directory = app(\Hyn\Tenancy\Website\Directory::class);

            $file = $directory->put('media/patients', $request->photo);
            $update['photo'] = $file;

            //$file = Storage::disk('tenant')->put('media/patients', $request->photo);
            //$update['photo'] = Storage::disk('tenant')->url($file);

            //dd();
        }

        $patient->update($update);

        return redirect()->route('tenant.patients.index')
            ->with('success', __('trans.message-update-success', ['element' => 'patient']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function search_patient(Request $request)
    {
        //validate request
        $validator = Validator::make($request->all(),[
            'searchTerm' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'     => $validator->errors(),
                'mensaje'   => __('trans.search-incorrect')
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $patients = Patient::query()
            ->where('id_card','like','%' . $request->searchTerm . '%')
            ->select('id_card as id', 'id_card as text', 'name', 'last_name', 'email')
            ->orderBy('id_card','ASC')
            ->get();

        return response($patients, Response::HTTP_OK);
    }
}
