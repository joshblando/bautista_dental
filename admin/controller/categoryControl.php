<?php
require_once "../../config/control.php";
session_start();
if (isset($_POST["addCategory"])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    if (empty($name)) {
        echo "<script>alert('Name is empty');window.location.replace('../services.php')</script>";
    } else if (empty($description)) {
        echo "<script>alert('Description is missing');window.location.replace('../services.php')</script>";
    } else {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);

        $data = [
            "categoryId" => $generatedID,
            "name" => $name,
            "description" => $description
        ];

        $addAdmin = $connect->prepare("INSERT INTO category (categoryId, name, description)
                            values (:categoryId, :name ,:description)");
        $addAdmin->execute($data);

        echo "<script>alert('Added successfully'); window.location.replace('../services.php')</script>";
    }
}
