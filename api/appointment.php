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

    if (!$user) {
        echo "You must Log in to continue";
    }

    $checkAppointment = $connect->prepare("SELECT date FROM appointment WHERE date= :date && userId = :userId && status != :cancel ");
    $checkAppointment->execute(["date" => $dateFormat, "userId" => $user, "cancel" => $cancel]);
    $rowCheckAppointment = $checkAppointment->fetch(PDO::FETCH_ASSOC);
    $checkDate = $rowCheckAppointment['date'];

    if ($dateFormat === $checkDate) {
        echo "You already set an appointment on " . $dateString;
    } else {

        // INSERT TO APPOINTMENT
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);

        $appointment_result = [
            "appointmentId" => $generatedID,
            "userId" => $user,
            "serviceId" => $service,
            "employeeId" => $employee,
            "date" => $dateFormat,
            "start" => $start,
            "duration" => $duration,
            "time" => $appointTime,
            "message" => $message,
            "status" => $status
        ];

        $newAppointment = $connect->prepare("INSERT INTO appointment (appointmentId, userId, serviceId, employeeId, date, start, duration, time, message, status)
                                                    VALUES(:appointmentId, :userId, :serviceId, :employeeId, :date, :start, :duration, :time, :message, :status)");
        $newAppointment->execute($appointment_result);


        // UPDATE THE CURRENT SCHEDULE
        $checkSchedule = $connect->prepare("SELECT time from schedule WHERE employeeId = :employeeId && date = :date");
        $checkSchedule->execute(["employeeId" => $employee, "date" => $dateFormat]);
        $checkTimeRow = $checkSchedule->fetch(PDO::FETCH_ASSOC);
        $checkTime = $checkTimeRow['time'];

        $checkTimeArray = explode(",", $checkTime);

        $timeDiffResult = array_diff($checkTimeArray, $appointTimeLength);
        $timeDiffResultString = implode(",", $timeDiffResult);

        $updateData = [
            "timeDiff" => $timeDiffResultString,
            "employeeId" => $employee,
            "date" => $dateFormat
        ];
        $updateSchedule = $connect->prepare("UPDATE schedule 
                                            SET time=:timeDiff 
                                            WHERE employeeId=:employeeId && date =:date");
        $updateSchedule->execute($updateData);

        echo "SUCCESS";
    }
} else {
    echo "something went wrong";
}
