<?php
require_once "../config/control.php";

if (isset($_POST['register'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($firstName) || empty($lastName) || empty($contact) || empty($email) || empty($password)) {
        echo "<script>alert('Error'); window.location.replace('../register.php')</script>";
    } else {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            "userId" => $generatedID,
            "firstName" => $firstName,
            "lastName" => $lastName,
            "contact" => $contact,
            "email" => $email,
            "password" => $hashedPassword
        ];

        $registerUser = $connect->prepare("INSERT INTO user (userId, firstName, lastName, contact,email, password)
        values (:userId, :firstName, :lastName, :contact, :email, :password)");
        $registerUser->execute($data);

        echo "<script>alert('Register successfully'); window.location.replace('../login.php')</script>";
    }
}
