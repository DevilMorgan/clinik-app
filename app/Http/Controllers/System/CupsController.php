<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Cups;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CupsController extends Controller
{
    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function search(Request $request)
    {
        if (isset($request->term))
        {
            $cups = Cups::query()
                //->select('description as text','id',  'code')
                ->select('description as text', 'code as id')
                ->where('code', 'like', "%$request->term%")
                ->orWhere('description', 'like', "%$request->term%")
                ->get();
            $cups = $cups->toArray();
        }else{
            $cups = array();
        }

        return response([
            'data' => $cups,
            'message' => __('trans.message-get-list-success')
        ]);
    }
}
