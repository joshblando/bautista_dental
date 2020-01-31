<?php

    require_once "../config/control.php";

    $sql_appointmentSlot = "SELECT * from appointment as ap INNER JOIN service as av ON ap.serviceId = av.serviceId LEFT JOIN employee as em ON ap.employeeId = em.employeeId";
    $appoinments = $connect->prepare($sql_appointmentSlot);
    $appoinments->execute();
    $appoinmentSched = $appoinments->fetchAll();
    $appoinments_array = [];
    foreach ($appoinmentSched as $key => $value) {
      $color = '#860938';

      if ($value['status'] == 'PENDING') {
        $color = '#ed6f14';
      }
      $appoinments_array[$key] = [
        'title' => $value['title'].' '.$value['firstName'].' '.$value['lastName'],
        'start' => date('Y-m-d H:i:s', strtotime($value['date'].''.$value['start'])),
        'color' => $color,
        'sample' => $value['name'],
        'sched' => $value['date'],
        'time' => $value['start'],


      ];
    }
    echo json_encode($appoinments_array);
?>
