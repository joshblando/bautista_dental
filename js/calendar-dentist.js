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
      select: function(arg) {
        $('#calendarActionModal').modal('show');
        calendar.unselect()
      },
      editable: true,

      eventLimit: true, // allow "more" link when too many events
      events:'../api/dentists-appointment.php',
      eventClick: function(info) {

        $('#exampleModal').modal('toggle');
        $('#eventInfo').html(info.event.extendedProps.sample);
        $('#eventDate').html(info.event.extendedProps.sched+' '+info.event.extendedProps.time);
        $('#eventTitle').html(info.event.title);
        console.log(info.event.backgroundColor);
        $('span.badge.appointment_status').attr('style','background:'+info.event.backgroundColor+' !important; color:white !important;');
        $('span.badge.appointment_status').html(info.event.extendedProps.status);


        if(info.event.extendedProps.status == 'APPROVED') {
          $('.btn_approve_appointment').html('Cancel');
          $('.btn_approve_appointment').removeClass('btn-primary');
          $('.btn_approve_appointment').addClass('btn-danger');
          $('.btn_approve_appointment').attr('href', '../api/approved-cancel-status.php?id='+info.event.extendedProps.appointment_id+'&&action=cancel');

        }
        else{
          $('.btn_approve_appointment').html('Approved');
          $('.btn_approve_appointment').removeClass('btn-danger');
          $('.btn_approve_appointment').addClass('btn-primary');
          $('.btn_approve_appointment').attr('href', '../api/approved-cancel-status.php?id='+info.event.extendedProps.appointment_id+'&&action=approve');

        }
      }
    });

    calendar.render();
  });
