<?php

namespace App\Http\Controllers\Tenant\Operative\MedicalHistory;

use App\Http\Controllers\Controller;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{

    public function index($patient)
    {
        $patient = Patient::query()
            ->with(['history_medical_records', 'history_medical_records.history_medical_model'])
            ->where('id', '=', $patient)
            ->first();

        return view('tenant.operative.history-medical.index', compact('patient'));
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $model = HistoryMedicalModel::query()
            ->select('id', 'name')
            ->with([
                'history_medical_categories' => function ($query){
                    return $query->select('history_medical_categories.id', 'history_medical_categories.name', 'history_medical_categories.is_various')
                        ->where('status', '=', 1);
                },
                'history_medical_categories.history_medical_variables' => function ($query) {
                    return $query->select('history_medical_variables.id', 'history_medical_variables.name',
                        'history_medical_variables.config', 'history_medical_variables.variable_type_id',
                        'history_medical_variables.history_medical_category_id')
                        ->where('status', '=', 1);
                },
                'history_medical_categories.history_medical_records' => function ($query) {
                    return $query->select('history_medical_records.id', 'history_medical_records.date',
                        'history_medical_records.history_medical_category_id',
                        'history_medical_records.user_id',
                        'history_medical_records.patient_id');
                },
                'history_medical_categories.history_medical_records.record_data' => function ($query) {
                    return $query->select('record_data.id', 'record_data.value',
                        'record_data.history_medical_record_id',
                        'record_data.history_medical_variable_id');
                }
            ])
            ->where('status', '=', 1)
            ->where('id', '=', 4)
            ->first();
        return view('tenant.operative.history-medical.index', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
