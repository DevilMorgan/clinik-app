<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\System\City;
use App\Models\System\Country;
use App\Models\System\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationController extends Controller
{

    /**
     * @return Application|ResponseFactory|Response
     */
    public function countries(Request $request)
    {
        $countries = Country::query()->where('name', 'like', "%{$request->term}%")->get();
        return response(['data' => $countries], Response::HTTP_OK);
    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function departments(Request $request)
    {
        $departments = Department::query()
            ->where('name', 'like', "%{$request->term}%")
            ->whereHas('country', function ($query) use ($request) {
                if (isset($request->country)) return $query->where('countries.name', 'like', "%{$request->country}%");
            }
            )->get();
        return response(['data' => $departments], Response::HTTP_OK);
    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function cities(Request $request)
    {
        $cities = City::query()
            ->where('name', 'like', "%{$request->term}%")
            ->whereHas('department', function ($query) use ($request) {
                if (isset($request->department)) return $query->where('name', 'like', "%{$request->department}%");
            }
            )->get();

        return response(['data' => $cities], Response::HTTP_OK);
    }
}
