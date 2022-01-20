<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\System\Sgsss;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function response;

class SgsssController extends Controller
{
    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function search(Request $request)
    {
        if (isset($request->term))
        {
            $sgsss = Sgsss::query()
                ->select('name','id',  'code')
                ->where('code', 'like', "%$request->term%")
                ->orWhere('name', 'like', "%$request->term%")
                ->get();
            $sgsss = $sgsss->toArray();
        }else{
            $sgsss = array();
        }

        return response([
            'data' => $sgsss,
            'message' => __('trans.message-get-list-success')
        ]);
    }
}
