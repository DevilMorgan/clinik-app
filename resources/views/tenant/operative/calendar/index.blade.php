@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/full_calendar/main.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugin/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <nav aria-label="breadcrumb" class="agenda_path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tenant.operative.calendar.index') }}">
                        {{ __('calendar.calendar') }}
                    </a>
                </li>
                {{--                <li class="breadcrumb-item"><a href="#">Patient-list</a></li>--}}
            </ol>
        </nav>
    </nav>

    <section class="container">
        <div class="containt_calendario" id="basic-table">
            <div class="row">
                <div class="head_calendar mb-4">
                    <h1>{{ __('calendar.calendar') }}</h1>
                    <span>{{ __('calendar.calendar-description') }}</span>
                </div>
            </div>
            <div class="row mb-4">
                <a href="{{ route('tenant.operative.calendar.config-calendar') }}" class="btn button_save_form">
                    <i class="fas fa-cogs"></i>&nbsp;{{ __('calendar.config-date') }}
                </a>
                <button id="upload-calendar" class="btn button_save_form"><i class="fas fa-sync-alt"></i>&nbsp;{{ __('trans.upload') }}</button>
            </div>
            <div class="row">
                <div class="calendario">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </section>

    <!--  Modal click day-->
    <div class="modal fade" id="day-clicked" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal-->
                <div class="modal-header head_modal">
                    <h1 id="exampleModalLabel">{{ __('calendar.add-date') }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Body Modal-->
                <div class="modal-body body_modal p-4"></div>

                <!-- Footer Modal -->
                <div class="footer_modal">
                    <!-- Button's save and cancel   -->
                    <div class="button_container_form">
                        <button type="button" data-dismiss="modal" class="button_save_form" id="btn-day-see">
                            {{ __('calendar.see-dates') }}
                        </button>
                        <button type="button" data-dismiss="modal" class="button_save_form" id="btn-day-clicked">{{ __('calendar.add-date') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal date create -->
    <div class="modal fade" id="create-date" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('tenant.operative.calendar.date-create') }}" id="form-add-date">
                    <!-- Header Modal -->
                    <div class="modal-header head_modal">
                        <h1 id="exampleModalLabel">{{ __('calendar.add-date') }}</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Body Modal -->
                    <div class="modal-body body_modal">
                        <div class="form_row">
                            <!-- Section personal information  -->
                            <div class="data_row_form">
                                <div class="col-lg-4 form-group">
                                    <label for="id_card">{{ __('validation.attributes.id_card') }}</label>
                                    <select id='id_card' name="id_card" class="form-control">
                                    </select>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="name">{{ __('validation.attributes.name') }}</label>
                                    <input type="text" class="input_dataGroup_form" id="name" name="name" readonly>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="last_name">{{ __('validation.attributes.last_name') }}</label>
                                    <input type="text" class="input_dataGroup_form" id="last_name" name="last_name" readonly>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="email">{{ __('validation.attributes.email') }}</label>
                                    <input type="email" class="input_dataGroup_form" id="email" name="email" readonly>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="date-type">{{ __('validation.attributes.date-type') }}</label>
                                    <select name="date-type" id="date-type" class="input_dataGroup_form date-type">
                                        @if(is_array($user->date_types) || is_object($user->date_types))
                                            <option></option>
                                            @foreach($user->date_types as $item)
                                                <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="consent">{{ __('validation.attributes.consent') }}</label>
                                    <select name="consent" id="consent" class="input_dataGroup_form">
                                        @if(is_array($user->consents) || is_object($user->consents))
                                            <option></option>
                                            @foreach($user->consents as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <div class="custom-control custom-checkbox d-flex justify-content-between p-0">
                                        <label for="agreement">{{ __('validation.attributes.agreement') }}</label>
                                        <input type="checkbox" class="custom-control-input active-agreement" id="active-agreement">
                                        <label class="custom-control-label" for="active-agreement">Activate select</label>
                                    </div>
                                    <select name="agreement" id="agreement" class="form-control agreement" disabled>
                                        @if(is_array($user->agreements) or is_object($user->agreements))
                                            <option></option>
                                            @foreach($user->agreements as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="place">{{ __('validation.attributes.place') }}</label>
                                    <input type="text" class="input_dataGroup_form" id="place" name="place">
                                </div>

                                <div class="col-lg-4 form-group">
                                    <label for="money">{{ __('validation.attributes.money') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-calc money" id="money" name="money">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary calc-money" type="button" id="calc-money">
                                                {{ __('calendar.calc') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section appointment available -->
                            <div class="col-lg-6 data_row_form px-md-2">
                                <label for="">{{ __('calendar.available-date') }}</label>
                                <div class="col-12 content_items_cita" id="content-dates"></div>
                            </div>

                            <!-- Section description -->
                            <div class="col-lg-6 data_row_form mb-0">
                                <div class="col-12 data_group_form mb-0">
                                    <label for="description">{{ __('validation.attributes.description') }}</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="textArea_form"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Modal -->
                    <div class="footer_modal">
                        <!-- Button's cancel and save -->
                        <div class="button_container_form">
                            <button type="button" class="button_cancel_form select_cancel" data-dismiss="modal">
                                {{ __('trans.cancel') }}<i class="fas fa-times-circle"></i>
                            </button>
                            <button type="submit" class="button_save_form" >
                                {{ __('trans.save') }}<i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  Modal click event-->
    <div class="modal fade" id="event-clicked" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal-->
                <div class="modal-header head_modal">
                    <h1 id="exampleModalLabel">{{ __('calendar.date') }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Body Modal-->
                <div class="modal-body body_modal p-4"></div>

                <!-- Footer Modal -->
                <div class="footer_modal">
                    <!-- Button's save and cancel   -->
                    <div class="button_container_form">
                        <button type="button" data-dismiss="modal" class="button_save_form event-click-data" id="btn-date-reschedule">
                            {{ __('calendar.reschedule-dates') }}&nbsp;<i class="fas fa-calendar"></i>
                        </button>
                        <button type="button" data-dismiss="modal" class="button_save_form event-click-data" id="btn-date-edit">
                            {{ __('calendar.edit-date') }}&nbsp;<i class="fas fa-edit"></i>
                        </button>
                        <button type="button" data-dismiss="modal" class="button_save_form event-click-data" id="btn-date-cancel">
                            {{ __('calendar.cancel-date') }}&nbsp;<i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal date edit -->
    <div class="modal fade" id="edit-date" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">Appointment<label id=""></label></h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post" id="form-edit-date">
                @csrf

                <!-- Body Modal -->
                    <div class="modal-body body_modal">
                        <div class="form_row">
                            <div class="data_row_form">
                                <!-- Type appointment -->
                                <div class="col-12 data_group_form items_verCita">
                                    <h5>{{ __('calendar.date') }}</h5>

                                    <ul>
                                        <li id="edit-see-date" >Thursday, 12 de may</li>
                                        <li id="edit-see-hours">10:47 - 11:47 a.m</li>
                                    </ul>
                                </div>

                                <!-- Section personal information  -->
                                <div class="data_row_form">
                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-name">{{ __('validation.attributes.name') }}</label>
                                        <input type="text" class="input_dataGroup_form" id="edit-name" name="name" readonly />
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-last_name">{{ __('validation.attributes.last_name') }}</label>
                                        <input type="text" class="input_dataGroup_form" id="edit-last_name" name="last_name" readonly />
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-id_card">{{ __('validation.attributes.id_card') }}</label>
                                        <input type="text" class="input_dataGroup_form" id="edit-id_card" name="id_card" readonly />
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-email">{{ __('validation.attributes.email') }}</label>
                                        <input type="email" class="input_dataGroup_form" id="edit-email" name="email" readonly />
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-date-type">{{ __('validation.attributes.date-type') }}</label>
                                        <select name="date-type" id="edit-date-type" class="input_dataGroup_form date-type">
                                            @if(is_array($user->date_types) || is_object($user->date_types))
                                                <option></option>
                                                @foreach($user->date_types as $item)
                                                    <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-consent">{{ __('validation.attributes.consent') }}</label>
                                        <select name="consent" id="edit-consent" class="input_dataGroup_form">
                                            @if(is_array($user->consents) || is_object($user->consents))
                                                <option></option>
                                                @foreach($user->consents as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <div class="custom-control custom-checkbox d-flex justify-content-between p-0">
                                            <label for="edit-agreement">{{ __('validation.attributes.agreement') }}</label>
                                            <input type="checkbox" class="custom-control-input active-agreement" id="active-agreement-edit">
                                            <label class="custom-control-label" for="active-agreement-edit">Activate select</label>
                                        </div>
                                        <select name="agreement" id="edit-agreement" class="form-control agreement" disabled>
                                            @if(is_array($user->agreements) or is_object($user->agreements))
                                                <option></option>
                                                @foreach($user->agreements as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-place">{{ __('validation.attributes.place') }}</label>
                                        <input type="text" class="input_dataGroup_form" id="edit-place" name="place">
                                    </div>

                                    <div class="col-lg-4 data_group_form">
                                        <label for="edit-money">{{ __('validation.attributes.money') }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control input-calc money" id="edit-money" name="money">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary calc-money" type="button" id="calc-money-edit">
                                                    {{ __('calendar.calc') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-12 data_group_form mb-0">
                                    <label for="description-edit">{{ __('validation.attributes.description') }}</label>
                                    <textarea name="description" id="description-edit" cols="30" rows="10" class="textArea_form"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Modal -->
                    <div class="footer_modal">
                        <!-- Button's, cancel and save -->
                        <div class="button_container_form">
                            <button type="button" class="button_cancel_form select_cancel" data-dismiss="modal">
                                {{ __('trans.cancel') }} &nbsp;<i class="fas fa-times-circle"></i>
                            </button>
                            <button type="submit" id="select_edit" class="button_save_form" >
                                {{ __('trans.save') }} &nbsp;<i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  Modal date delete -->
    <div class="modal fade modalC" id="cancel-date" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal-->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">{{ __('calendar.date-cancel') }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="form-cancel-date">
                @method('delete')
                @csrf
                <!-- Body Modal-->
                    <div class="modal-body p-4">
                        <div class="items_deleted_quote">
                            <h3 class="" id="">{{ __('calendar.date-cancel') }}</h3>
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <div class="col-12 data_group_form items_verCita">
                            <h5>{{ __('calendar.info') }}</h5>

                            <ul>
                                <li id="cancel-see-date" ></li>
                                <li id="cancel-see-hours"></li>
                                <li id="cancel-see-patient" ></li>
                                <li id="cancel-see-type"></li>
                            </ul>
                        </div>
                    </div>

                    <div class="footer_modal">
                        <!-- Button's, cancel and save -->
                        <div class="button_container_form">
                            <button type="button" class="button_cancel_form select_cancel" data-dismiss="modal">
                                {{ __('trans.cancel') }} &nbsp;<i class="fas fa-times-circle"></i>
                            </button>
                            <button type="submit" id="btn-confirm-cancel" class="button_save_form" >
                                {{ __('trans.confirm') }} &nbsp;<i class="fas fa-check-circle"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  Modal date resigned -->
    <div class="modal fade modalC" id="reschedule-date" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal-->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">{{ __('calendar.date-reschedule') }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="form-resigned-date">
                @csrf
                <!-- Body Modal-->
                    <div class="modal-body p-4">
                        <div class="items_deleted_quote">
                            <h3 class="" id="">{{ __('calendar.reschedule-date') }}</h3>
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="col-12 data_group_form items_verCita">
                            <h5>{{ __('calendar.info') }}</h5>

                            <ul>
                                <li id="reschedule-see-date" ></li>
                                <li id="reschedule-see-hours"></li>
                                <li id="reschedule-see-patient" ></li>
                                <li id="reschedule-see-type"></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="previous-day"><i class="fas fa-angle-left"></i></button>
                                </div>
                                <input type="text" class="form-control" id="date-search" name="date-search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="next-day"><i class="fas fa-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">{{ __('calendar.available-date') }}</label>
                            <div class="col-12 content_items_cita" id="reschedule-content-dates"></div>
                        </div>
                    </div>

                    <div class="footer_modal">
                        <!-- Button's, cancel and save -->
                        <div class="button_container_form">
                            <button type="button" class="button_cancel_form select_cancel" data-dismiss="modal">
                                {{ __('trans.cancel') }} &nbsp;<i class="fas fa-times-circle"></i>
                            </button>
                            <button type="submit" id="btn-confirm-cancel" class="button_save_form" >
                                {{ __('trans.confirm') }} &nbsp;<i class="fas fa-check-circle"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es.min.js"></script>

    <script src="{{ asset('plugin/full_calendar/main.min.js') }}"></script>
    <script src="{{ asset('plugin/full_calendar/locales/es.js') }}"></script>

    <script src="{{ asset('plugin/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugin/select2/js/i18n/es.js') }}"></script>

    <script src="{{ asset('plugin/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var weekNotBusiness = '{!! json_encode($weekNotBusiness) !!}';

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                businessHours: {!!  json_encode($user->calendar_config->schedule_on)  !!},
                events: '{{ route('tenant.operative.calendar.upload-date') }}',
                // Botones de mes, semana y día.
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridDay'// se elimina el botón de la opción semana "timeGridWeek"
                },
                // Propiedad para cambio de lenguaje
                locale: 'es',
                // Evento de mensaje de alerta
                dateClick: function (event) {
                    var today = moment();

                    var day = moment(event.date);

                    console.log(event.date.getDay());
                    if (weekNotBusiness.includes(event.date.getDay()))
                    {

                        if (today.startOf('day').diff(day.startOf('day'), 'days') <= 0)
                        {
                            if (event.view.type === "dayGridMonth") {
                                $('#btn-day-clicked').data("date", event.dateStr);
                                $('#btn-day-see').data("date", event.dateStr);

                                $('#day-clicked').modal();
                            }
                        } else {
                            calendar.changeView('timeGridDay', event.dateStr);
                        }

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: '{{ __('trans.warning') }}',
                            text: '{{ __('calendar.day-not-business') }}',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                selectable: false,
                editable: false,
                //events: "",
                // Modal ver cita
                eventClick: function(info) {

                    $('.event-click-data').data('id', info.event._def.publicId)
                    $('#event-clicked').modal();
                },
                select: function(info) {
                    //alert('selected ' + info.startStr + ' to ' + info.endStr);
                },
                dayCellDidMount: function (date) {
                    var today = moment();

                    var day = moment(date.date);

                    //console.log(today.startOf('day').diff(day.startOf('day'), 'days'));
                    if (today.startOf('day').diff(day.startOf('day'), 'days') > 0)
                    {
                        date.el.style.backgroundColor = 'rgba(215,215,215,.3)';
                    }
                }
            });
            calendar.render();

            $('#date-search').datetimepicker({
                format: 'YYYY-MM-DD',
                minDate: moment().format('YYYY-MM-DD'),
                showTodayButton: true,
            }).on('dp.change', function (e) {
                var date = $('#date-search');
                var today = moment();
                var btn_prev = $('#previous-day');
                var content = $('#reschedule-content-dates');
                content.html('');

                btn_prev.prop('disabled', false);
                list_free_dates(date.val(), content);

                if (date.val() === moment().format('YYYY-MM-DD'))
                {
                    $('#previous-day').prop('disabled', true);
                }
            });

            //Upload calendar
            $('#upload-calendar').click(function (e) {
                calendar.refetchEvents();
                Swal.fire({
                    icon: 'success',
                    title: '{{ __('trans.success') }}',
                    text: '{{ __('trans.update-success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            });

            $('#btn-day-see').click(function (e) {
                var btn = $(this);
                calendar.changeView('timeGridDay', btn.data('date'));
            });

            //Add Date
            function list_free_dates(date, list_news_dates) {
                $.ajax({
                    data: { date: date},
                    dataType: 'json',
                    url: '{{ route('tenant.operative.calendar.list-free-date') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    success: function (res) {

                        list_news_dates.html('');
                        //get list
                        $.each(res.data, function (index, item) {
                            list_news_dates.append('<div class="inputText_cita">' +
                                '<input type="radio" id="new-date" name="new-date" value=\'{"start":"' + item.startTime + '","end": "' + item.endTime + '"}\'>' +
                                '<ul class="items_cita">' +
                                '<li>' + item.nameOperative + '</li>' +
                                '<li>' + moment(item.startTime).format('hh:mm A') + '-' + moment(item.endTime).format('hh:mm A') + '</li>' +
                                '</ul>' +
                                '</div>');
                        });
                    },
                    error: function (res, status) {
                        var response = res.responseJSON;

                        Swal.fire({
                            icon: 'warning',
                            title: '{{ __('trans.warning') }}',
                            text: response.error,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }

            //open modal create
            $('#btn-day-clicked').click(function (e) {

                $('#create-date').modal();
                var btn = $(this);

                list_free_dates(btn.data('date'), $('#content-dates'));
            });

            $('#form-add-date').submit(function (e){
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    data: form.serialize(),
                    dataType: 'json',
                    url: form.attr('action'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    success: function (res, status) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Hecho',
                            text: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#create-date').modal('hide');
                        form[0].reset();

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    },
                    error: function (res, status) {

                        var response = res.responseJSON;

                        Swal.fire({
                            icon: 'warning',
                            title: '{{ __('trans.warning') }}',
                            text: response.error,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    }
                });
            });

            $('.calc-money').click(function (e) {
                var url = '{{ route('tenant.operative.calendar.calc-money', ['date_type' => ':date_type']) }}';

                var content = $(this).parent().parent().parent().parent();

                var date_type = content.find('.date-type');
                var agreement = content.find('.agreement');
                var money = content.find('.money');

                money.removeClass('is-invalid');

                if (date_type.val())
                {
                    var url1 = url.replace(':date_type', date_type.val());
                    if (!agreement.prop('disabled') && agreement.val())
                    {
                        url1 += '\/' + agreement.val();
                    }
                    $.ajax({
                        dataType: 'json',
                        url: url1,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'GET',
                        success: function (res, status) {
                            money.val(res.money);
                        },
                        error: function (res, status) {

                            var response = res.responseJSON;

                            money.addClass('is-invalid');

                            Swal.fire({
                                icon: 'warning',
                                title: '{{ __('trans.warning') }}',
                                text: response.error,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });

            $('.active-agreement').click(function (e) {
                var check = $(this);
                var content = check.parent().parent();
                if (check.prop('checked'))
                {
                    content.find('.agreement').prop('disabled', false);
                } else {
                    content.find('.agreement').prop('disabled', true);
                }
            });

            $('#btn-date-edit').click(function (e) {
                var btn = $(this);
                var url = '{{ route('tenant.operative.calendar.edit-date', ['id' => ':id']) }}';
                var url_form = '{{ route('tenant.operative.calendar.update-date', ['date' => ':id']) }}';

                if (btn.data('id'))
                {
                    $.ajax({
                        dataType: 'json',
                        url: url.replace(':id', btn.data('id')),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'get',
                        success: function (res) {


                            //value inputs
                            $('#edit-name').val(res.date.patient.name);
                            $('#edit-last_name').val(res.date.patient.last_name);
                            $('#edit-email').val(res.date.patient.email);
                            $('#edit-id_card').val(res.date.patient.id_card);
                            $('#edit-date-type').val(res.date.date_type_id);
                            $('#edit-consent').val(res.date.consent_id);

                            if (res.date.agreement_id)
                            {
                                $('#edit-agreement').val(res.date.agreement_id).prop('disabled', false);
                                $('#active-agreement-edit').prop('checked', true);
                            }
                            $('#edit-place').val(res.date.place);
                            $('#edit-money').val(res.date.money);

                            $('#form-edit-date').attr('action', url_form.replace(':id', btn.data('id')));

                            $('#edit-see-date').html(moment(res.date.start_date).format('dddd, D MMMM/YYYY'));
                            $('#edit-see-hours').html(
                                moment(res.date.start_date).format('h:mm a') + ' - ' +
                                moment(res.date.end_date).format('h:mm a')
                            );

                            $('#edit-date').modal();
                        },
                        error: function (res, status) {
                            var response = res.responseJSON;

                            Swal.fire({
                                icon: 'warning',
                                title: '{{ __('trans.warning') }}',
                                text: response.error,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });

            $('#form-edit-date').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    data: form.serialize(),
                    dataType: 'json',
                    url: form.attr('action'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    success: function (res, status) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Hecho',
                            text: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#edit-date').modal('hide');
                        form[0].reset();
                        $('#edit-agreement').prop('disabled', true);

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    },
                    error: function (res, status) {

                        var response = res.responseJSON;

                        Swal.fire({
                            icon: 'warning',
                            title: '{{ __('trans.warning') }}',
                            text: response.error,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    }
                });
            });

            $('#btn-date-cancel').click(function (e) {
                var btn = $(this);
                var url = '{{ route('tenant.operative.calendar.cancel-date', ['id' => ':id']) }}';
                var url_form = '{{ route('tenant.operative.calendar.confirm-cancel-date', ['date' => ':id']) }}';

                if (btn.data('id'))
                {
                    $.ajax({
                        dataType: 'json',
                        url: url.replace(':id', btn.data('id')),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'get',
                        success: function (res) {

                            $('#form-cancel-date').attr('action', url_form.replace(':id', btn.data('id')));

                            $('#cancel-see-date').html(moment(res.date.start_date).format('dddd, D MMMM/YYYY'));
                            $('#cancel-see-hours').html(
                                moment(res.date.start_date).format('h:mm a') + ' - ' +
                                moment(res.date.end_date).format('h:mm a')
                            );
                            $('#cancel-see-patient').html(res.date.patient.name + ' ' + res.date.patient.last_name);
                            $('#cancel-see-type').html(res.date.date_type.name);

                            $('#cancel-date').modal();
                        },
                        error: function (res, status) {
                            var response = res.responseJSON;

                            Swal.fire({
                                icon: 'warning',
                                title: '{{ __('trans.warning') }}',
                                text: response.error,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });

            $('#form-cancel-date').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    data: form.serialize(),
                    dataType: 'json',
                    url: form.attr('action'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    success: function (res, status) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Hecho',
                            text: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#cancel-date').modal('hide');
                        form[0].reset();

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    },
                    error: function (res, status) {

                        var response = res.responseJSON;

                        Swal.fire({
                            icon: 'warning',
                            title: '{{ __('trans.warning') }}',
                            text: response.error,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    }
                });
            });

            $('#btn-date-reschedule').click(function (e) {
                var btn = $(this);
                var url = '{{ route('tenant.operative.calendar.cancel-date', ['id' => ':id']) }}';
                var url_form = '{{ route('tenant.operative.calendar.confirm-reschedule-date', ['date' => ':id']) }}';

                if (btn.data('id'))
                {
                    //Congig base
                    var btn_prev = $('#previous-day');
                    var btn_next = $('#next-day');
                    var date_search = $('#date-search');
                    var today = moment().format('YYYY-MM-DD');

                    btn_prev.prop('disabled', true);
                    date_search.val(today);

                    list_free_dates(today, $('#reschedule-content-dates'));

                    $.ajax({
                        dataType: 'json',
                        url: url.replace(':id', btn.data('id')),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'get',
                        success: function (res) {

                            $('#form-resigned-date').attr('action', url_form.replace(':id', btn.data('id')));

                            $('#reschedule-see-date').html(moment(res.date.start_date).format('dddd, D MMMM/YYYY'));
                            $('#reschedule-see-hours').html(
                                moment(res.date.start_date).format('h:mm a') + ' - ' +
                                moment(res.date.end_date).format('h:mm a')
                            );
                            $('#reschedule-see-patient').html(res.date.patient.name + ' ' + res.date.patient.last_name);
                            $('#reschedule-see-type').html(res.date.date_type.name);

                            $('#reschedule-date').modal();
                        },
                        error: function (res, status) {
                            var response = res.responseJSON;

                            Swal.fire({
                                icon: 'warning',
                                title: '{{ __('trans.warning') }}',
                                text: response.error,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });

            $('#next-day').click(function (e) {
                //console.log('ok');
                //Congig base
                var btn = $(this);

                var date_search = $('#date-search');

                $('#previous-day').prop('disabled', false);

                date_search.val(moment(date_search.val()).add(1, 'day').format('YYYY-MM-DD'));

                $('#reschedule-content-dates').html('');

                list_free_dates(date_search.val(), $('#reschedule-content-dates'));
            });

            $('#previous-day').click(function (e) {
                //console.log('ok');
                //Congig base
                var btn = $(this);

                var date_search = $('#date-search');

                $('#previous-day').prop('disabled', false);

                date_search.val(moment(date_search.val()).add(-1, 'day').format('YYYY-MM-DD'));

                $('#reschedule-content-dates').html('');

                list_free_dates(date_search.val(), $('#reschedule-content-dates'));

                if (date_search.val() === moment().format('YYYY-MM-DD'))
                {
                    $('#previous-day').prop('disabled', true);
                }
            });

            $('#form-resigned-date').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    data: form.serialize(),
                    dataType: 'json',
                    url: form.attr('action'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    success: function (res, status) {

                        Swal.fire({
                            icon: 'success',
                            title: '{{ __('trans.success') }}',
                            text: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#reschedule-date').modal('hide');
                        form[0].reset();

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    },
                    error: function (res, status) {

                        var response = res.responseJSON;

                        Swal.fire({
                            icon: 'warning',
                            title: '{{ __('trans.warning') }}',
                            text: response.error,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function () {
                            calendar.refetchEvents();
                        },3000);
                    }
                });
            });

            //Search Patient
            $('#id_card').select2({
                language: 'es',
                theme: 'bootstrap4',
                ajax: {
                    url: '{{ route('tenant.patients.search-patient') }}',
                    dataType: 'json',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results:response
                        };
                    },
                    cache: true,
                },
                minimumInputLength: 3,
                dropdownParent: $('#create-date')
            }).on('select2:select', function (e) {
                var data = e.params.data;

                $('#name').val(data.name);
                $('#last_name').val(data.last_name);
                $('#email').val(data.email);

            }).on('select2:opening', function (e){

                $('#id_card').val(null).trigger('change');
                $('#name').val('');
                $('#last_name').val('');
                $('#email').val('');

            });
        });
    </script>
@endsection
