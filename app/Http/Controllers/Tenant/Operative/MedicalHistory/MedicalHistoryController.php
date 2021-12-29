<?php

namespace App\Http\Controllers\Tenant\Operative\MedicalHistory;

use App\Http\Controllers\Controller;
use App\Models\Tenant\CardType;
use App\Models\Tenant\Configuration\Clinic;
use App\Models\Tenant\Configuration\Configuration;
use App\Models\Tenant\Configuration\Surgery;
use App\Models\Tenant\History_medical\Diagnosis;
use App\Models\Tenant\History_medical\HistoryMedicalDocument;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\History_medical\Prescription;
use App\Models\Tenant\History_medical\Procedure;
use App\Models\Tenant\History_medical\Record;
use App\Models\Tenant\History_medical\RecordBasicInformation;
use App\Models\Tenant\History_medical\RecordCategory;
use App\Models\Tenant\History_medical\RecordData;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use function PHPUnit\Framework\lessThanOrEqual;

class MedicalHistoryController extends Controller
{

    public function index($patient)
    {
        $patient = Patient::query()
            ->with(['history_medical_records', 'history_medical_records.history_medical_model'])
            ->where('id', '=', $patient)
            ->first();

        $historyMedical = HistoryMedicalModel::all(['id', 'name']);
        $clinics = Clinic::with('surgeries:id,number,type,clinic_id')->get(['id', 'name']);

        return view('tenant.operative.history-medical.index', compact('patient', 'historyMedical', 'clinics'));
    }

    /**
     * Create register of history medical of patient
     *
     * @param Request $request
     * @param $patient
     * @return RedirectResponse
     */
    public function create(Request $request, $patient)
    {
        //dd($request->all());
        $request->validate([
            'date-history-medical' => ['required', 'date'],
            'history-medical' => 'exists:tenant.history_medical_models,id',
        ]);
        $historyMedical = Record::query()->create([
            'date' => $request->get('date-history-medical'),
            'user_id' => Auth::user()->id,
            'patient_id' => $patient,
            'history_medical_model_id' => $request->get('history-medical'),
            'reference' => strtotime(date('Y-m-d H:i:s')) . $patient,
            'surgery_id' => $request->get('surgery'),
        ]);
        $patient = Patient::find($patient);
        $user = Auth::user();

        $basicInformation = RecordBasicInformation::query()->create([
            'record_id'             => $historyMedical->id,
            'patient_name'          => $patient->name,
            'patient_last_name'     => $patient->last_name,
            'patient_id_card'       => $patient->id_card,
            'patient_date_birth'    => $patient->date_birth,
            'patient_place_birth'   => $patient->place_birth,
            'patient_observation'   => $patient->observation,
            'patient_blood_group'   => $patient->blood_group,
            'patient_gender'        => $patient->gender,
            'patient_occupation'    => $patient->occupation,
            'patient_marital_status'=> $patient->marital_status,
            'patient_card_type_id'  => $patient->card_type_id,

            'patient_cellphone'     => $patient->cellphone,
            'patient_email'         => $patient->email,
            'patient_phone'         => $patient->phone,
            'patient_address'       => $patient->address,
            'patient_neighborhood'  => $patient->neighborhood,
            'patient_city'          => $patient->city,

            'patient_entity'                => $patient->entity,
            'patient_contributory_regime'   => $patient->contributory_regime,
            'patient_status_medical'        => $patient->status_medical,


            'user_name'         => $user->name,
            'user_last_name'    => $user->last_name,
            'user_email'        => $user->email,
            'user_id_card'      => $user->id_card,
            'user_cellphone'    => $user->cellphone,
            'user_card_type_id' => $user->card_type_id,
            'user_code_profession' => $user->code_profession,
            'user_profession'   => $user->profession
        ]);

        return redirect()->route('tenant.operative.medical-history.register',
            ['patient' => $patient->id, 'record' => $historyMedical->id]);
    }

    /**
     * Display a listing of the resource.
     * @param Patient $patient
     * @param $record
     * @return Application|Factory|View|RedirectResponse
     */
    public function register($patient,Record $record)
    {
        if (! Gate::allows('today-edit-history-medical', $record))
            return redirect()->route('tenant.operative.medical-history.index',
                ['patient' => $record->patient_id])->withErrors( __('trans.not-modify-register-history-medical'));

        $historyMedical = Record::query()
            ->with([
                'history_medical_model:id,name',
                'history_medical_model.history_medical_categories' => function ($query) {
                    return $query->where('history_medical_categories.status', '=', 1);
                },
                'history_medical_model.history_medical_categories.history_medical_variables' => function ($query) {
                    return $query->where('history_medical_variables.status', '=', 1);
                },
                'history_medical_model.history_medical_categories.record_categories' => function ($query) use ($record) {
                    return $query->where('record_id', '!=', $record->id)
                        //->where('history_medical_categories.end_records', '=', 1)
                        ->orderBy('record_categories.created_at', 'desc')
                        ->limit(3);
                },
                'history_medical_model.history_medical_categories.record_categories.record_data',
                'record_categories',
                'record_categories.record_data',
                'basic_information',
                'diagnosis',
                'diagnosis.procedures',
                'diagnosis.prescription',
            ])
            ->where('id', '=', $record->id)
            ->first();

        $patientOriginal = Patient::query()
            ->with([
                'history_medical_records' => function ($query) use ($record){
                    return $query->where('records.id', '!=', $record->id)
                        ->orderBy('created_at')
                        ->limit(3);
                },
                'history_medical_records.diagnosis',
                'history_medical_records.diagnosis.procedures',
                'history_medical_records.diagnosis.prescription',
            ])
            ->first();

        $cardTypes = CardType::all();
        //$PatientRecords = $patient->history_medical_records->diagnosis->collapse();
        //dd($patient->history_medical_records);

        return view('tenant.operative.history-medical.create',
            compact('historyMedical', 'patientOriginal', 'cardTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param Record $record
     * @return Application|ResponseFactory|Response
     */
    public function store(Request $request, Record $record)
    {
        //dd($request->all());
        if (! Gate::allows('today-edit-history-medical', $record))
            return response(['message' => __('trans.not-modify-register-history-medical')], Response::HTTP_UNPROCESSABLE_ENTITY);

        $request->validate([
            'values.*.id' => ['exists:tenant.history_medical_categories,id'],
            'values.*.data.*.id' => ['exists:tenant.history_medical_variables,id'],
        ]);

        if (empty($record)) return response(['message' => __('trans.message-save-error')], Response::HTTP_NOT_FOUND);

        //delete records categories
        $codes = explode(';', $request->get('delete-record-categories'));
        RecordCategory::query()
            ->where('record_id', '=', $record->id)
            ->whereIn('code', $codes)
//            ->with(['record_data' => function ($query) {
//                $query->delete();
//            }])
//            ->delete();
            ->each(function ($recordCategory, $key) {
                //delete records data
                $recordCategory->record_data()->delete();
                $recordCategory->delete();
            });

        $values = $request->get('values');
        if (!empty($values))
        {
            foreach ($values as $item)
            {
                foreach ($item['data'] as $key => $datum)
                {

                    $recordCategory = RecordCategory::query()->firstOrCreate(
                        [
                            'record_id' => $record->id,
                            'history_medical_category_id' => $item['id'],
                            'code' => $datum['code_category']], []
                    );

                    unset($datum['code_category']);

                    foreach ($datum as $d)
                    {
                        $save = RecordData::query()->updateOrCreate(
                            [
                                'record_category_id' => $recordCategory->id,
                                'history_medical_variable_id' => $d['id']
                            ],
                            [
                                'value' => [
                                    'label' => $d['title-value'],
                                    'value' => (isset($d['value'])) ? $d['value']:null
                                ]
                            ]
                        );
                    }

                }
            }
        }

        //Information basic
        $patient = $request->get('patient');
        $information = [
            'patient_occupation' => $patient['occupation'],
            'patient_marital_status' => $patient['marital_status'],
            'patient_cellphone' => $patient['cellphone'],
            'patient_email' => $patient['email'],
            'patient_phone' => $patient['phone'],
            'patient_address' => $patient['address'],
            'patient_neighborhood' => $patient['neighborhood'],
            'patient_city' => $patient['city'],
            'patient_entity' => $patient['entity'],
            'patient_contributory_regime' => $patient['contributory_regime'],
            'patient_status_medical' => $patient['status_medical']
        ];

        if ($request->get('responsable-required') == 'on')
        {
            $responsable = $request->get('responsable');
            $information['responsable_relationship'] = $responsable['relationship'] ?? null;
            $information['responsable_name'] = $responsable['name'] ?? null;
            $information['responsable_last_name'] = $responsable['last_name'] ?? null;
            $information['responsable_cellphone'] = $responsable['cellphone'] ?? null;
            $information['responsable_email'] = $responsable['email'] ?? null;
            $information['responsable_address'] = $responsable['address'] ?? null;
            $information['responsable_id_card'] = $responsable['id_card'] ?? null;
            $information['responsable_card_type_id'] = $responsable['card_type_id'] ?? null;
        }

        $basicInformation = $record->basic_information()->update($information);

        $diagnosis = $request->get('diagnosis');

        $diagnosis = Diagnosis::query()->updateOrCreate(['record_id' => $record->id], [
            'code'              => ($diagnosis['first']['code'] ?? null),
            'description'       => ($diagnosis['first']['description'] ?? null),
            'code_optional_one' => ($diagnosis['optional-one']['code'] ?? null),
            'description_optional_one' => ($diagnosis['optional-one']['description'] ?? null),
            'code_optional_two' => ($diagnosis['optional-two']['code'] ?? null),
            'description_optional_two' => ($diagnosis['optional-two']['description'] ?? null),
            'days_off'          => ($diagnosis['days_off'] ?? null),
            'description_days_off' => ($diagnosis['description_days_off'] ?? null),
            'abstract'          => ($diagnosis['abstract'] ?? null),
        ]);

        $codes = array();

        if ($request->get('procedures-required') == 'on' and !empty($request->get('procedures')))
        {
            foreach ($request->get('procedures') as $key => $item)
            {
                array_push($codes, $item['code'] ?? null);

                if (!empty($item['code']) and !empty($item['description']) and !empty($item['amount']) )
                    Procedure::query()->updateOrCreate(
                        ['code' => $item['code'], 'diagnosis_id' => $diagnosis->id ],
                        ['description' => $item['description'], 'amount' => $item['amount']]
                    );
            }
        }

        Procedure::query()->whereNotIn('code', $codes)
            ->where('diagnosis_id', '=', $diagnosis->id)
            ->delete();

        $medicines = $request->get('medical');
        $medicines_id = array();
        if (!empty($medicines))
        {
            foreach ($medicines as $medicine)
            {
                array_push($medicines_id, $medicine['id']);
                Prescription::query()->updateOrCreate(
                    ['cums_id' => $medicine['id'], 'diagnosis_id' => $diagnosis->id],
                    [
                        'name'      => $medicine['name'],
                        'pharmaceutical_quantity' => $medicine['pharmaceutical-quantity'],
                        'dose'      => $medicine['dose'],
                        'frequency' => $medicine['frequency'],
                        'via_administration' => $medicine['via_administration'],
                        'amount'    => $medicine['amount'],
                        'duration'  => $medicine['days'],
                        //'delivery'  => $medicine['delivery'],
                        'indications' => $medicine['indications'],
                        'recommendations'   => $medicine['recommendations'],
                    ]
                );
            }
        }

        Prescription::query()->whereNotIn('cums_id', $medicines_id)
            ->where('diagnosis_id', '=', $diagnosis->id)
            ->delete();

        return response(['message' => __('trans.message-save-success')], Response::HTTP_OK);
    }


    /*
     * @param Request $request
     * @param Record $record
     * @return RedirectResponse
     */
    public function finished(Request $request, Record $record)
    {
        if (! Gate::allows('today-edit-history-medical', $record))
            return redirect()->route('tenant.operative.medical-history.index',
                ['patient' => $record->patient_id])->withErrors( __('trans.not-modify-register-history-medical'));

        //save data
        $this->store($request, $record);

        $record->finished = true;
        $record->save();

        //generate pdf
        $config = Configuration::all();
        //Prescription
        $prescription = Prescription::query()
            ->where('diagnosis_id', '=', $record->diagnosis->id)
            ->get();

        $prescriptionPdf = HistoryMedicalDocument::query()->create([
            'code' => '12', // code of system table document_type
            //'directory' => '',
            'status' => 'original',
            'document_type_id' => '2',// id of system table document_type
            'record_id' => $record->id
        ]);

        $prescriptionData = [
            'prescriptionPdf' => $prescriptionPdf,
            'prescription' => $prescription,
            'config' => $config->keyBy('name'),
            'record' => $record
        ];

        //dd($prescriptionData['config']['NAME']);

        $generatePdf = \PDF::loadView('pdfs/prescription', $prescriptionData);

        return $generatePdf->setPaper('a4', 'portrait')
            ->stream('ejemplo.pdf');

        return redirect()->route('tenant.operative.medical-history.index',
            ['patient' => $record->patient_id])->with('success', __('trans.finished-history-medical'));
    }
}
