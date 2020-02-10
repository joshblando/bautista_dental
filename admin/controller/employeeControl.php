<?php
require_once "../../config/control.php";
session_start();
if (isset($_POST["addEmployee"])) {
    $title = $_POST['title'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $spec = $_POST['specialization'];


    if (empty($title)) {
        echo "<script>alert('Title not selected');window.location.replace('../employees.php')</script>";
    } else if (empty($firstName)) {
        echo "<script>alert('First name is missing');window.location.replace('../employees.php')</script>";
    } else if (empty($lastName)) {
        echo "<script>alert('Last name is missing');window.location.replace('../employees.php')</script>";
    } else if (empty($contact)) {
        echo "<script>alert('Contact Number is missing');window.location.replace('../employees.php')</script>";
    } else if (empty($email)) {
        echo "<script>alert('Email is missing');window.location.replace('../employees.php')</script>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email not valid');window.location.replace('../employees.php')</script>";
    } else if (empty($role)) {
        echo "<script>alert('Role not selected');window.location.replace('../employees.php')</script>";
    } else {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);

        $data = [
            "employeeId" => $generatedID,
            "title" => $title,
            "firstName" => $firstName,
            "lastName" => $lastName,
            "contact" => $contact,
            "email" => $email,
            "role" => $role,
            "specialization" => $spec

        ];

        $addAdmin = $connect->prepare("INSERT INTO employee (employeeId, title, firstName, lastName, contact, email, role, specialization)
                            values (:employeeId, :title ,:firstName, :lastName, :contact, :email,:role,:specialization)");
        $addAdmin->execute($data);

        echo "<script>alert('Added successfully'); window.location.replace('../employees.php')</script>";
    }
}
