<?php

namespace App\Http\Controllers\Tenant\Operative\MedicalHistory;

use App\Http\Controllers\Controller;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\History_medical\Record;
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

        return view('tenant.operative.history-medical.index', compact('patient', 'historyMedical'));
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
            'history_medical_model_id' => $request->get('history-medical')
        ]);

        return redirect()->route('tenant.operative.medical-history.register',
            ['patient' => $patient, 'record' => $historyMedical->id]);
    }

    /**
     * Display a listing of the resource.
     * @param Patient $patient
     * @param $record
     * @return Application|Factory|View|RedirectResponse
     */
    public function register(Patient $patient,Record $record)
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
            ])
            ->where('id', '=', $record->id)
            ->first();


        return view('tenant.operative.history-medical.create',
            compact('historyMedical', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param Record $record
     * @return Application|ResponseFactory|Response
     */
    public function store(Request $request, Record $record)
    {
        if (! Gate::allows('today-edit-history-medical', $record))
            return response(['message' => __('trans.not-modify-register-history-medical')], Response::HTTP_UNPROCESSABLE_ENTITY);

        //dd($request->get('values'));

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
            ->each(function ($recordCategory, $key) {
                //delete records data
                $recordCategory->record_data()->delete();
                $recordCategory->delete();
            });

        $values = $request->get('values');

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

        return response(['message' => __('trans.message-save-success')], Response::HTTP_OK);
    }


    /**
     *
     *
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

        return redirect()->route('tenant.operative.medical-history.index',
            ['patient' => $record->patient_id])->with('success', __('trans.finished-history-medical'));
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
