<?php

namespace App\Http\Controllers\Tenant\Operative\MedicalHistory;

use App\Http\Controllers\Controller;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\History_medical\Record;
use App\Models\Tenant\History_medical\RecordData;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('tenant.operative.history-medical.index', compact('patient', 'historyMedical'));
    }

    public function register(Request $request, $patient)
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
            'history_medical_model_id' => $request->get('history-medical')
        ]);

        return redirect()->route('tenant.operative.medical-history.create',
            ['patient' => $patient, 'history' => $historyMedical->id]);
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function create(Patient $patient, $record)
    {
//        $model = HistoryMedicalModel::query()
//            ->select('id', 'name')
//            ->with([
//                'history_medical_categories' => function ($query){
//                    return $query->select('history_medical_categories.id',
//                        'history_medical_categories.name',
//                        'history_medical_categories.is_various')
//                        ->where('status', '=', 1);
//                },
//                'history_medical_categories.history_medical_variables' => function ($query) {
//                    return $query->where('status', '=', 1);
//                },
//                'history_medical_records',
//                'history_medical_records.record_data' => function ($query) {
//                    return $query->where('end_records', '=', 1)
//                        ->orderBy('record_data.create_at', 'des')
//                        ->limit(3);
//                }
//            ])
//            ->where('status', '=', 1)
//            //->where('id', '=', 4)
//            ->first();

        $historyMedical = Record::query()
            ->with([
                'history_medical_model:id,name',
                'history_medical_model.history_medical_categories' => function ($query) {
                    return $query->where('history_medical_categories.status', '=', 1);
                },
                'history_medical_model.history_medical_categories.history_medical_variables' => function ($query) {
                    return $query->where('history_medical_variables.status', '=', 1);
                },
                'history_medical_model.history_medical_categories.history_medical_variables.record_data' => function ($query) use ($record) {
                    return $query->where('history_medical_record_id', '!=', $record)
                        //->where('history_medical_categories.end_records', '=', 1)
                        ->orderBy('record_data.created_at', 'desc')
                        ->limit(3);
                }
            ])
            ->where('id', '=', $record)
            ->first();

        //dd($historyMedical);
        return view('tenant.operative.history-medical.create',
            compact('historyMedical', 'patient', 'record'));
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
        $request->validate([
            'values.*.id' => ['required', 'exists:tenant.history_medical_variables,id']
        ]);

        //validate record
        if (empty($record)) return response(['message' => __('trans.message-save-error')], Response::HTTP_NOT_FOUND);

        $values = array();
        foreach ($request->get('values') as $item)
        {
            if (is_array($item['value']))
            {
                if ($item['value'][0] != null) $save = RecordData::query()->updateOrCreate(
                    ['history_medical_record_id' => $record->id, 'history_medical_variable_id' => $item['id']],
                    ['value' => ['label' => $item['title-value'], 'value' => $item['value']]]
                );
            } elseif (isset($item['value'])){
                $save = RecordData::query()->updateOrCreate(
                    ['history_medical_record_id' => $record->id, 'history_medical_variable_id' => $item['id']],
                    ['value' => ['label' => $item['title-value'], 'value' => $item['value']]]
                );
            }
        }

        return response(['message' => __('trans.message-save-success')], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|ResponseFactory|Response
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
