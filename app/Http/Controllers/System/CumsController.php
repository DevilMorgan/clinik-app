<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Cums;
use Illuminate\Http\Request;
use DataTables;

class CumsController extends Controller
{

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = Cums::query()
            ->where('registration_status', '=', 1 )
            ->where('status_cum', '=', 1 );
        return datatables($query)
            ->only([
                'id',
                'active_principle',
                'product',// name
                'reference_unit',// amount total

                'role_name',// laboratory
                //'description_atc',//
                'amount', //amount from unit_measure

                'amount_cum',// amount pharmaceutical
                'unit', // measure letters
                'unit_measure', // measure letters
                'pharmaceutical_form',//unid pharmaceutical

                'via_administration',
                'action'
            ])
            ->addColumn('action', '<button type="button" class="btn btn-info add-medicine"><i class="fas fa-plus"></i></button>')
            ->toJson();
    }

}
