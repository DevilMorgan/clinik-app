<?php

namespace App\Http\Controllers\System\HistoryClinic;

use App\Http\Controllers\Controller;
use App\Models\System\HistoryClinic\HcVariable;
use App\Models\System\HistoryClinic\HcVariableType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VariablesController extends Controller
{
    public function index()
    {
        $variables = HcVariable::with(['hc_variable_type:id,name'])->get();
        $variableTypes = HcVariableType::all(['id', 'name']);
        return view('system.history-clinic.variables.index', compact('variables', 'variableTypes'));
    }

    public function create(HcVariableType $type)
    {
        return view('system.history-clinic.variables.create', compact('type'));
    }

    public function store(Request $request, HcVariableType $type)
    {
        $rules = [
            'name'          => ['required', 'max:100'],
            'code'          => ['required', 'max:10'],
            'description'   => ['required'],
            'status'    => ['required', 'boolean'],
        ];

        switch ($type->id)
        {
            case 1:
                $rules['type-numeric'] = ['required', Rule::in(['integer', 'decimal'])];
                break;
            case 4:
                $rules['step']  = ['required', Rule::in(['0.001', '0.01', '0.1', '1', '2', '5'])];
                $rules['min']   = ['required', 'integer'];
                $rules['max']   = ['required', 'integer'];
                break;
            case 5:
                $rules['name-true']   = ['required'];
                $rules['name-false']   = ['required'];
                break;
            case 6:
                $rules['is_multiple']   = ['required', 'boolean'];
                $rules['list.0']        = ['required'];
                break;
            case 7:
                $rules['list.0']        = ['required'];
                break;
        }

        $request->validate($rules);

        $config = array();

        switch ($type->id)
        {
            case 1:
                $config['type-numeric'] = $request->get('type-numeric');
                break;
            case 4:
                $config['step']  = $request->get('step');
                $config['min']   = $request->get('min');
                $config['max']   = $request->get('max');
                break;
            case 5:
                $config['name-true']    = $request->get('name-true');
                $config['name-false']   = $request->get('name-false');
                break;
            case 6:
                $config['is_multiple']  = $request->get('is_multiple');
                $config['list']         = $request->get('list');
                break;
            case 7:
                $config['list']         = $request->get('list');
                break;
        }

        $variable = $request->all();
        $variable['config'] = $config;
        $variable['hc_variable_type_id'] = $type->id;

        HcVariable::query()->create($variable);

        return redirect()->route('system.history-clinic.variables.index')
            ->with('success', "Variable tipo " . __('manager.' . $type->name) . " creado correctamente");
    }

    public function edit(HcVariable $variable)
    {
        return view('system.history-clinic.variables.edit', compact('variable'));
    }

    public function update(Request $request, HcVariable $variable)
    {
        $rules = [
            'name'          => ['required', 'max:100'],
            'code'          => ['required', 'max:10'],
            'description'   => ['required'],
            'status'    => ['required', 'boolean'],
        ];

        switch ($variable->hc_variable_type_id)
        {
            case 1:
                $rules['type-numeric'] = ['required', Rule::in(['integer', 'decimal'])];
                break;
            case 4:
                $rules['step']  = ['required', Rule::in(['0.001', '0.01', '0.1', '1', '2', '5'])];
                $rules['min']   = ['required', 'integer'];
                $rules['max']   = ['required', 'integer'];
                break;
            case 5:
                $rules['name-true']   = ['required'];
                $rules['name-false']   = ['required'];
                break;
            case 6:
                $rules['is_multiple']   = ['required', 'boolean'];
                $rules['list.0']        = ['required'];
                break;
            case 7:
                $rules['list.0']        = ['required'];
                break;
        }

        $request->validate($rules);

        $config = array();

        switch ($variable->hc_variable_type_id)
        {
            case 1:
                $config['type-numeric'] = $request->get('type-numeric');
                break;
            case 4:
                $config['step']  = $request->get('step');
                $config['min']   = $request->get('min');
                $config['max']   = $request->get('max');
                break;
            case 5:
                $config['name-true']    = $request->get('name-true');
                $config['name-false']   = $request->get('name-false');
                break;
            case 6:
                $config['is_multiple']  = $request->get('is_multiple');
                $config['list']         = $request->get('list');
                break;
            case 7:
                $config['list']         = $request->get('list');
                break;
        }

        $variableData = $request->all();
        $variableData['config'] = $config;

        $variable->update($variableData);

        return redirect()->route('system.history-clinic.variables.index')
            ->with('success', 'Modulo modificado correctamente');
    }
}
