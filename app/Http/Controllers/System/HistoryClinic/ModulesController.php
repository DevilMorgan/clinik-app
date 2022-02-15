<?php

namespace App\Http\Controllers\System\HistoryClinic;

use App\Http\Controllers\Controller;
use App\Models\System\HistoryClinic\HcModule;
use App\Models\System\HistoryClinic\HcVariable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function search(Request $request)
    {
        $term = $request->get('term');
        if (!empty($term))
        {
            $module = HcModule::query()
                ->where('status', '=', 1)
                ->where('id', '=', $term)
                ->with('hc_variables')
                ->first(['id', 'name', 'description', 'code', 'type', 'is_required', 'is_end_records'])->toArray();

            $module['url'] = route('system.history-clinic.modules.edit', ['module' => $module['id']]);

            return response($module, Response::HTTP_OK);
        }
        return response([], Response::HTTP_OK);
    }

    public function config(HcModule $module)
    {
        $variables = HcVariable::query()->where('status', '=', 1)->get();
        return view('system.history-clinic.modules.config', compact('module', 'variables'));
    }

    public function config_save(Request $request, HcModule $module)
    {
        $request->validate([
            'order'     => ['required'],
            'order.*'   => ['required', 'exists:hc_variables,id']
        ],[
            'order.required' => 'Es necesario agregar variables'
        ]);

        $order = array();
        if (!empty($request->get('order'))) foreach ($request->get('order') as $key => $item) $order[$item]['order'] = $key;

        $module->hc_variables()->sync($order);

        return redirect()->route('system.history-clinic.modules.index')
            ->with('success', 'Modulo configurado correctamente');
    }
}
