<?php
require_once "../../config/control.php";
session_start();
if (isset($_POST["addAdmin"])) {
    $employeeId = $_POST['employeeId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];

    $checkAdmin = "SELECT employeeId FROM admin WHERE employeeId = :employeeId";
    $stmt_checkAdmin = $connect->prepare($checkAdmin);
    $stmt_checkAdmin->execute(["employeeId" => $employeeId]);
    $existedAdmin = $stmt_checkAdmin->fetch(PDO::FETCH_ASSOC);

    if ($employeeId === $existedAdmin['employeeId']) {
        echo "<script>alert('Admin existed already');window.location.replace('../admin.php')</script>";
    } else if (empty($employeeId)) {
        echo "<script>alert('Employee ID is missing');window.location.replace('../admin.php')</script>";
    } else if (empty($firstName)) {
        echo "<script>alert('First name is missing');window.location.replace('../admin.php')</script>";
    } else if (empty($lastName)) {
        echo "<script>alert('Last name is missing');window.location.replace('../admin.php')</script>";
    } else if (empty($password)) {
        echo "<script>alert('Password is missing');window.location.replace('../admin.php')</script>";
    } else {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            "adminId" => $generatedID,
            "firstName" => $firstName,
            "lastName" => $lastName,
            "employeeId" => $employeeId,
            "password" => $hashedPassword
        ];

        $addAdmin = $connect->prepare("INSERT INTO admin (adminId, firstName, lastName, employeeId, password)
                            values (:adminId, :firstName, :lastName, :employeeId, :password)");
        $addAdmin->execute($data);

        echo "<script>alert('Added successfully'); window.location.replace('../admin.php')</script>";
    }
}
