<?php

namespace App\Http\Controllers\Tenant\Operative\MedicalHistory;

use App\Http\Controllers\Controller;
use App\Models\Tenant\History_medical\HistoryMedicalDocument;
use Illuminate\Http\Request;

class InformationMedicalHistoryController extends Controller
{
    public function index()
    {
        return view(config('view_domain.view') . '.operative.information.index');
    }

    public function days_offs()
    {
        $documents = HistoryMedicalDocument::query()
            ->where('document_type_id', '=', 3)
            ->where('status', '=', 'original')
            ->with([
                'record:id,history_medical_model_id,date',
                'record.basic_information:id,patient_name,patient_last_name,patient_id_card,record_id',
                'record.history_medical_model:id,name'
            ])
            ->get();

        return view(config('view_domain.view') . '.operative.information.days_off', compact('documents'));
    }

    public function days_off_template()
    {
        return \PDF::loadView('pdfs/days_off-template')
            ->setPaper('a4', 'portrait')
            ->stream('days_off.pdf');
    }

    public function prescriptions()
    {
        $documents = HistoryMedicalDocument::query()
            ->where('document_type_id', '=', 2)
            ->where('status', '=', 'original')
            ->with([
                'record:id,history_medical_model_id,date',
                'record.basic_information:id,patient_name,patient_last_name,patient_id_card,record_id',
                'record.history_medical_model:id,name'
            ])
            ->get();

        return view(config('view_domain.view') . '.operative.information.prescriptions', compact('documents'));
    }

    public function prescriptions_template()
    {
        return \PDF::loadView('pdfs/prescription-template')
            ->setPaper('a4', 'portrait')
            ->stream('prescriptions.pdf');
    }

    public function procedures()
    {
        $documents = HistoryMedicalDocument::query()
            ->where('document_type_id', '=', 4)
            ->where('status', '=', 'original')
            ->with([
                'record:id,history_medical_model_id,date',
                'record.basic_information:id,patient_name,patient_last_name,patient_id_card,record_id',
                'record.history_medical_model:id,name'
            ])
            ->get();

        return view(config('view_domain.view') . '.operative.information.procedures', compact('documents'));
    }

    public function procedures_template()
    {
        return \PDF::loadView('pdfs/procedure-template')
            ->setPaper('a4', 'portrait')
            ->stream('procedures.pdf');
    }
}
