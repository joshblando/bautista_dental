<?php
require 'define.php';

//SET DSN

$dsn = 'mysql:host=' . HOST . ';dbname=' . DB;

//CREATE PDO Instance

$connect = new PDO($dsn, USER, PASSWORD_DB);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function notification($notifiable, $details, $redirect_url, $connect){

	$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $shuffled = str_shuffle($str);
    $generatedID = substr($shuffled, 0, 8);

    $notif_result = [
        "notif_id" => $generatedID,
        "notifiable" => $notifiable,
        "details" => $details,
        "url" => $redirect_url,
    ];

    $newNotification = $connect->prepare("INSERT INTO notification (notif_id, notifiable, details, redirectUrl)
                                                VALUES(:notif_id, :notifiable, :details, :url)");
    $newNotification->execute($notif_result);

}
