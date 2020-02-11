<?php 

	require_once "../config/control.php";

	

	if ($_GET['action'] == 'approve') {
		$updateData = [
            "status" => "APPROVED",
            "appointmentId" => $_GET['id'],
	    ];
	    $updateSchedule = $connect->prepare("UPDATE appointment
	                                        SET status=:status
	                                        WHERE appointmentId=:appointmentId");
	    $updateSchedule->execute($updateData); 


		getNotifiable($_GET['id'], $connect, 'Approved');

	    echo '<script>
	             alert("Appointment Successfully Approved");
		         window.location="../admin/calendar.php";
		      </script>';
	    // exit();
	}
	elseif ($_GET['action'] == 'cancel') {
		$updateData = [
            "status" => "CANCELED",
            "appointmentId" => $_GET['id'],
	    ];
	    $updateSchedule = $connect->prepare("UPDATE appointment
	                                        SET status=:status
	                                        WHERE appointmentId=:appointmentId");
	    $updateSchedule->execute($updateData); 	
		
		getNotifiable($_GET['id'], $connect, 'Canceled');

	    echo '<script>
	             alert("Appointment has been Canceled");
		         window.location="../admin/calendar.php";
		      </script>';
	}
	else{
		echo '<script>
	             alert("Something Went Wrong");
		         window.location="../admin/calendar.php";
		      </script>';
	}

	
	function getNotifiable($appointmentId, $connect, $action){

		    $sql_notifiable = "SELECT ap.userId, em.firstName, em.lastName, em.title FROM appointment as ap LEFT JOIN employee as em ON ap.employeeId = em.employeeId WHERE appointmentId=:appointmentId";
		    $notifications = $connect->prepare($sql_notifiable);
		    $notifications->execute(["appointmentId" => $appointmentId]);
		    $notify = $notifications->fetchAll();

		    $user = $notify[0]['userId']; 
		    $fullname = $notify[0]['title'].' '.$notify[0]['firstName'].' '.$notify[0]['lastName'] ; 
	    	$message = 'Your Appointment with '.$fullname.' has been Approved';


		    notification($user, $message, '../userAccount.php', $connect);
	}


?>