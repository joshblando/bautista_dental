<?php
require_once "../../config/control.php";

if (isset($_GET['employeeId'])) {
    $employeeId = $_GET['employeeId'];

    $json_array =  array();

    $getSchedules = $connect->prepare("SELECT * FROM schedule WHERE employeeId=:employeeId");
    $getSchedules->execute(["employeeId" => $employeeId]);
    $schedules = $getSchedules->fetchAll();

    foreach ($schedules as $sched) {
        $date = new DateTime($sched['date']);
        $date_format = $date->format("m-d-Y");
        $json_array[] = array(
            "date" => $date_format,
            "timeSlot" => explode(",", $sched['time'])
        );
    };

    echo json_encode($json_array);
}
