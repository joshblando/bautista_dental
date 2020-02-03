<?php
	require_once "../../config/control.php";

	$updateData = [
        "id" => $_GET['id'],
        "date" => date('Y-m-d'),
    ];

    $updateSchedule = $connect->prepare("UPDATE notification
                                        SET readAt=:date
                                        WHERE notif_id=:id");
    $updateSchedule->execute($updateData); 


    echo '<script>
	         window.location="../'.$_GET['redirect_url'].'";
	      </script>';

?>