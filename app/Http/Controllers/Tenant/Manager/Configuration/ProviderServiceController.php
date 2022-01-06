<?php

namespace App\Http\Controllers\Tenant\Manager\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Tenant\CardType;
use App\Models\Tenant\Configuration\Configuration;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProviderServiceController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $perfil = Configuration::query()
            ->where('modify', '=', 1)
            ->get();

        $perfil = $perfil->keyBy('name');

        //dd($perfil);
        $card_types = CardType::all();

        return view('tenant.manager.provider-service.index', compact('perfil', 'card_types'));
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'  => ['required'],
            'phone' => ['required', 'min:7'],
            'id_card' => ['required'],
            'type_card' => ['required', 'exists:tenant.card_types,id'],
            'type_taxpayer' => ['required', Rule::in(['natural', 'jurídica'])],
            'email' => ['required', 'email'],
            'city'  => ['required']
        ]);

        //variables
        $save = [
            [
                'name'  => 'NAME',
                'config_data' => ['value' => $request->get('name')]
            ],
            [
                'name'  => 'PHONE',
                'config_data' => ['value' => $request->get('phone')]
            ],
            [
                'name'  => 'TYPE_CARD',
                'config_data' => ['value' => $request->get('type_card')]
            ],
            [
                'name'  => 'ID_CARD',
                'config_data' => ['value' => $request->get('id_card')]
            ],
            [
                'name'  => 'TYPE_TAXPAYER',
                'config_data' => ['value' => $request->get('type_taxpayer')]
            ],
            [
                'name'  => 'EMAIL',
                'config_data' => ['value' => $request->get('email')]
            ],
            [
                'name'  => 'COUNTRY',
                'config_data' => ['value' => $request->get('country')]
            ],
            [
                'name'  => 'DEPARTMENT',
                'config_data' => ['value' => $request->get('department')]
            ],
            [
                'name'  => 'CITY',
                'config_data' => ['value' => $request->get('city')]
            ]
        ];

        if ($request->file('logo')) {
            $request->validate([
                'logo' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $directory = app(\Hyn\Tenancy\Website\Directory::class);
            $path = 'public/config/';

            $file = $directory->put($path, $request->logo);

            $save[] = [
                'name'  => 'LOGO',
                'config_data' => ['value' => $file],
            ];
        }

        foreach ($save as $item){
            Configuration::query()->updateOrCreate(
                ['name' => $item['name'], 'modify' => true],
                ['modify' => true, 'config_data' => $item['config_data']]
            );
        }

        return redirect()->route('tenant.manager.provider-service.index')
            ->with('success', __('trans.message-save-success'));
    }

}
