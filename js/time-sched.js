$(document).ready(function(){
	var calendarEl = document.getElementById('dentist-sched-calendar');

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

	  editable: true,
	  eventLimit: true, // allow "more" link when too many events
	  events:'../api/dentists-time-sched.php',
	  eventClick: function(info) {
	  	// console.log(info.event.title);
	  	$.get('../api/remove-time-sched.php', {'time' :info.event.title, 'date':info.event.extendedProps.dateSched, 'employee' : $('#dentist-sched').val()});
	    // window.location='../api/remove-time-sched.php?time='+info.event.title+'&&date='+info.event.extendedProps.dateSched+'&&employee='+$('#dentist-sched').val();
	  	info.event.remove(); 	
	  }
	});

	calendar.render();
});
