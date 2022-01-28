<?php

namespace App\Http\Controllers\Tenant\Manager\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Tenant\CardType;
use App\Models\Tenant\Configuration\Agreement;
use App\Models\Tenant\Calendar\DateType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $agreements = Agreement::all();
        return view(config('view_domain.view') . '.manager.agreement.index', compact('agreements'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $card_types = CardType::all();
        return view(config('view_domain.view') . '.manager.agreement.create', compact('card_types'));
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
            'name'          => ['required', 'max:100'],
            'second_name'   => ['max:50'],
            'first_lastname'=> ['max:50'],
            'second_lastname'=> ['max:50'],
            'email'         => ['required', 'max:100', 'email'],
            'email_optional'=> ['max:100', 'email'],
            'code'          => ['required', 'max:100'],
            'type_card'     => ['required', 'max:100'],
            'id_card'       => ['required', 'max:50'],
            'code_agreement'=> ['required', 'max:100'],
            'country'       => ['max:100'],
            'department'    => ['max:100'],
            'city'          => ['max:100'],
            'neighborhood'  => ['max:100'],
            'address'       => ['required', 'max:100'],
            'address_type'  => [Rule::in(['house', 'office', 'surgery'])],
            'postcode'      => ['max:10'],
            'economic_activity' => ['max:100'],
            'business_type' => [Rule::in(['private', 'public', 'mix'])]
        ]);

        Agreement::create([
            'name'              => $request->get('name'),
            'second_name'       => $request->get('second_name'),
            'first_lastname'    => $request->get('first_lastname'),
            'second_lastname'   => $request->get('second_lastname'),
            'email'             => $request->get('email'),
            'email_optional'    => $request->get('email_optional'),
            'code'              => $request->get('code'),
            'card_type_id'      => $request->get('type_card'),
            'id_card'           => $request->get('id_card'),
            'country'           => $request->get('country'),
            'department'        => $request->get('department'),
            'city'              => $request->get('city'),
            'neighborhood'      => $request->get('neighborhood'),
            'address'           => $request->get('address'),
            'address_type'      => $request->get('address_type'),
            'postcode'          => $request->get('postcode'),
            'code_agreement'    => $request->get('code_agreement'),
            'economic_activity' => $request->get('economic_activity'),
            'business_type'     => $request->get('business_type'),
        ]);

        return redirect()->route('tenant.operative.agreement.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.agreement')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Agreement $agreement
     * @return Application|Factory|View
     */
    public function edit(Agreement $agreement)
    {
        $card_types = CardType::all();
        return view(config('view_domain.view') . '.manager.agreement.edit', compact('agreement', 'card_types'));
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
            'name'          => ['required', 'max:100'],
            'second_name'   => ['max:50'],
            'first_lastname'=> ['max:50'],
            'second_lastname'=> ['max:50'],
            'email'         => ['required', 'max:100', 'email'],
            'email_optional'=> ['max:100', 'email'],
            'code'          => ['required', 'max:100'],
            'type_card'     => ['required', 'max:100'],
            'id_card'       => ['required', 'max:50'],
            'code_agreement'=> ['required', 'max:100'],
            'country'       => ['max:100'],
            'department'    => ['max:100'],
            'city'          => ['max:100'],
            'neighborhood'  => ['max:100'],
            'address'       => ['required', 'max:100'],
            'address_type'  => [Rule::in(['house', 'office', 'surgery'])],
            'postcode'      => ['max:10'],
            'economic_activity' => ['max:100'],
            'business_type' => [Rule::in(['private', 'public', 'mix'])]
        ]);

        $agreement->update([
            'name'              => $request->get('name'),
            'second_name'       => $request->get('second_name'),
            'first_lastname'    => $request->get('first_lastname'),
            'second_lastname'   => $request->get('second_lastname'),
            'email'             => $request->get('email'),
            'email_optional'    => $request->get('email_optional'),
            'code'              => $request->get('code'),
            'card_type_id'      => $request->get('type_card'),
            'id_card'           => $request->get('id_card'),
            'country'           => $request->get('country'),
            'department'        => $request->get('department'),
            'city'              => $request->get('city'),
            'neighborhood'      => $request->get('neighborhood'),
            'address'           => $request->get('address'),
            'address_type'      => $request->get('address_type'),
            'postcode'          => $request->get('postcode'),
            'code_agreement'    => $request->get('code_agreement'),
            'economic_activity' => $request->get('economic_activity'),
            'business_type'     => $request->get('business_type'),
        ]);

        return redirect()->route('tenant.operative.agreement.index')
            ->with('success', __('trans.message-create-success', ['element' => __('trans.agreement')]));
    }

    /**
     * COnfig the co pay with agreement
     *
     * @param Agreement $agreement
     * @return Application|Factory|View
     */
    public function co_pay(Agreement $agreement)
    {
        $user = Auth::user();

        $dateTypes = DateType::query()
            ->where('date_types.user_id', $user->id)
            ->with(['agreements' => function($query) use ($agreement){
                return $query->where('agreements.id', $agreement->id)->oldest();
            }])->get();
        return view(config('view_domain.view') . '.manager.agreement.co-pay', compact('agreement', 'user', 'dateTypes'));
    }

    public function co_pay_save(Request $request, Agreement $agreement)
    {

        $request->validate([
            'co-pay.*.agreement_fee' => ['required', 'integer'],
            'co-pay.*.moderating_fee' => ['required', 'integer'],
            'co-pay.*.date_type_id' => [
                'required',
                'integer',
                Rule::exists('tenant.date_types', 'id')
            ],
            'co-pay.*.agreement_id' => [
                'required',
                'integer',
                Rule::exists('tenant.agreements', 'id')
            ],
        ]);

        $dateTypes = array();
        foreach ($request->get('co-pay') as $key => $item) {
            $dateTypes[$key]['agreement_fee'] = $item['agreement_fee'];
            $dateTypes[$key]['moderating_fee'] = $item['moderating_fee'];
        }
        $agreement->date_types()->sync($dateTypes);

        return redirect()->route('tenant.operative.agreement.index')
            ->with('success', __('trans.message-update-success', ['element' => __('trans.date-type-agreements')]));
    }
}
