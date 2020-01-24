<?php
require_once "../config/control.php";

if (isset($_GET['checkDate'])) {
    $checkDate = $_GET['checkDate'];
    $employee = $_GET['employee'];
    $array = array();


    $sql_timeSlot = "SELECT time from schedule WHERE date = :checkDate && employeeId=:employee";
    $stmt_timeSlot = $connect->prepare($sql_timeSlot);
    $stmt_timeSlot->execute(["checkDate" => $checkDate, "employee" => $employee]);
    $timeSlots = $stmt_timeSlot->fetchAll();

    foreach ($timeSlots as $ts) {

        $array[] = array(
            "time" => explode(",", $ts['time'])
        );
    }
    echo json_encode($array);
}
