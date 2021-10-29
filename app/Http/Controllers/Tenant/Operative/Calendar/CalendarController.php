<?php

namespace App\Http\Controllers\Tenant\Operative\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Calendar\CalendarConfig;
use App\Models\Tenant\Calendar\MedicalDate;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CalendarController extends Controller
{

    /**
     * View index Calendar
     *
     */
    public function index()
    {
        $user = Auth::user();


        if (!isset($user->calendar_config) or !is_array($user->calendar_config->schedule_on)
            or empty($user->calendar_config->date_duration) or empty($user->calendar_config->date_interval))
            return redirect()->route('tenant.operative.calendar.config-calendar')
            ->with('warning', __('trans.message-calendar-config'));

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
        //Validate date
        $validate = Validator::make($request->all(), [
            'date'  => ['required', 'date_format:Y-m-d']
        ]);
        if ($validate->fails()) {
            return response(['error' =>  $validate->errors()->first('date')], Response::HTTP_NOT_FOUND);
        }

        //User
        $user = Auth::user();

        //Dates day's of Operative
        $datesOperative = $user->medical_dates;

        //validate number week of date
        $weekDay = date('w', strtotime($request->date));

        //create list of dates
        $dateInterval = ($user->calendar_config->date_duration + $user->calendar_config->date_interval) * 60;
        $listDates = array();

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

        return response(['data' => $listDates], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function create_date(Request $request)
    {
        $all = array_merge($request->all(), ['date' => json_decode($request->get('new-date'), true)]);
        //Validate date
        $validate = Validator::make($all, [
            'date.*'  => ['required', 'date_format:Y-m-d H:i'],
            'patient'   => ['required', 'exists:tenant.users,id_card'],
            'description'  => ['required'],
            'place'  => ['required'],
        ]);

        if ($validate->fails()) {
            return response(['error' =>  $validate->errors()->all()], Response::HTTP_NOT_FOUND);
        }

        //user
        $user = Auth::user();

        //validate date free
        $date_count = MedicalDate::where('user_id', '=', $user->id)
            //->whereDate('start_date', '=', date('Y-m-d', strtotime($all['date']['start'])))
            ->where(function ($query) use ($all){
                $query->whereRaw('(start_date >= "' . date('Y-m-d H:i', strtotime($all['date']['start'])) .
                    '" and start_date < "' . date('Y-m-d H:i', strtotime($all['date']['end'])) . '")')
                    ->orWhereRaw('(end_date > "' . date('Y-m-d H:i', strtotime($all['date']['start'])) .
                        '" and end_date <= "' . date('Y-m-d H:i', strtotime($all['date']['end'])) . '")')
                    ->orWhereRaw('(start_date <= "' . date('Y-m-d H:i', strtotime($all['date']['start'])) .
                        '" and end_date > "' . date('Y-m-d H:i', strtotime($all['date']['start'])) . '")')
                    ->orWhereRaw('(start_date < "' . date('Y-m-d H:i', strtotime($all['date']['end'])) .
                        '" and end_date >= "' . date('Y-m-d H:i', strtotime($all['date']['end'])) . '")');
            })->count();

        if ($date_count > 0)
        {
            return response(['error' => __('calendar.date-not-free')], Response::HTTP_NOT_FOUND);
        }

        $date = MedicalDate::create([
            'start_date' => date('Y-m-d H:i', strtotime($all['date']['start'])),
            'end_date' => date('Y-m-d H:i', strtotime($all['date']['end'])),
            'type_date' => 'cita',
            'description' => $all['description'],
            'place' => $all['place'],
            'user_id' => $user->id,
            'patients_id' => Patient::select('id')->where('id_card', '=', $all['patient'])->where('status', '=', 1)->first()->id
        ]);

        return response(['message' => __('calendar.date-create')], Response::HTTP_CREATED);
    }


    /**
     * View Config Calendar
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function config_calendar()
    {
        //get user
        $user = Auth::user();

        //get config calendar
        $config = $user->calendar_config;

        //create congi of calendar
        if (!$config)
        {
            $config = new CalendarConfig();
            $config->user_id = $user->id;
            $config->schedule_on = '[]';
            $config->save();
        }

        return view('tenant.operative.calendar.config', compact('user', 'config'));
    }

    /**
     * Save config of date
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function config_date(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'date-duration' => ['required', 'integer'],
            'date-after' => ['required', 'integer']
        ]);

        if ($validator->failed())
        {
            return response(['error' => $validator->errors()->all()], Response::HTTP_NOT_FOUND);
        }

        //user
        $user = Auth::user();

        //Update date
        $user->calendar_config->date_duration = $request->get('date-duration');
        $user->calendar_config->date_interval = $request->get('date-after');
        $user->calendar_config->save();

        return response(['message' => __('calendar.config-date-confirmation')], Response::HTTP_ACCEPTED);
    }


    /**
     * Save new schedule
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function add_schedule(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'week.*'    => ['required', Rule::in([0, 1, 2, 3, 4, 5, 6])],
            'startTime'=> ['required', 'date_format:H:i'],
            'endTime'=> ['required', 'date_format:H:i']
        ]);

        if ($validator->failed())
        {
            return response(['error' => $validator->errors()->all()], Response::HTTP_NOT_FOUND);
        }

        //user
        $user = Auth::user();

        $schedule[] = [
            'id' => strtotime(date('Y-m-d H:i:s')),
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'daysOfWeek' => $request->week,
        ];

        //add schedule
        if (is_array($user->calendar_config->schedule_on))
        {
            $user->calendar_config->schedule_on = array_merge($user->calendar_config->schedule_on, $schedule);
        } else {
            $user->calendar_config->schedule_on = $schedule;
        }


        $user->calendar_config->save();

        //parce days in text
        foreach ($schedule[0]['daysOfWeek'] as $key => $item) $schedule[0]['daysOfWeek'][$key] = daysWeekText($item);

        return response(['message' => __('calendar.add-schedule-confirmation'), 'item' => $schedule[0]], Response::HTTP_ACCEPTED);
    }

    /**
     * Delete schedule
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function delete_schedule(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'id'    => ['required', 'integer'],
        ]);

        if ($validator->failed())
        {
            return response(['error' => $validator->errors()->all()], Response::HTTP_NOT_FOUND);
        }

        //user
        $user = Auth::user();
        //schedule
        $schedule = $user->calendar_config->schedule_on;

        //delete schedule
        $key_schedule_delete = array_search($request->id, array_column($schedule, 'id'));
        unset($schedule[$key_schedule_delete]);

        //save
        $user->calendar_config->schedule_on = $schedule;
        $user->calendar_config->save();

        return response(['message' => __('calendar.delete-schedule-confirmation')], Response::HTTP_OK);
    }


}
