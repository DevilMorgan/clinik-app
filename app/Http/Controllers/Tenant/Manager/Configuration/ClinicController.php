<?php

namespace App\Http\Controllers\Tenant\Manager\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Configuration\Clinic;
use App\Models\Tenant\Configuration\Surgery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ClinicController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $clinics = Clinic::query()
            ->get();

        return view('tenant.manager.clinics.index', compact('clinics'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('tenant.manager.clinics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'min:3', 'max:100'],
            'address'   => ['required', 'min:3', 'max:100'],
            'schedule'  => [ 'min:3', 'max:100'],
            'phone'     => [ 'min:7', 'max:15'],
            'cellphone' => [ 'min:7', 'max:15'],
            'surgeries.*.number'=> [ 'integer'],
            'surgeries.*.type'  => [ 'min:3', 'max:100'],
        ]);

        $clinic = Clinic::query()->create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'schedule' => $request->get('schedule'),
            'phone' => $request->get('phone'),
            'cellphone' => $request->get('cellphone'),
        ]);

        $surgeries = array();
        if (is_array($request->get('surgeries'))) {
            foreach ($request->get('surgeries') as $item)
            {
                array_push($surgeries, [
                    'number' => $item['number'],
                    'type' => $item['type'],
                    'clinic_id' => $clinic->id,
                ]);
            }
            Surgery::query()->upsert(
                $surgeries,
                ['number', 'clinic_id']
            );
        }

        return redirect()->route('tenant.manager.clinics.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.clinic')]));
    }

    /**
     * Show the form for editing the specified resource.
     * @param $clinic
     * @return Application|Factory|View
     */
    public function edit($clinic)
    {
        $clinic = Clinic::query()
            ->where('id', '=', $clinic)
            ->with(['surgeries' => function ($query) {
                return $query->orderBy('number', 'desc');
            }])
            ->first();

        return view('tenant.manager.clinics.edit', compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Clinic $clinic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Clinic $clinic)
    {
        $request->validate([
            'name'      => ['required', 'min:3', 'max:100'],
            'address'   => ['required', 'min:3', 'max:100'],
            'schedule'  => [ 'min:3', 'max:100'],
            'phone'     => [ 'min:7', 'max:15'],
            'cellphone' => [ 'min:7', 'max:15'],
            'surgeries.*.number'=> [ 'integer'],
            'surgeries.*.type'  => [ 'min:3', 'max:100'],
        ]);

        $clinic->update([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'schedule' => $request->get('schedule'),
            'phone' => $request->get('phone'),
            'cellphone' => $request->get('cellphone'),
        ]);

        //delete surgeries
        $surgeriesDeletes = explode(';', $request->get('surgeries-delete'));
        $s = Surgery::query()
            ->whereIn('id', $surgeriesDeletes)
            ->where('clinic_id', '=', $clinic->id)
            ->delete();

        $surgeries = array();
        if (is_array($request->get('surgeries'))) {
            foreach ($request->get('surgeries') as $item)
            {
                array_push($surgeries, [
                    'id' => (isset($item['id'])) ? $item['id']:null,
                    'number' => $item['number'],
                    'type' => $item['type'],
                    'clinic_id' => $clinic->id,
                ]);
            }
            Surgery::query()->upsert(
                $surgeries,
                ['id', 'clinic_id']
            );
        }

        return redirect()->route('tenant.manager.clinics.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.clinic')]));
    }
}
