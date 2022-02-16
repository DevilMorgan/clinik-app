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
     * Filter database index
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = Patient::query();
        return datatables($query)
            ->only([
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
            ->toJson();
    }
}
