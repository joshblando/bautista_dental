<?php
require_once "../config/control.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Error'); window.location.replace('../login.php')</script>";
    } else {
        $checkUser = "SELECT * FROM user WHERE email = :email";
        $stmt = $connect->prepare($checkUser);
        $stmt->execute(["email" => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $password_check = password_verify($password, $user['password']);

            if ($password_check == false) {
                echo "<script>alert('Password incorrect'); window.location('../login.php')</script>";
            } else if ($password_check == true) {
                session_start();

                $_SESSION['id'] = $user['id'];
                $_SESSION['userId'] = $user['userId'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['photo'] = $user['photo'];

                echo "<script>alert('Log in Success');window.location.replace('../appointment.php')</script>;";
            } else {
                echo "<script>alert('Error123'); window.location.replace('../login.php')</script>";
            }
        } else {
            echo "<script>alert('User Not Found');window.location.replace('../login.php')</script>";
        }
    }
}
