<?php

namespace App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical;

use App\Http\Controllers\Controller;
use App\Models\Tenant\History_medical\HistoryMedicalCategory;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\User;
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
        return view('tenant.manager.history-medical.categories.create');
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
            'status'    => ['required', 'boolean']
        ]);

        $category = HistoryMedicalCategory::query()->create([
            'name'          => $request->get('name'),
            'is_various'    => $request->get('is_various'),
            'status'        => $request->get('status')
        ]);

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
        return view('tenant.manager.history-medical.categories.edit', compact('history_medical_category'));
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
            'status'    => ['required', 'boolean']
        ]);

        $history_medical_category->update([
            'name'          => $request->get('name'),
            'is_various'    => $request->get('is_various'),
            'status'        => $request->get('status')
        ]);

        return redirect()->route('tenant.manager.models-medical-history.index')
            ->with('success', __('trans.message-update-success', ['element' => __('manager.category')]));
    }
}
