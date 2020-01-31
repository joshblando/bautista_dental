<?php
require_once "../config/control.php";

if (isset($_GET['checkDate'])) {
    $checkDate = $_GET['checkDate'];
    $employee = $_GET['employee'];
    $array1 = array('7:00 AM', '8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM');
    $array2 = array() ?? [];

    // $sql_timeSlot = "SELECT time from schedule WHERE employeeId=:employee";
    // $stmt_timeSlot = $connect->prepare($sql_timeSlot);
    // $stmt_timeSlot->execute(["employee" => $employee]);
    // $timeSlots = $stmt_timeSlot->fetchAll();



    $sql_appointmentSlot = "SELECT start from appointment WHERE employeeId=:employee && date=:date";
    $appoinment_timeSlot = $connect->prepare($sql_appointmentSlot);
    $appoinment_timeSlot->execute(["employee" => $employee, "date" => $checkDate]);
    $appoinmentSlots = $appoinment_timeSlot->fetchAll();


    // $array1 = explode(',',$timeSlots[0]['time']);
    if (!empty($appoinmentSlots)) {
      foreach ($appoinmentSlots as $ta) {
        array_push($array2, $ta['start']);
      }

      $newData = array_diff($array1, $array2);
      echo json_encode($newData);
    }
    else{
      echo json_encode($array1);
    }
}
