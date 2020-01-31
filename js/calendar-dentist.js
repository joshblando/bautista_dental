  $(document).ready(function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      // select: function(arg) {
      //   // var title = prompt('Event Title:');
      //   // if (title) {
      //   //   calendar.addEvent({
      //   //     title: title,
      //   //     start: arg.start,
      //   //     end: arg.end,
      //   //     allDay: arg.allDay
      //   //   })
      //   // }
      //   $('#exampleModal').modal('show');
      //   calendar.unselect()
      // },
      editable: true,

      eventLimit: true, // allow "more" link when too many events
      events:'../api/dentists-appointment.php',
      eventClick: function(info) {
        $('#exampleModal').modal('toggle');
        $('#eventInfo').html(info.event.extendedProps.sample);
        $('#eventDate').html(info.event.extendedProps.sched+' '+info.event.extendedProps.time);
        $('#eventTitle').html(info.event.title);
      }
    });

    calendar.render();
  });
