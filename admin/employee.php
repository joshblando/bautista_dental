<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../config/control.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf-6.4.3/dt-1.10.20/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.css" />
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/employee.css">
    <title>Document</title>
    <style>
        .timeSlots {
            font-size: 12px !important;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <?php
        include 'nav.php'
        ?>
        <main class="main">
            <div class="main-content white-bg">
                <div class="employee-content">
                    <div class="employee-content_details">
                        <?php

                        $employeeId = $_GET['employeeId'];

                        $getEmployee = $connect->prepare("SELECT * from employee WHERE employeeId = :employeeId");
                        $getEmployee->execute(["employeeId" => $employeeId]);
                        $employee = $getEmployee->fetch(PDO::FETCH_ASSOC);
                        $name = $employee["title"] . " " . $employee['firstName'] . " " . $employee['lastName'];
                        $role = $employee['role'];
                        $contact = $employee['contact'];
                        $email = $employee['email'];
                        ?>
                        <div class="edit_cont">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="photo-container">
                            <img src="https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="employee-info">
                            <h4><?php echo $name ?></h4>
                            <h6><?php echo $role ?></h6>
                            <h6><?php echo $contact ?></h6>
                        </div>
                    </div>
                    <div class="employee-content_header">
                        <h3>Schedules</h3>
                        <div class="add_sched button" id="addSched"><i class="fas fa-plus"></i> Add schedule</div>
                    </div>
                    <div class="employee-content_schedule">
                        <div class="employee-schedule_container" id="schedContainer">

                            <!-- <div class="sched-item" id="schedItem">
                                <div class="date" id="dates"></div>
                                <div class="timeSlots" id="timeSlots">


                                </div>
                            </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <!-- The Modal -->
    <div id="addSchedule" class="modal">

        <!-- Modal content -->
        <div class="modal-content modal-size_md">
            <!-- <input type="hidden" name="employeeId" id="employeeId" value="<?php echo $_GET['employeeId'] ?>"> -->
            <div class="modal-header">
                <span class="close" id="closeModal">&times;</span>
                <h4>Add new admin</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-control">
                    <input type="date" name="date" id="date" required>
                    <select name="start" id="workStart" required>
                        <option disabled selected>Work start</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="5:30 AM">5:30 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="6:30 AM">6:30 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                        <option value="7:30 AM">7:30 AM</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="6:30 PM">6:30 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="7:30 PM">7:30 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="8:30 PM">8:30 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="9:30 PM">9:30 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="10:30 PM">10:30 PM</option>
                        <option value="11:00 PM">11:00 PM</option>
                        <option value="11:30 PM">11:30 PM</option>

                    </select>
                    <select name="workDuration" id="workDuration" required>
                        <option disabled selected>Work Duration</option>
                        <option value="1">1 hour</option>
                        <option value="2">2 hours</option>
                        <option value="3">3 hours</option>
                        <option value="4">4 hours</option>
                        <option value="5">5 hours</option>
                        <option value="6">6 hours</option>
                        <option value="7">7 hours</option>
                        <option value="8">8 hours</option>
                        <option value="9">9 hours</option>
                    </select>
                    <select name="breakStart" id="breakStart" required>
                        <option disabled selected>Break start</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="5:30 AM">5:30 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="6:30 AM">6:30 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                        <option value="7:30 AM">7:30 AM</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="6:30 PM">6:30 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="7:30 PM">7:30 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="8:30 PM">8:30 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="9:30 PM">9:30 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="10:30 PM">10:30 PM</option>
                        <option value="11:00 PM">11:00 PM</option>
                        <option value="11:30 PM">11:30 PM</option>
                    </select>
                    <select name="breakDuration" id="breakDuration" required>
                        <option disabled selected>Break Duration</option>
                        <option value="0.5">30 minutes</option>
                        <option value="1">60 minutes</option>
                        <option value="1.5">90 minutes</option>
                        <option value="2">120 minutes</option>
                        <option value="2.5">150 minutes</option>
                        <option value="3">180 minutes</option>
                    </select>
                    <button type="submit" class="button" id="addNewSched">Add new sched</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0c5646b481.js"></script>
    <script src="./js/moment.min.js"></script>
    <script src="./js/employee.js"></script>
    <script src="./js/schedule.js"></script>

    <script>
        $(document).ready(function() {

            let searchParams = new URLSearchParams(window.location.search);
            const employeeId = searchParams.get('employeeId');

            const timelineLabels = (
                desiredStartTime,
                timeLength,
            ) => {
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

            $("#date").on("change", function() {
                const date = moment($('#date').val()).format("DD-MM-YYYY");
            })
            $("#workStart").on("change", function() {
                const workStart = $(this).children("option:selected").val();
            })
            $("#workDuration").on("change", function() {
                const workDuration = $(this).children("option:selected").val();
            })

            $("#breakStart").on("change", function() {
                const breakStart = $(this).children("option:selected").val();
            })

            $("#breakDuration").on("change", function() {
                const breakDuration = $(this).children("option:selected").val();
            })

            $("#form-control").on("submit", function(e) {
                e.preventDefault();
                const submit = $("#form-control").val();


                const workingTimeLength = timelineLabels(workStart.value, workDuration.value);
                const breakTimeLength = timelineLabels(breakStart.value, breakDuration.value);

                let finalTimeLength = workingTimeLength.filter(item => {
                    return !breakTimeLength.includes(item);
                });

                $.ajax({
                    url: "./ajax/schedule.php",
                    type: "POST",
                    data: {
                        employeeId: employeeId,
                        date: date.value,
                        finalTimeLength: finalTimeLength,
                        breakTimeLength: breakTimeLength,
                        submit: submit
                    },
                    success: (res) => {
                        alert(res);
                        window.location.replace(`./employee.php?employeeId=${employeeId}`);
                    },
                    error: (err) => {
                        throw err;
                    }
                })

            })



            // fetch time
            $.ajax({
                type: "GET",
                url: "./ajax/time.php",
                data: {
                    employeeId: employeeId
                },
                dataType: "JSON",
                success: (result) => {


                    for (let i = 0; i < result.length; i++) {
                        const timeSlots = result[i].timeSlot;

                        const schedItem = "<div class='sched-item' id='schedItem'>" + "<div class='date' id='dates'>" + result[i].date + "</div>" + "<div class='timeSlots'>" + result[i].timeSlot + "</div>" + "</div>";
                        $("#schedContainer").append(schedItem)

                    }


                }
            })



        })
    </script>

</body>

</html>