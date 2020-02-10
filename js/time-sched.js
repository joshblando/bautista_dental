$(document).ready(function(){
	var calendarEl = document.getElementById('dentist-sched-calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
	  plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
	  header: {
	    left: 'prev,next today',
	    center: 'title',
	    right: 'dayGridMonth,timeGridWeek,timeGridDay'
	  },
		businessHours: {
		  // days of week. an array of zero-based day of week integers (0=Sunday)
		  daysOfWeek: [ 1, 3, 5 ], // Monday - Thursday

		  startTime: '10:00', // a start time (10am in this example)
		  endTime: '18:00', // an end time (6pm in this example)
		},
	  navLinks: true, // can click day/week names to navigate views
	  selectable: true,
	  selectMirror: true,

	  editable: true,
	  eventLimit: true, // allow "more" link when too many events
	  events:'../api/dentists-time-sched.php',
		// events:[],
	  eventClick: function(info) {
	  	// console.log(info.event.title);
	  	$.get('../api/remove-time-sched.php', {'time' :info.event.title, 'date':info.event.extendedProps.dateSched, 'employee' : $('#dentist-sched').val()});
	    // window.location='../api/remove-time-sched.php?time='+info.event.title+'&&date='+info.event.extendedProps.dateSched+'&&employee='+$('#dentist-sched').val();
	  	info.event.remove();
	  }
	});

	calendar.render();
});
