<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\CIE10;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CIE10Controller extends Controller
{

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function search(Request $request)
    {
        if (isset($request->term))
        {
            $CIE10 = CIE10::query()
                ->select('description as text','id',  'code')
                ->where('code', 'like', "%$request->term%")
                ->orWhere('description', 'like', "%$request->term%")
                ->get();
            $CIE10 = $CIE10->toArray();
        }else{
            $CIE10 = array();
        }

        return response([
            'data' => $CIE10,
            'message' => __('trans.message-get-list-success')
        ]);
    }
}
