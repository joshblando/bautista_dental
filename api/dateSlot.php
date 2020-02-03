<?php
require_once "../config/control.php";

    if (isset($_GET['employee'])) {
        $employee = $_GET['employee'];
        $array = array();


    // $sql_timeSlot = "SELECT date from schedule WHERE employeeId = :employeeId";
    // $stmt_timeSlot = $connect->prepare($sql_timeSlot);
    // $stmt_timeSlot->execute(["employeeId" => $employee]);
    // $timeSlots = $stmt_timeSlot->fetchAll();

    // foreach ($timeSlots as $ts) {
    //     $array[] = array(
    //         "date" => $ts['date']

    //     );

        for ($i=01; $i <= 12; $i++) { 
            for ($e=01; $e <= 31; $e++) { 
                array_push($array, date('Y').'-'.$i.'-'.$e);
            }
        }
        echo json_encode($array);
    }
?>
