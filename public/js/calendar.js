
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",

      headerToolbar:{
        center: 'title',
        left: 'dayGridMonth,timeGridWeek,listWeek'
      },
      events: "http://localhost:8000/calendario/show",
    });
    calendar.render();
  });