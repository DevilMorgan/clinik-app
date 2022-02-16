<?php

namespace App\Http\Controllers\Tenant\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\System\CardType;
use App\Models\Tenant\History_medical\Record;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PatientsController extends Controller
{
    //public $MODULE = 'paciente';

    /**
     * View all patients
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $patients = Patient::query()
            ->select([
                'id',
                'name_first',
                'name_second',
                'lastname_first',
                'lastname_second',
                'id_card',
                'blood_group',
                'phone',
                'cellphone',
                'entity',
                'photo',
                'city',
                'status'
            ])
            ->addSelect(['last_date' =>
                Record::query()->select('date')
                    ->whereColumn('patient_id', 'patients.id')
                    ->orderByDesc('date')
                    ->take(1)
            ])
            ->get();

        return view(config('view_domain.view') . '.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new patient.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $card_types = CardType::all();

        return view(config('view_domain.view') . '.patients.create', compact('card_types'));
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function store(PatientRequest $request)
    {
        //$patient = $this->patient_array($request);
        $patient = $request->all();

        if ($request->file('photo')) {

            $directory = app(\Hyn\Tenancy\Website\Directory::class);

            $file = $directory->put('patients', $request->photo);
            $patient['photo'] = $file;
        }

        Patient::query()->create($patient);

        return redirect()->route(config('view_domain.view') . '.patients.index')
            ->with('success', __('trans.message-create-success', ['element' => 'patient']));
    }

    /**
     * @param Patient $patient
     * @return Application|Factory|View
     */
    public function edit(Patient $patient)
    {
        $card_types = CardType::all();

        return view(config('view_domain.view') . '.patients.edit', compact('patient', 'card_types'));
    }

    /**
     * @param PatientRequest $request
     * @param Patient $patient
     * @return RedirectResponse
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        //$update = $this->patient_array($request);
        $update = $request->all();

        if ($request->file('photo')) {

            $directory = app(\Hyn\Tenancy\Website\Directory::class);
            //delete image update
            $directory->delete($patient->photo);

            $file = $directory->put('patient', $request->file('photo'));
            $update['photo'] = $file;
        }

        $patient->update($update);

        return redirect()->route(config('view_domain.view') . '.patients.index')
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

    /**
     * @param Request $request
     * @return array
     */
    private function patient_array(Request $request): array
    {
        //dd($request->all());
        return [
            'name_first'        => $request->get('name_first'),
            'name_second'       => $request->get('name_second'),
            'lastname_first'    => $request->get('lastname_first'),
            'lastname_second'   => $request->get('lastname_second'),
            'id_card'           => $request->get('id_card'),
            'card_type_id'      => $request->get('type_card'),
            //'photo' => $request->get('type_card'),
            'date_birth'        => $request->get('date-birth'),
            //'place_birth'   => $request->get('place-birth'),
            'country_birth'     => $request->get('country_birth'),
            'code_country_birth'=> $request->get('code_country_birth'),
            'department_birth'  => $request->get('department_birth'),
            'code_department_birth' => $request->get('code_department_birth'),
            'city_birth'        => $request->get('city_birth'),
            'code_city_birth'   => $request->get('code_city_birth'),
            'blood_group'   => $request->get('blood_group'),
            'gender'        => $request->get('gender'),
            'gender_identity' => $request->get('gender_identity'),
            'occupation'    => $request->get('occupation'),
            'code_occupation' => $request->get('code_occupation'),
            'marital_status'=> $request->get('marital-status'),
            'status'        => $request->get('status'),

            'cellphone'     => $request->get('cellphone'),
            'phone'         => $request->get('phone'),
            'email'         => $request->get('email'),
            'address'       => $request->get('address'),
            'neighborhood'  => $request->get('neighborhood'),
            'country'       => $request->get('country'),
            'code_country'  => $request->get('code_country'),
            'department'    => $request->get('department'),
            'code_department' => $request->get('code_department'),
            'city'          => $request->get('city'),
            'code_city'     => $request->get('code_city'),
            'locality'      => $request->get('locality'),
            'postcode'      => $request->get('postcode'),
            'stratum'       => $request->get('stratum'),
            'ethnicity'     => $request->get('ethnicity'),
            'ethnic_community' => $request->get('ethnic_community'),
            'uptown'        => $request->get('uptown'),

            'entity'        => $request->get('medical-entity'),
            'code_entity'   => $request->get('code_entity'),
            'contributory_regime' => $request->get('contributory-regime'),
            'status_medical' => $request->get('status-medical'),
            'opposition_organ_donation' => $request->get('opposition_organ_donation'),
            'advance_directive' => $request->get('advance_directive'),
            'code_advance_directive' => $request->get('code_advance_directive'),
            'impairment'    => $request->get('impairment'),
        ];
    }
}
