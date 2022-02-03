<?php

namespace App\Http\Controllers\System\HistoryClinic;

use App\Http\Controllers\Controller;
use App\Models\System\HistoryClinic\HcSpecialty;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{
    public function index()
    {
        $specialties = HcSpecialty::all();
        return view('system.history-clinic.specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('system.history-clinic.specialties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'max:100'],
            'status'        => ['required', 'boolean']
        ]);

        HcSpecialty::query()->create($request->all());

        return redirect()->route('system.history-clinic.specialties.index')
            ->with('success', 'Especialidad creada correctamente');
    }

    public function edit(HcSpecialty $specialty)
    {
        return view('system.history-clinic.specialties.edit', compact('specialty'));
    }

    public function update(Request $request, HcSpecialty $specialty)
    {
        $request->validate([
            'name'          => ['required', 'max:100'],
            'status'        => ['required', 'boolean']
        ]);

        $specialty->update($request->all());

        return redirect()->route('system.history-clinic.specialties.index')
            ->with('success', 'Especialidad modificada correctamente');
    }
}
