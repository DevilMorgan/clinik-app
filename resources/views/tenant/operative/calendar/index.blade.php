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

        <!-- <div class="contains_option_days">
            <h2 class="dias no_disponible"><i></i> Días no disponibles</h2>
            <h2 class="dias"><i></i> Días disponibles</h2>
        </div> -->

        <div class="calendario">
            <div id='calendar'></div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es.min.js" integrity="sha512-L6Trpj0Q/FiqDMOD0FQ0dCzE0qYT2TFpxkIpXRSWlyPvaLNkGEMRuXoz6MC5PrtcbXtgDLAAI4VFtPvfYZXEtg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    //alert(event);
                    //$('#agendar_cita').modal('show');
                    //event.dayEl.style.backgroundColor = 'var(--secund-color)';
                    console.log(event);
                },
                selectable: false,
                editable: false,
                events: [
                    {
                        id: '1',
                        title: 'cita agendada',
                        start: '2021-10-13T10:00:00',
                        //end: '2021-10-10T16:00:00',
                        especialidad: 'Terapia physicologica',
                        tipo_cita: 'Presencial',
                        allDay: true,
                        //startTime: '11:00:00',
                        //endTime: '11:30:00',
                        color: 'orange',
                        //display: 'background'
                    }
                ],
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
        });
    </script>
@endsection
