<?php
session_start();
require_once "../config/control.php";

if (isset($_POST['appointSubmit'])) {

    $user = $_SESSION['userId'];
    $employee = $_POST['employeeAppoint'];
    $date = new DateTime($_POST['dateAppoint']);
    $dateFormat = $date->format("Y-m-d");
    $dateString = $date->format("M d Y");
    $start = $_POST['timeAppoint'];
    $service = $_POST['serviceId'];
    $duration = $_POST['serviceDuration'];
    $message = $_POST['message'];
    $appointTimeLength = $_POST['appointTimeLength'];
    $appointTime = implode(",", $appointTimeLength);
    $status = "PENDING";
    $cancel = "CANCEL";
    $generatedID = $_POST['ap'];


    $service_end = strtotime($start) + 60*(60*$duration);
    $end = date('h:i a', $service_end);

    if (!$user) {
        echo "You must Log in to continue";
    }

    $checkAppointment = $connect->prepare("SELECT date, start FROM appointment WHERE date= :date && userId = :userId && status != :cancel ");
    $checkAppointment->execute(["date" => $dateFormat, "userId" => $user, "cancel" => $cancel]);
    $rowCheckAppointment = $checkAppointment->fetch(PDO::FETCH_ASSOC);
    $checkDate = $rowCheckAppointment['date'];
    $checkTime = $rowCheckAppointment['start'];

    if (($dateFormat === $checkDate) && ($start === $checkTime)) {
        echo "You already set an appointment on " . $dateString;
    } else {

        // INSERT TO APPOINTMENT

        $appointment_result = [
            "appointmentId" => $generatedID,
            "userId" => $user,
            "serviceId" => $service,
            "employeeId" => $employee,
            "date" => $dateFormat,
            "start" => $start,
            'end' => $end,
            "duration" => $duration,
            "time" => $appointTime,
            "message" => $message,
            "status" => $status
        ];

        $newAppointment = $connect->prepare("INSERT INTO appointment (appointmentId, userId, serviceId, employeeId, date, start, end, duration, time, message, status)
                                                    VALUES(:appointmentId, :userId, :serviceId, :employeeId, :date, :start, :end, :duration, :time, :message, :status)");
        $newAppointment->execute($appointment_result);


        // UPDATE THE CURRENT SCHEDULE
        // $checkSchedule = $connect->prepare("SELECT time from schedule WHERE employeeId = :employeeId && date = :date");
        // $checkSchedule->execute(["employeeId" => $employee, "date" => $dateFormat]);
        // $checkTimeRow = $checkSchedule->fetch(PDO::FETCH_ASSOC);
        // $checkTime = $checkTimeRow['time'];
        //
        // $checkTimeArray = explode(",", $checkTime);
        //
        // $timeDiffResult = array_diff($checkTimeArray, $appointTimeLength);
        // $timeDiffResultString = implode(",", $timeDiffResult);
        //
        // $updateData = [
        //     "timeDiff" => $timeDiffResultString,
        //     "employeeId" => $employee,
        //     "date" => $dateFormat
        // ];
        // $updateSchedule = $connect->prepare("UPDATE schedule
        //                                     SET time=:timeDiff
        //                                     WHERE employeeId=:employeeId && date =:date");
        // $updateSchedule->execute($updateData);


        getNotifiable($generatedID, $connect);

        echo "SUCCESS";
    }
} else {
    echo "something went wrong";
}

function getNotifiable($appointmentId, $connect){

        $sql_notifiable = "SELECT ap.userId, em.firstName, em.lastName, em.title, sr.firstName AS fname, sr.lastName AS lname FROM (appointment as ap LEFT JOIN employee as em ON ap.employeeId = em.employeeId) RIGHT JOIN user as sr ON ap.userId = sr.userId WHERE appointmentId=:appointmentId";
        $notifications = $connect->prepare($sql_notifiable);
        $notifications->execute(["appointmentId" => $appointmentId]);
        $notify = $notifications->fetchAll();

        $user = 'ADMIN';
        $fullname_dentist = $notify[0]['title'].' '.$notify[0]['firstName'].' '.$notify[0]['lastName'] ;
        $fullname_user = $notify[0]['fname'].' '.$notify[0]['lname'] ;

        $message = $fullname_user.' set an appointment to '. $fullname_dentist;


        notification($user, $message, 'appointment.php', $connect);
}
