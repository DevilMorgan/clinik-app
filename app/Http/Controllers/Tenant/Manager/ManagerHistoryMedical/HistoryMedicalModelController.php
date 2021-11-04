<?php

namespace App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Tenant\CardType;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HistoryMedicalModelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $models = HistoryMedicalModel::all();
        return view('tenant.manager.history-medical.models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('tenant.manager.history-medical.models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'min:5', 'max:15'],
            'status'    => ['required', 'boolean']
        ]);

        $model = HistoryMedicalModel::query()->create([
            'name'          => $request->get('name'),
            'status'        => $request->get('status')
        ]);

        return redirect()->route('tenant.manager.models-medical-history.index')
            ->with('success', __('trans.message-create-success', ['element' => __('manager.model')]));
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(HistoryMedicalModel $models_medical_history)
    {
        return view('tenant.manager.history-medical.models.edit', compact('models_medical_history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, HistoryMedicalModel $models_medical_history)
    {
        $request->validate([
            'name'      => ['required', 'min:5', 'max:15'],
            'status'    => ['required', 'boolean']
        ]);

        $models_medical_history->update([
            'name'          => $request->get('name'),
            'status'        => $request->get('status')
        ]);

        return redirect()->route('tenant.manager.models-medical-history.index')
            ->with('success', __('trans.message-update-success', ['element' => __('manager.model')]));
    }
}
