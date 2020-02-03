<?php  
	 require_once "../../config/control.php";

    $getNotification = $connect->prepare("SELECT * from notification WHERE notifiable = 'ADMIN'");
    $getNotification->execute();
    $notif = $getNotification->fetchAll();

    $getNotificationUnread = $connect->prepare("SELECT count(id) as unread from notification WHERE notifiable = 'ADMIN' && readAt = null");
    $getNotificationUnread->execute();
    $notif_unread = $getNotificationUnread->fetchAll();
    $array = [];

    // echo $notif_unread[0]['unread'];

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