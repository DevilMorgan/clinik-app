<?php

namespace App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical;

use App\Http\Controllers\Controller;
use App\Models\Tenant\History_medical\HistoryMedicalCategory;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HistoryMedicalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = HistoryMedicalCategory::all();
        return view('tenant.manager.history-medical.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $models = HistoryMedicalModel::query()->where('status', '=', 1)->get(['id', 'name']);

        return view('tenant.manager.history-medical.categories.create', compact('models'));
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
            'name'      => ['required', 'min:5', 'max:45'],
            'is_various'=> ['required', 'boolean'],
            'end_records'=> ['required', 'boolean'],
            'models.*'  => ['required', 'exists:tenant.history_medical_models,id'],
            'status'    => ['required', 'boolean']
        ]);
        $category = new HistoryMedicalCategory([
            'name'          => $request->get('name'),
            'is_various'    => $request->get('is_various'),
            'end_records'   => $request->get('end_records'),
            'status'        => $request->get('status')
        ]);

        $category->save();

        $category->history_medical_modules()->sync($request->get('models'));

        return redirect()->route('tenant.manager.history-medical-categories.index')
            ->with('success', __('trans.message-create-success', ['element' => __('manager.category')]));
    }

    /**
     * Show the form for editing the specified resource.
     * @param HistoryMedicalCategory $history_medical_category
     * @return Application|Factory|View
     */
    public function edit(HistoryMedicalCategory $history_medical_category)
    {
        $models = HistoryMedicalModel::query()
            ->where('status', '=', 1)
            ->get(['id', 'name']);

        $oldModelsArray = $history_medical_category
            ->history_medical_modules()
            ->get(['history_medical_models.id'])->toArray();

        $oldModelsArray = array_column($oldModelsArray, 'id');

        return view('tenant.manager.history-medical.categories.edit',
            compact('history_medical_category', 'oldModelsArray', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param HistoryMedicalCategory $history_medical_category
     * @return RedirectResponse
     */
    public function update(Request $request, HistoryMedicalCategory $history_medical_category)
    {
        $request->validate([
            'name'      => ['required', 'min:5', 'max:45'],
            'is_various'=> ['required', 'boolean'],
            'end_records'=> ['required', 'boolean'],
            'models.*'  => ['required', 'exists:tenant.history_medical_models,id'],
            'status'    => ['required', 'boolean']
        ]);

        $history_medical_category->update([
            'name'          => $request->get('name'),
            'is_various'    => $request->get('is_various'),
            'end_records'   => $request->get('end_records'),
            'status'        => $request->get('status')
        ]);

        $history_medical_category->history_medical_modules()->sync($request->get('models'));

        return redirect()->route('tenant.manager.history-medical-categories.index')
            ->with('success', __('trans.message-update-success', ['element' => __('manager.category')]));
    }
}
