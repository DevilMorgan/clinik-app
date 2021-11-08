<?php

namespace App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical;

use App\Http\Controllers\Controller;
use App\Models\Tenant\History_medical\HistoryMedicalCategory;
use App\Models\Tenant\History_medical\HistoryMedicalVariable;
use App\Models\Tenant\History_medical\VariableType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HistoryMedicalVariableController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $variableTypes = VariableType::query()->where('status', '=', 1)->get();
        $variables = HistoryMedicalVariable::all();
        return view('tenant.manager.history-medical.variables.index',
            compact('variables', 'variableTypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create(VariableType $type)
    {
        $categories = HistoryMedicalCategory::query()
            ->where('status', '=', 1)
            ->get(['id', 'name']);

        return view('tenant.manager.history-medical.variables.create',
            compact('type', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, VariableType $type)
    {
        $rules = [
            'name'      => ['required', 'min:5', 'max:45'],
            'category'  => ['required', 'exists:tenant.history_medical_categories,id'],
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
                $rules['value-true']   = ['required'];
                $rules['name-false']   = ['required'];
                $rules['value-false']   = ['required'];
                break;
            case 6:
                $rules['is_multiple']   = ['required', 'boolean'];
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
                $config['value-true']   = $request->get('value-true');
                $config['name-false']   = $request->get('name-false');
                $config['value-false']   = $request->get('value-false');
                break;
            case 6:
                $config['is_multiple']  = $request->get('is_multiple');
                $config['list']         = $request->get('list');
                break;
        }

        $variable = HistoryMedicalVariable::query()->create([
            'name'      => $request->name,
            'status'    => $request->get('status'),
            'config'    => $config,
            'history_medical_category_id'   => $request->get('category'),
            'variable_type_id'              => $type->id,
        ]);

        return redirect()->route('tenant.manager.history-medical-variables.index')
            ->with('success', __('trans.message-create-success', ['element' => __('manager.variable')]));
    }

    /**
     * Show the form for editing the specified resource.
     * @param HistoryMedicalVariable $variable
     * @return Application|Factory|View
     */
    public function edit(HistoryMedicalVariable $variable)
    {
        $categories = HistoryMedicalCategory::query()
            ->where('status', '=', 1)
            ->get(['id', 'name']);


        return view('tenant.manager.history-medical.variables.edit',
            compact('variable', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  HistoryMedicalVariable $variable
     * @return RedirectResponse
     */
    public function update(Request $request, HistoryMedicalVariable $variable)
    {
        $rules = [
            'name'      => ['required', 'min:5', 'max:45'],
            'category'  => ['required', 'exists:tenant.history_medical_categories,id'],
            'status'    => ['required', 'boolean'],
        ];

        switch ($variable->variable_type_id)
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
                $rules['value-true']   = ['required'];
                $rules['name-false']   = ['required'];
                $rules['value-false']   = ['required'];
                break;
            case 6:
                $rules['is_multiple']   = ['required', 'boolean'];
                $rules['list.0']        = ['required'];
                break;
        }

        $request->validate($rules);

        $config = array();

        switch ($variable->variable_type_id)
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
                $config['value-true']   = $request->get('value-true');
                $config['name-false']   = $request->get('name-false');
                $config['value-false']   = $request->get('value-false');
                break;
            case 6:
                $config['is_multiple']  = $request->get('is_multiple');
                $config['list']         = $request->get('list');
                break;
        }

        $variable->update([
            'name'      => $request->get('name'),
            'status'    => $request->get('status'),
            'config'    => $config,
            'history_medical_category_id'   => $request->get('category'),
        ]);

        return redirect()->route('tenant.manager.history-medical-variables.index')
            ->with('success', __('trans.message-update-success', ['element' => __('manager.variable')]));
    }
}
