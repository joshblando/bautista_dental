<?php 
	require_once "../config/control.php";
	
	$array = array('7:00 AM', '8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM');


	$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $shuffled = str_shuffle($str);
    $generatedID = substr($shuffled, 0, 8);

    $dateSched = $connect->prepare("SELECT time FROM schedule WHERE date= :date && userId = :userId");
    $dateSched->execute(["date" => $_GET['date'], "userId" => $_GET['employee'], "time" => $_GET['time']]);
    $rowdateSched = $dateSched->fetch(PDO::FETCH_ASSOC);

    $sched_result = [
        "scheduleId" => $generatedID,
        "employeeId" => $_GET['employee'],
        "date" => $_GET['date'],
        "time" => $_GET['time'],
    ];

    $newTimeSched = $connect->prepare("INSERT INTO schedule (scheduleId, employeeId, date, time)
                                                VALUES(:scheduleId, :employeeId, :date, :time)");
    $newTimeSched->execute($sched_result);

    // echo '<script>
    //          alert("Appointment Successfully Approved");
    //          window.location="../admin/time-sched.php";
    //       </script>';
  
?>