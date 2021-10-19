<?php

namespace App\Http\Controllers\Tenant\Operative\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{

    /**
     * View index Calendar
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();

        return view('tenant.operative.calendar.index', compact('user'));
    }

    /**
     * Get data of dates free operario
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function list_free_date(Request $request)
    {
        //User
        $user = Auth::user();

        //Dates day's of Operative
        $datesOperative = $user->medical_dates;

        //validate number week of date
        $weekDay = date('w', strtotime($request->date));

        //create list of dates
        $dateInterval = ($user->calendar_config->date_duration + $user->calendar_config->date_interval) * 60;
        $listDates = array();

        //dd($user->calendar_config->schedule_on);
        //Search interval schedule in configuration
        foreach ($user->calendar_config->schedule_on as $item)
        {

            if (in_array( $weekDay, $item['daysOfWeek']))
            {
                $startDate = strtotime("$request->date " . $item['startTime']);
                $endDate = strtotime("$request->date " . $item['endTime']);

                //Add posible dates
                for($date = $startDate; ($date + $dateInterval) <= $endDate; $date+= $dateInterval){

                    $startTime = date('Y-m-d H:i', $date);
                    $endTime = date('Y-m-d H:i', $date + $dateInterval );


                    //validate exist or conflict date
                    $valid = true;
                    foreach ($datesOperative as $dateOperative) {
                        if (
                            //Check that start new date is between start operative & end operative
                            (strtotime($dateOperative->start_date) <= strtotime($startTime)
                                && strtotime($dateOperative->end_date) >= strtotime($startTime))
                            or
                            //Check that end new date is between start operative & end operative
                            (strtotime($dateOperative->start_date) <= strtotime($endTime)
                                && strtotime($dateOperative->end_date) >= strtotime($endTime))
                            or
                            //Check that start operative is between start new date & end new date
                            (strtotime($startTime) <= strtotime($dateOperative->start_date)
                                && strtotime($startTime) >= strtotime($dateOperative->start_date))
                            or
                            //Check that end operative is between start new date & end new date
                            (strtotime($startTime) <= strtotime($dateOperative->end_date)
                                && strtotime($startTime) >= strtotime($dateOperative->end_date))
                        )
                        {
                            $valid = false;
                            break;
                        }
                    }

                    if ($valid)
                    {
                        //Add date in list
                        array_push($listDates, [
                            'startTime' => $startTime,
                            'endTime' => $endTime,
                            'nameOperative' => "$user->last_name $user->name"
                        ]);
                    }
                }
            }
        }
        //dd($listDates);
        return response(['data' => $listDates], Response::HTTP_OK);
    }


}
