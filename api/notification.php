<?php  
	 require_once "../config/control.php";
     session_start();

     $userId = $_SESSION['userId'];

    $getNotification = $connect->prepare("SELECT * from notification WHERE notifiable =:userId");
    $getNotification->execute(['userId' => $userId]);
    $notif = $getNotification->fetchAll();

    $getNotificationUnread = $connect->prepare("SELECT count(id) as unread from notification WHERE notifiable=:userId && readAt=null");
    $getNotificationUnread->execute(['userId' => $userId]);
    $notif_unread = $getNotificationUnread->fetchAll();
    $array = [];

    

    foreach ($notif as $key => $value) {
    	$array[] = [
    		'details' => $value['details'],
    		'url_redirect' => $value['redirectUrl'],
    		'id' => $value['notif_id'],
    		'unread' => $notif_unread[0]['unread'],
    	];
    }

    echo json_encode($array);

?>