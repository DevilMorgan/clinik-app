@extends('tenant.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugin/full_calendar/main.min.css') }}">
@endsection

@section('content')
    <section class="containt_calendario" id="basic-table">
        <div class="head_calendar">
            <h1>Mi Calendario</h1>
            <span>Administre su calendario de citas</span>
        </div>
        <div class="calendario">
            <div id='calendar'></div>
        </div>
    </section>

    <!--  Modal click day-->
    <div class="modal fade" id="day-clicked" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header head_modal">
                    <h1 id="exampleModalLabel">{{ __('calendar.add-date') }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- footer -->
                <div class="footer_modal p-5">
                    <button type="button" data-dismiss="modal"> {{ __('calendar.see-dates') }} </button>
                    <button type="button" id="btn-day-clicked" data-dismiss="modal"> {{ __('calendar.add-date') }} </button>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal date create -->
    <div class="modal fade" id="create-date" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form method="POST" action="{{ route('tenant.operative.date-create') }}" id="form-add-date">
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
                    url: '{{ route('tenant.operative.list-free-date') }}',
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
        });


    </script>
@endsection
