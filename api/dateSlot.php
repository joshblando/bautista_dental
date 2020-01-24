<?php
require_once "../config/control.php";

if (isset($_GET['employee'])) {
    $employee = $_GET['employee'];
    $array = array();


    $sql_timeSlot = "SELECT date from schedule WHERE employeeId = :employeeId";
    $stmt_timeSlot = $connect->prepare($sql_timeSlot);
    $stmt_timeSlot->execute(["employeeId" => $employee]);
    $timeSlots = $stmt_timeSlot->fetchAll();

    foreach ($timeSlots as $ts) {
        $array[] = array(
            "date" => $ts['date']

        );
    }
    echo json_encode($array);
}
