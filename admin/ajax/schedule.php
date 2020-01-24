<?php

require_once "../../config/control.php";


if (isset($_POST['submit'])) {
    $employeeId = $_POST['employeeId'];
    $finalTimeLength = $_POST['finalTimeLength'];
    $date = new DateTime($_POST['date']);
    $dateFormat = $date->format("Y-m-d");
    $dateString = $date->format("M d Y");
    $breakTimeLength = $_POST['breakTimeLength'];


    $checkSchedule  = $connect->prepare("SELECT date FROM schedule WHERE employeeId=:employeeId");
    $checkSchedule->execute(["employeeId" => $employeeId]);
    $dateSchedule = $checkSchedule->fetch(PDO::FETCH_ASSOC);
    $checkDate = $dateSchedule['date'];

    if ($dateFormat === $checkDate) {
        echo $dateString . " " . "already added";
    } else {

        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);

        $finalTimeImplode = implode(",", $finalTimeLength);
        $breakTimeImplode = implode(",", $breakTimeLength);

        $data = [
            "scheduleId" => $generatedID,
            "employeeId" => $employeeId,
            "date" => $dateFormat,
            "time" => $finalTimeImplode,
            "break" => $breakTimeImplode
        ];

        $addSchedule = $connect->prepare("INSERT INTO schedule (scheduleId, employeeId, date, time, break)
                                                VALUES (:scheduleId, :employeeId, :date,:time,:break)");
        $addSchedule->execute($data);

        echo "<script>alert('Added Successfully');window.location.replace('../employee.php?employeeId=.$employeeId.')</script>";
    }
} else {
    throw new Error("error");
}
