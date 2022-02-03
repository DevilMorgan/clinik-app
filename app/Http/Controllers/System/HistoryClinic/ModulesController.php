<?php

namespace App\Http\Controllers\System\HistoryClinic;

use App\Http\Controllers\Controller;
use App\Models\System\HistoryClinic\HcModule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ModulesController extends Controller
{
    public function index()
    {
        $modules = HcModule::all();
        return view('system.history-clinic.modules.index', compact('modules'));
    }

    public function create()
    {
        return view('system.history-clinic.modules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'max:100'],
            'code'          => ['required', 'max:10'],
            'description'   => ['required'],
            'type'          => ['required', Rule::in(['basic', 'multiple', 'segmented'])],
            'is_required'   => ['required', 'boolean'],
            'is_end_records'=> ['required', 'boolean'],
            'status'        => ['required', 'boolean']
        ]);

        HcModule::query()->create($request->all());

        return redirect()->route('system.history-clinic.modules.index')
            ->with('success', 'Modulo creado correctamente');
    }

    public function edit(HcModule $module)
    {
        return view('system.history-clinic.modules.edit', compact('module'));
    }

    public function update(Request $request, HcModule $module)
    {
        $request->validate([
            'name'          => ['required', 'max:100'],
            'code'          => ['required', 'max:10'],
            'description'   => ['required'],
            'type'          => ['required', Rule::in(['basic', 'multiple', 'segmented'])],
            'is_required'   => ['required', 'boolean'],
            'is_end_records'=> ['required', 'boolean'],
            'status'        => ['required', 'boolean']
        ]);

        $module->update($request->all());

        return redirect()->route('system.history-clinic.modules.index')
            ->with('success', 'Modulo modificado correctamente');
    }
}
