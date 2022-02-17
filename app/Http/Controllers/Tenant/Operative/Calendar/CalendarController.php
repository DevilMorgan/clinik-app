<?php

namespace App\Http\Controllers\Tenant\Operative\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Calendar\CalendarConfig;
use App\Models\Tenant\Calendar\DateType;
use App\Models\Tenant\Calendar\MedicalDate;
use App\Models\Tenant\Configuration\Agreement;
use App\Models\Tenant\Patient\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        //validate config calendar
        if (!isset($user->calendar_config) or !is_array($user->calendar_config->schedule_on)
            or empty($user->calendar_config->date_duration) or empty($user->calendar_config->date_interval))
            return redirect()->route('tenant.operative.calendar.config-calendar')
                ->with('warning', __('trans.message-calendar-config'));

        $weekNotBusiness = array();
        foreach (array_column($user->calendar_config->schedule_on, 'daysOfWeek') as $item)
            $weekNotBusiness = array_merge($weekNotBusiness, $item);

        $agreements = Agreement::all();

        $weekNotBusiness = array_unique($weekNotBusiness);

        return view('tenant.operative.calendar.index', compact('user', 'weekNotBusiness', 'agreements'));
    }

    /**
     * Get data of dates free operario
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
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
     * Get events upload
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function upload_date(Request $request)
    {
        $dates = MedicalDate::query()
            ->select(['id', 'start_date as start', 'end_date as end', 'status'])
            ->selectRaw('CASE type_date WHEN "reservado" THEN "background" WHEN "cita" THEN "auto" END AS display')
            ->addSelect([
                'type-date' => DateType::query()
                    ->select('date_types.name')
                    ->whereColumn('date_type_id', 'date_types.id')
                    ->take(1)
            ])
            ->addSelect([
                'title' => Patient::query()
                    ->selectRaw('concat(patients.name, " ", patients.last_name)')
                    ->whereColumn('patient_id', 'patients.id')
                    ->take(1)
            ])
            //->addSelect('concat(type-date, " ", patient)')
            ->where('start_date', '>=', date('Y-m-d') . " 00:00")
            ->where(function ($query){
                return $query->where('status', 4)
                    ->orWhereNull('status');
            })
            ->get();

        return response($dates->toArray(), Response::HTTP_OK);
    }

    /**
     * calculate price of date
     *
     * @param $date_type
     * @param false $agreement
     * @return Application|ResponseFactory|Response
     */
    public function calc_money($date_type, bool $agreement = false)
    {
        $all['date_type'] = $date_type;
        if ($agreement != false) $all['agreement'] = $agreement;
        $validator = Validator::make($all, [
            'date_type' => ['required', 'exists:tenant.date_types,id'],
            'agreement' => ['exists:tenant.agreements,id'],
        ]);

        if ($validator->fails()) return response([
            'error' => $validator->errors()
        ], Response::HTTP_NOT_FOUND);

        $money = DateType::query()->select('price')->where('id', $date_type);

        if (!empty($agreement)) {
            $money->addSelect([
                'price_agreement' => DB::connection('tenant')
                    ->table('date_types_agreements')
                    ->select('date_types_agreements.price')
                    ->whereColumn('date_type_id', 'date_types.id')
                    ->where('agreement_id', '=', $agreement)
                    ->take(1)
                //->get()
            ]);
        }

        $result = $money->first();

        if (isset($result->price_agreement))
        {
            if ( $result->price_agreement > $result->price)
            {
                return response(['message' => __('trans.message-error-money')], Response::HTTP_NOT_FOUND);
            }
            return response(['money' => $result->price - $result->price_agreement], Response::HTTP_OK);
        }

        return response(['money' => $result->price], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function create_date(Request $request)
    {
        $all = array_merge($request->all(), ['date' => json_decode($request->get('new-date'), true)]);

        //Validate date
        $validate = Validator::make($all, [
            'date.*'  => ['required', 'date_format:Y-m-d H:i'],
            'id_card'   => ['required', 'exists:tenant.patients,id_card'],
            'date-type'  => ['required', 'exists:tenant.date_types,id'],
            'consent'  => ['required', 'exists:tenant.consents,id'],
            'agreement'  => ['exists:tenant.agreements,id'],
            'place'  => ['required'],
            //'description'  => ['required'],
            'money'  => ['required'],
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

        $patient = Patient::select('id')->where('id_card', '=', $all['id_card'])->where('status', '=', 1)->first();

        //dd($all);

        $query = [
            'start_date'    => date('Y-m-d H:i', strtotime($all['date']['start'])),
            'end_date'      => date('Y-m-d H:i', strtotime($all['date']['end'])),
            'type_date'     => 'cita',
            'place'         => $all['place'],
            'description'   => $all['description'],
            'money'         => $all['money'],
            'user_id'       => $user->id,
            'patient_id'    => $patient->id,
            'date_type_id'  => (isset($all['date-type'])) ? $all['date-type']:null,
            'consent_id'    => (isset($all['consent'])) ? $all['consent']:null,
            'agreement_id'  => (isset($all['agreement'])) ? $all['agreement']:null,
        ];

        $date = MedicalDate::create($query);

        return response([
            'message' => __('calendar.date-create'),
            'event' => [
                'start' => '',
                'end' => '',
                'display' => '',
                'title' => $patient->full_name
            ]], Response::HTTP_CREATED);
    }

    /**
     * Search for edit date
     *
     * @param MedicalDate $date
     * @return Application|ResponseFactory|Response
     */
    public function edit_date($id){

        $date = MedicalDate::query()
            ->with('patient:id,name,last_name,id_card,email')
            ->where('id', $id)
            ->first();

        return response(['date' => $date->toArray()], Response::HTTP_OK);
    }

    /**
     * Update date
     *
     * @param Request $request
     * @param MedicalDate $date
     * @return Application|ResponseFactory|Response
     */
    public function update_date(Request $request, MedicalDate $date)
    {
        //Validate date
        $validate = Validator::make($request->all(), [
            'date-type'  => ['required', 'exists:tenant.date_types,id'],
            'consent'  => ['required', 'exists:tenant.consents,id'],
            'agreement'  => ['exists:tenant.agreements,id'],
            'place'  => ['required'],
            'money'  => ['required'],
        ]);

        if ($validate->fails()) return response([
            'error' =>  $validate->errors()->all()
        ], Response::HTTP_NOT_FOUND);

        $query = [
            'place'         => $request->place,
            'description'   => $request->description,
            'money'         => $request->money,
            'date_type_id'  => $request->get('date-type'),
            'consent_id'    => $request->get('consent'),
            'agreement_id'  => $request->get('agreement'),
        ];

        $date->update($query);
        return response(['message' => __('calendar.date-edit'),], Response::HTTP_OK);
    }

    /**
     * Search for edit date
     *
     * @param MedicalDate $date
     * @return Application|ResponseFactory|Response
     */
    public function cancel_date($id){

        $date = MedicalDate::query()
            ->with(['patient:id,name,last_name,id_card,email', 'date_type:id,name'])
            //->with()
            ->where('id', $id)
            ->first(['start_date', 'end_date', 'type_date', 'patient_id', 'date_type_id']);

        return response(['date' => $date->toArray()], Response::HTTP_OK);
    }

    /**
     * confirm cancel date
     *
     * @param MedicalDate $date
     * @return Application|ResponseFactory|Response
     */
    public function confirm_cancel_date(MedicalDate $date)
    {
        $date->update([
            'status' => 'cancelado'
        ]);

        return response(['message' => __('calendar.date-cancel'),], Response::HTTP_OK);
    }

    /**
     * reschedule date
     *
     * @param Request $request
     * @param MedicalDate $date
     * @return Application|ResponseFactory|Response
     */
    public function confirm_reschedule_date(Request $request, MedicalDate $date)
    {
        $all = ['date' => json_decode($request->get('new-date'), true)];
        //Validate date
        $validate = Validator::make($all, [
            'date.*'  => ['required', 'date_format:Y-m-d H:i'],
        ]);

        if ($validate->fails())
            return response([
            'error' =>  $validate->errors()->all()
        ], Response::HTTP_NOT_FOUND);


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
            return response(['error' => __('calendar.date-not-free')], Response::HTTP_NOT_FOUND);


        $query = [
            'start_date'    => date('Y-m-d H:i', strtotime($all['date']['start'])),
            'end_date'      => date('Y-m-d H:i', strtotime($all['date']['end'])),
            'status'        => 'reasignado',
        ];

        $date->update($query);

        return response([
            'message' => __('calendar.date-reschedule')], Response::HTTP_CREATED);
    }


    /**
     * View Config Calendar
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return Application|ResponseFactory|Response
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
     * @return Application|ResponseFactory|Response
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
     * @return Application|ResponseFactory|Response
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

        return response(['message' => __('calendar.deleted-schedule-confirmation')], Response::HTTP_OK);
    }


}
