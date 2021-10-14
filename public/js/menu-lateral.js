!function() {
    let queryRuta = window.location.pathname;
    // Condicionales de la validación de cada una de las rutas para remover y adicionar las clases descritas.
    if (queryRuta.includes("dashboard.html")) {

        $('#home').removeClass('active');
        $('#home').addClass('selected');

        $('#calendario').removeClass('active');
        $('#historia_clinica').removeClass('active');
    }

    else if (queryRuta.includes("citas")) {

        $('#cita_padre').removeClass('actived');
        $('#cita_padre').addClass('citaPadre');

        $('#cita1').removeClass('actived');
        $('#cita1').addClass('unactived');
    }

    else if (queryRuta.includes("calendario")) {

        $('#cita_padre').removeClass('actived');
        $('#cita_padre').addClass('citaPadre');

        $('#cita0').removeClass('actived');
        $('#cita0').addClass('unactived');
    }
}();


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',


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
        },

        selectable: true,
        dateClick: function(info) {
            //alert('Clicked on: ' + info.dateStr);
            //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            //alert('Current view: ' + info.view.type);
            // change the day's background color just for fun
            info.dayEl.style.backgroundColor = 'var(--secund-color)';
        },

        editable: true,
        events: 
        [{
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
        }],

        // Modal agendar cita
        dateClick: function(info) {
            $('#agendar_cita').modal('show');
        },

        // Modal ver cita
        eventClick: function(info) {
            console.log(info.event);

            $('#ver_cita').modal();
        },
        
        select: function(info) {
            //alert('selected ' + info.startStr + ' to ' + info.endStr);
        },
    });
      
    calendar.render();    
});

$( function() {
  var availableTags = [
    "ActionScript",
    "AppleScript",
    "Asp",
    "BASIC",
    "C",
    "C++",
    "Clojure",
    "COBOL",
    "ColdFusion",
    "Erlang",
    "Fortran",
    "Groovy",
    "Haskell",
    "Java",
    "JavaScript",
    "Lisp",
    "Perl",
    "PHP",
    "Python",
    "Ruby",
    "Scala",
    "Scheme"
  ];
  
  $( "#tags" ).autocomplete({
    source: availableTags
  });
} );
