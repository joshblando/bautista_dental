<?php
require_once "../../config/control.php";
if (isset($_POST['login'])) {
    $employeeId = $_POST['employeeId'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE employeeId = :employeeId";
    $stmt = $connect->prepare($sql);
    $stmt->execute(["employeeId" => $employeeId]);

    $rows1 = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rows1) {
        $password_check = password_verify($password, $rows1['password']);

        if ($password_check == false) {
            echo "<script>alert('Password incorrect');window.location('login.php')</script>";
        } else if ($password_check == true) {
            session_start();

            $_SESSION['id'] = $rows1['id'];
            $_SESSION['adminId'] = $rows1['adminId'];
            $_SESSION['lastName'] = $rows1['lastName'];
            $_SESSION['firstName'] = $rows1['firstName'];

            echo "<script>alert('Log in Success');window.location.replace('../index.php')</script>;";
        } else {
            echo "<script>alert('Error');window.location('login.php')</script>";
        }
    } else {
        echo "<script>alert('User Not Found');window.location('login.php')</script>";
    }
}
