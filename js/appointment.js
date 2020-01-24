$(document).ready(function() {
  function highlightDays(dateHigh) {
    for (var i = 0; i < dateCheck.length; i++) {
      if (new Date(dateCheck[i]).toString() === dateHigh.toString()) {
        return [true, "highlight"];
      }
    }
    return [true, ""];
  }

  const timelineLabels = (desiredStartTime, timeLength) => {
    let tlength = timeLength * 60;
    const periodsInADay = moment.duration(tlength, "MINUTES").as("MINUTES");
    const timeLabels = [];
    const startTimeMoment = moment(desiredStartTime, "hh:mm A");
    for (let i = 0; i <= periodsInADay; i += 30) {
      startTimeMoment.add(i === 0 ? 0 : 30, "MINUTES");
      timeLabels.push(startTimeMoment.format("hh:mm A"));
    }
    return timeLabels;
  };

  $("#service").on("change", function() {
    service = $(this).val();
    serviceName = $(this)
      .children("option:selected")
      .text();
  });

  $("#employee").change(function() {
    $("#times").empty();
    $(".appointment-datetime").addClass("show");
    let employee = $(this)
      .children("option:selected")
      .val();
    employeeName = $(this)
      .children("option:selected")
      .text();

    $.ajax({
      type: "GET",
      url: "api/dateSlot.php",
      data: {
        employee: employee
      },
      dataType: "JSON",
      success: result => {
        dateCheck = [];

        for (i = 0; i < result.length; i++) {
          const dates = result[i].date;
          dateCheck.push(moment(dates).format("M/D/YYYY"));
        }
        $("#datepicker").datepicker("destroy");
        $("#datepicker").datepicker({
          minDate: 0,
          beforeShowDay: highlightDays,
          onSelect: function(dateText, inst) {
            const dateAsString = dateText; //the first parameter of this function
            dateAsObject = $(this).datepicker("getDate"); //the getDate method
            checkDate = moment(dateAsString).format("YYYY-MM-DD");

            $(".time-container").addClass("show");
            $.ajax({
              type: "GET",
              url: "api/timeSlot.php",
              data: {
                checkDate: checkDate,
                employee: employee
              },
              dataType: "JSON",
              success: response => {
                $("#times").empty();
                if (response.length === 0) {
                  $("#times").append(
                    "<li style='background: white; text-align: center; color: dodgerblue; padding: 5px; width: 100%; height:30px'>No time slot available</li>"
                  );
                } else {
                  for (i = 0; i < response.length; i++) {
                    const timeLength = response[i].time;

                    $("#times").empty();
                    $.each(timeLength, function(index, value) {
                      const timeSlotList = `<li class="timeSlot" style="border: 1px solid white; background:white; color: dodgerblue;padding: 5px;margin: 5px;cursor: pointer;font-size: 12px;" id="${index}">${value}</li> `;

                      $("#times").append(timeSlotList);
                    });
                  }
                }
              }
            });
          }
        });
        $("#datepicker").datepicker("refresh");
      }
    });
  });

  $(document).on("click", "#times .timeSlot", function(e) {
    checkTime = $(this).text();

    $("#appointmentModal").addClass("show-modal");

    $("#inputEmployee").val(employeeName);
    $("#inputEmployeeHidden").val(employee.value);
    $("#inputService").val(serviceName);
    $("#inputServiceHidden").val(service);
    $("#inputDate").val(checkDate);
    $("#inputTime").val(checkTime);
    $("#inputDuration").val(service.split("|")[1] * 60 + " minutes");
  });

  $("#formSubmit").on("submit", function(e) {
    e.preventDefault();

    const employeeAppoint = $("#inputEmployeeHidden").val();
    const serviceAppoint = $("#inputServiceHidden").val();
    const dateAppoint = $("#inputDate").val();
    const timeAppoint = $("#inputTime").val();
    const appointSubmit = $("#appointSubmit").val();
    const message = $("#message").val();

    const serviceId = serviceAppoint.split("|")[0];
    const serviceDuration = serviceAppoint.split("|")[1];

    const appointTimeLength = timelineLabels(timeAppoint, serviceDuration);

    if (
      employeeAppoint === "" ||
      serviceAppoint === "" ||
      dateAppoint === "" ||
      timeAppoint === ""
    ) {
      alert("ERROR: Please Check your inputs");
      $("#appointmentModal").removeClass("show-modal");
    } else {
      // alert(serviceId);

      $.ajax({
        url: "./api/appointment.php",
        type: "POST",
        data: {
          employeeAppoint: employeeAppoint,
          serviceId: serviceId,
          serviceDuration: serviceDuration,
          dateAppoint: dateAppoint,
          timeAppoint: timeAppoint,
          appointTimeLength: appointTimeLength,
          message: message,
          appointSubmit: appointSubmit
        },
        success: result => {
          alert(result);
          window.location.replace("appointment.php");
        },
        error: err => {
          alert(new Error("ERROR"));
          window.location.replace("appointment.php");
        }
      });
    }
  });

  $(".close").on("click", function() {
    $("#appointmentModal").removeClass("show-modal");
  });
});
