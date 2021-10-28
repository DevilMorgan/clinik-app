@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/full_calendar/main.min.css') }}">
@endsection

@section('content')
    <section class="container">
        <div class="containt_calendario" id="basic-table">
            <div class="head_calendar mb-4">
                <h1>{{ __('calendar.calendar') }}</h1>
                <span>{{ __('calendar.calendar-description') }}</span>
            </div>

            <div class="calendario">
                <div id='calendar'></div>
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
                        <button type="submit" class="button_save_form">{{ __('calendar.see-dates') }}</button>
                        <button type="submit" class="button_save_form" id="btn-day-clicked">{{ __('calendar.add-date') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal date create -->
    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header head_modal">
                    <h1>{{ __('calendar.add-date') }}</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body -->
                <form method="POST" action="{{ route('tenant.operative.calendar.date-create') }}" id="form-add-date">
                    <div class="modal-body body_modal">

                        <label for="new-date">  {{ __('calendar.available-date') }} </label>
                        <div class="content_items_cita" id="content-dates">

                        </div>

                        <div class="ui-widget">
                            <label for="patient">Patient</label>
                            <input id="patient" name="patient" class="form-control" placeholder="Ingrese número de documento">
                            <i class="far fa-check-circle"></i>
                            <!-- <i class="far fa-times-circle"></i> -->
                        </div>

                        <div class="content_textArea_citas">
                            <label for="description">{{ __('trans.description') }}</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        </div>

                        <div class="content_consultorio_citas">
                            <label for="place">{{ __('trans.place') }}</label>
                            <input class="form-control" type="text" id="place" name="place">
                        </div>

                    </div>

                    <div class="footer_modal">
                        <button type="submit" >
                            {{ __('trans.add') }}
                        </button>
                        <button type="button" class="select_cancel"  data-dismiss="modal">{{ __('trans.cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  Modal date see -->
    <div class="modal fade modalC" id="ver_cita" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">Cita <label id=""></label></h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body -->
                <div class="modal-body body_modal">
                    <div class="items_verCita">
                        <h5 class="" id="">Laura León</h5>

                        <ul class="">
                            <li class="" id="" >Jueves, 12 de mayo</li>
                            <li class="" id="">10:47 - 11:47 a.m</li>
                        </ul>

                        <h5 class="" id="">Tipo de cita</h5>
                        <ul class="">
                            <li class="" id="">Presencial</li>
                        </ul>

                        <div class="content_textArea_citas">
                            <label for="cita_disponible" class="">Descripción</label>
                            <textarea class="" name="descripcion_cita" id="descripcion_cita" cols="30" rows="10"></textarea>
                        </div>

                        <div class="content_consultorio_citas">
                            <label for="cita_disponible" class="">Consultorio</label>
                            <input class="form-control" type="text" value="" id="consultorio" name="consultorio">
                        </div>
                    </div>
                </div>

                <!-- Sección botón Pagar -->
                <div class="footer_modal">
                    <button type="submit" class="" id="select_edit">Editar cita</button>

                    <button type="submit" class="select_cancel" id="">Cancelar cita </button>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal date delete -->
    <div class="modal fade modalC" id="eliminar_cita" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">Cita <label id=""></label></h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body -->
                <div class="modal-body p-5">
                    <div class="items_deleted_quote">
                        <h3 class="" id=""> Cita cancelada </h3>
                        <i class="fas fa-trash-alt"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--  ---***** MODAL SCHEDULED APPOINTMENT *****---  -->
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
                                <div class="col-lg-4 data_group_form">
                                    <label for="id-card">{{ __('validation.attributes.id-card') }}</label>
                                    <input type="text" class="input_dataGroup_form" readonly id="id-card" name="id-card">
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="name">{{ __('validation.attributes.name') }}</label>
                                    <input type="text" class="input_dataGroup_form" id="name" name="name">
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="last-name">{{ __('validation.attributes.last-name') }}</label>
                                    <input type="text" class="input_dataGroup_form" id="last-name" name="last-name">
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="email">{{ __('validation.attributes.email') }}</label>
                                    <input type="email" class="input_dataGroup_form" id="email" name="email">
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="date-type">{{ __('validation.attributes.date-type') }}</label>
                                    <select name="date-type" id="date-type" class="input_dataGroup_form">
                                        @if(is_array($user->date_types) || is_object($user->date_types))
                                            @foreach($user->date_types as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <label for="consent">{{ __('validation.attributes.consent') }}</label>
                                    <select name="consent" id="consent" class="input_dataGroup_form">
                                        @if(is_array($user->consents) || is_object($user->consents))
                                            @foreach($user->consents as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-4 data_group_form">
                                    <div class="custom-control custom-checkbox d-flex justify-content-between p-0">
                                        <label for="agreement">{{ __('validation.attributes.agreement') }}</label>
                                        <input type="checkbox" class="custom-control-input" id="active-agreement">
                                        <label class="custom-control-label" for="active-agreement">Activate select</label>
                                    </div>

                                    <select name="agreement" id="agreement" class="form-control" disabled>
                                        @if(is_array($user->agreements) || is_object($user->agreements))
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

                                <div class="col-lg-4 data_group_form">
                                    <label for="money">{{ __('validation.attributes.money') }}</label>
                                    <input type="text" class="input_dataGroup_form" id="money" name="money">
                                </div>
                            </div>

                            <!-- Section appoiment available -->
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


    <!--  ---***** MODAL SEE APPOINTMENT *****---  -->
    <div class="modal fade" id="ver_cita" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">Appointment<label id=""></label></h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body body_modal">
                    <div class="form_row">
                        <div class="data_row_form">
                            <!-- User and appointment assigned -->
                            <div class="col-12 data_group_form items_verCita">
                                <h5 class="" id="">Laura León</h5>

                                <ul class="">
                                    <li class="" id="" >Thursday, 12 may</li>
                                    <li class="" id="">10:47 - 11:47 a.m</li>
                                </ul>
                            </div>

                            <!-- Type appointment -->
                            <div class="col-12 data_group_form items_verCita">
                                <h5 class="" id="">Type appointment</h5>

                                <ul class="">
                                    <li class="" id="" >Thursday, 12 de may</li>
                                    <li class="" id="">10:47 - 11:47 a.m</li>
                                </ul>
                            </div>

                            <!-- Consulting room -->
                            <div class="col-12 data_group_form">
                                <label for="">Consulting room</label>
                                <input type="text" class="input_dataGroup_form" id="">
                            </div>

                            <!-- Description -->
                            <div class="col-12 data_group_form mb-0">
                                <label for="">Description</label>
                                <textarea name="descripcion_cita" id="descripcion_cita" cols="30" rows="10" class="textArea_form"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Modal -->
                <div class="footer_modal">
                    <!-- Button's, cancel and save -->
                    <div class="button_container_form">
                        <button type="submit" class="button_cancel_form select_cancel">Cancel appointment &nbsp;<i class="fas fa-times-circle"></i> </button>
                        <button type="submit" id="select_edit" class="button_save_form">Edit appointment &nbsp;<i class="fas fa-save"></i> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  ---***** MODAL CANCELED APPOINTMENT *****---  -->
    <div class="modal fade modalC" id="eliminar_cita" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Header Modal-->
                <div class="modal-header head_modal">
                    <h1 class="" id="exampleModalLabel">Appointment<label id=""></label></h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body Modal-->
                <div class="modal-body p-4">
                    <div class="items_deleted_quote">
                        <h3 class="" id="">Canceled appointment</h3>
                        <i class="fas fa-trash-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es.min.js"></script>

    <script src="{{ asset('plugin/full_calendar/main.min.js') }}"></script>
    <script src="{{ asset('plugin/full_calendar/locales/es.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                businessHours: {!!  json_encode($user->calendar_config->schedule_on)  !!},
                // Botones de mes, semana y día.
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridDay'// se elimina el botón de la opción semana "timeGridWeek"
                },
                // Propiedad para cambio de lenguaje
                locale: 'es',
                // Evento de mensaje de alerta
                dateClick: function (event)
                {
                    if (event.view.type === "dayGridMonth")
                    {
                        $('#btn-day-clicked').data("date", event.dateStr);
                        $('#day-clicked').modal();
                    }
                    //alert(event);
                    //$('#agendar_cita').modal('show');
                    //event.dayEl.style.backgroundColor = 'var(--secund-color)';
                    console.log(event);
                },
                selectable: false,
                editable: false,
                //events: "",
                // Modal ver cita
                eventClick: function(info) {
                    console.log(info.event);
                    //$('#ver_cita').modal();
                },
                select: function(info) {
                    //alert('selected ' + info.startStr + ' to ' + info.endStr);
                },
                dayRender: function (date, cell) {

                    var today = new Date();
                    var end = new Date();
                    end.setDate(today.getDate()+7);

                    if (date.getDate() === today.getDate()) {
                        cell.css("background-color", "red");
                    }

                    if(date > today && date <= end) {
                        cell.css("background-color", "yellow");
                    }

                }
            });
            calendar.render();

            //Add Date
            $('#btn-day-clicked').click(function (e) {
                $('#create-date').modal();
                var btn = $(this);
                console.log(btn.data('date'));
                $.ajax({
                    data: { date: btn.data('date')},
                    dataType: 'json',
                    url: '{{ route('tenant.operative.calendar.list-free-date') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    success: function (res) {
                        //get list in modal
                        var list_news_dates = $('#content-dates');
                        list_news_dates.html('');

                        console.log(res);

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

                        $('#create-date').modal();
                    },
                    error: function (res, status) {
                        console.log(res);
                    }
                });
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
                    },
                    error: function (res, status) {

                        var response = res.responseJSON;

                        Swal.fire({
                            icon: 'warning',
                            title: 'Alerta',
                            text: response.error,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });

            });

            $('#active-agreement').click(function (e) {
                var check = $(this);
                if (check.prop('checked'))
                {
                    $('#agreement').prop('disabled', false);
                } else {
                    $('#agreement').prop('disabled', true);
                }
            });
        });


    </script>
@endsection
