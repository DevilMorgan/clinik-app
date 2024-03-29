<?php

namespace App\Http\Controllers\System\HistoryClinic;

use App\Http\Controllers\Controller;
use App\Models\System\HistoryClinic\HcModule;
use App\Models\System\HistoryClinic\HcSpecialty;
use App\Models\System\HistoryClinic\HcTemplate;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{

    public function index()
    {
        $templates = HcTemplate::all();

        return view('system.history-clinic.templates.index', compact('templates'));
    }

    public function create()
    {
        $specialties = HcSpecialty::query()
            ->where('status', '=', 1)
            ->get();

        return view('system.history-clinic.templates.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'code' => ['required', 'max:10'],
            'description' => ['required'],
            'specialties.*' => ['nullable', 'exists:specialties,id'],
            'status' => ['required', 'boolean']
        ]);

        $template = HcTemplate::query()->create([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'status' => $request->get('status')
        ]);

        $template->hc_specialties()->sync($request->get('specialties'));

        return redirect()->route('system.history-clinic.templates.index')
            ->with('success', 'Plantilla creada correctamente');
    }

    public function edit(HcTemplate $template)
    {
        $specialties = HcSpecialty::query()
            ->where('status', '=', 1)
            ->get();

        return view('system.history-clinic.templates.edit', compact('template', 'specialties'));
    }

    public function update(Request $request, HcTemplate $template)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'code' => ['required', 'max:10'],
            'description' => ['required'],
            'specialties.*' => ['nullable', 'exists:hc_specialties,id'],
            'status' => ['required', 'boolean']
        ]);

        $template->update($request->all());
        $template->hc_specialties()->sync($request->get('specialties'));

        return redirect()->route('system.history-clinic.templates.index')
            ->with('success', 'Plantilla modificada correctamente');
    }

    public function config(HcTemplate $template)
    {
        $modules = HcModule::query()->where('status', '=', 1)->get();
        return view('system.history-clinic.templates.config', compact('template', 'modules'));
    }

    public function config_save(Request $request, HcTemplate $template)
    {
        $request->validate([
            'order'     => ['required'],
            'order.*'   => ['required', 'exists:hc_modules,id']
        ],[
            'order.required' => 'Es necesario agregar módulos'
        ]);

        $order = array();
        if (!empty($request->get('order'))) foreach ($request->get('order') as $key => $item) $order[$item]['order'] = $key;

        $template->hc_modules()->sync($order);

        return redirect()->route('system.history-clinic.templates.index')
            ->with('success', 'Plantilla configurada correctamente');
    }
}
