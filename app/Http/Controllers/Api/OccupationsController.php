<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\System\Occupations;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function response;

class OccupationsController extends Controller
{
    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function search(Request $request)
    {
        if (isset($request->term))
        {
            $occupations = Occupations::query()
                ->select('name','id',  'code')
                ->where('code', 'like', "%$request->term%")
                ->orWhere('name', 'like', "%$request->term%")
                ->get();
            $occupations = $occupations->toArray();
        }else{
            $occupations = array();
        }

        return response([
            'data' => $occupations,
            'message' => __('trans.message-get-list-success')
        ]);
    }
}
