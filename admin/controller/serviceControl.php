<?php
require_once "../../config/control.php";
session_start();
if (isset($_POST["addService"])) {
    $categoryId = $_POST['category'];
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    if (empty($name)) {
        echo "<script>alert('Name is empty');window.location.replace('../services.php')</script>";
    } else if (empty($duration)) {
        echo "<script>alert('Duration is missing');window.location.replace('../services.php')</script>";
    } else if (empty($description)) {
        echo "<script>alert('Description is missing');window.location.replace('../services.php')</script>";
    } else {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);

        $data = [
            "serviceId" => $generatedID,
            "name" => $name,
            "description" => $description,
            "duration" => $duration,
            "categoryId" => $categoryId
        ];

        $addAdmin = $connect->prepare("INSERT INTO service (serviceId, name, duration, description, categoryId)
                            values (:serviceId, :name ,:duration,:description, :categoryId)");
        $addAdmin->execute($data);

        echo "<script>alert('Added successfully'); window.location.replace('../service.php?categoryId=$categoryId')</script>";
    }
}
