<?php

namespace App\Http\Controllers\Tenant\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Calendar\Agreement;
use App\Models\Tenant\Calendar\DateType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $agreements = Agreement::all();
        return view('tenant.operative.agreement.index', compact('agreements'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tenant.operative.agreement.create');
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
            'name' => ['required', 'max:100'],
            'code' => ['required']
        ]);

        Agreement::create([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('tenant.operative.agreement.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.agreement')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Agreement $agreement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Agreement $agreement)
    {
        return view('tenant.operative.agreement.edit', compact('agreement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Agreement $agreement
     * @return RedirectResponse
     */
    public function update(Request $request, Agreement $agreement)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'code' => ['required']
        ]);

        $agreement->update([
            'name' => $request->get('name'),
            'code' => $request->get('code')
        ]);

        return redirect()->route('tenant.operative.agreement.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.agreement')]));
    }

    /**
     * COnfig the co pay with agreement
     *
     * @param Agreement $agreement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function co_pay(Agreement $agreement)
    {
        $user = Auth::user();

        $dateTypes = DateType::query()
            ->where('date_types.user_id', $user->id)
            ->with(['agreements' => function($query) use ($agreement){
                return $query->where('agreements.id', $agreement->id)->oldest();
            }])->get();
        return view('tenant.operative.agreement.co-pay', compact('agreement', 'user', 'dateTypes'));
    }

    public function co_pay_save(Request $request, Agreement $agreement)
    {
        $user = Auth::user();

        $request->validate([
            'co-pay.*.price' => ['required', 'integer'],
            'co-pay.*.date_type_id' => [
                'required',
                'integer',
                Rule::exists('tenant.date_types', 'id')
                    ->where('user_id', $user->id)
            ],
            'co-pay.*.agreement_id' => [
                'required',
                'integer',
                Rule::exists('tenant.agreements', 'id')
                    ->where('user_id', $user->id)
            ],
        ]);

        $dateTypes = array();
        foreach ($request->get('co-pay') as $key => $item) $dateTypes[$key]['price'] = $item['price'];
        $agreement->date_types()->sync($dateTypes);

        return redirect()->route('tenant.operative.agreement.index')
            ->with('success', __('trans.message-update-success', ['element' => __('trans.date-type-agreements')]));
    }
}
