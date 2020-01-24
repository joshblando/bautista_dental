<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./config/control.php";
$userId = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/fh-3.1.6/r-2.2.3/rg-1.1.1/datatables.min.css" />
    <link rel="stylesheet" href="./style/nav.css" />
    <link rel="stylesheet" href="./style/general.css" />
    <link rel="stylesheet" href="./style/user.css" />
    <title>Document</title>
</head>

<body>
    <?php
    include "./component/navigation.php"
    ?>

    <div class="user-container">
        <div class="user-header">
            <h1>My Account</h1>
        </div>
        <div class="user-details">
            <div class="user-details_content">
                <div class="user-photo">
                    <img src="https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                    <button class="photo-btn">Upload</button>
                </div>
                <div class="user-info">
                    <?php
                    $myInfo = $connect->prepare("SELECT * FROM user WHERE userId = :userId");
                    $myInfo->execute(["userId" => $userId]);
                    $info = $myInfo->fetch(PDO::FETCH_ASSOC);

                    $firstName = $info['firstName'];
                    $lastName = $info['lastName'];
                    $contact = $info['contact'];
                    $email = $info['email'];
                    ?>
                    <div class="user-info_content">
                        <div class="list-item">
                            <label class="list-item_label">My ID</label>
                            <span class="list-item_info"><?php echo $userId ?></span>
                        </div>
                        <div class="list-item">
                            <label class="list-item_label">First Name</label>
                            <span class="list-item_info"><?php echo $firstName ?></span>
                        </div>
                        <div class="list-item">
                            <label class="list-item_label">Last Name</label>
                            <span class="list-item_info"><?php echo $lastName ?></span>
                        </div>
                        <div class="list-item">
                            <label class="list-item_label">Email</label>
                            <span class="list-item_info"><?php echo $email ?></span>
                        </div>
                        <div class="list-item">
                            <label class="list-item_label">Contact</label>
                            <span class="list-item_info"><?php echo $contact ?></span>
                        </div>
                    </div>
                    <div class="button-group">
                        <button>Edit</button>
                        <button>Change Password</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-appointment_table">
            <h3>Appointments</h3>
            <table id="table" class="display dt-responsive nowrap table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Appoint ID</th>
                        <th>Service</th>
                        <th>Dentist</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $userAppointments = $connect->prepare("SELECT * FROM appointment WHERE userId = :userId");
                    $userAppointments->execute(["userId" => $userId]);
                    $appointments = $userAppointments->fetchAll();

                    foreach ($appointments as $appointment) {
                        $appointmentId = $appointment['appointmentId'];
                        $serviceId = $appointment['serviceId'];
                        $employeeId = $appointment['employeeId'];
                        $date = new DateTime($appointment['date']);
                        $dateFormat = $date->format("M d Y");
                        $start = $appointment['start'];
                        $status = $appointment['status'];

                        //get the service name
                        $getService = $connect->prepare("SELECT name from service WHERE serviceId = :serviceId");
                        $getService->execute(["serviceId" => $serviceId]);
                        $getServiceRow = $getService->fetch(PDO::FETCH_ASSOC);
                        $serviceName = $getServiceRow['name'];

                        //get the dentist name
                        $getDentist = $connect->prepare("SELECT title, firstName, lastName FROM employee WHERE employeeId = :employeeId");
                        $getDentist->execute(["employeeId" => $employeeId]);
                        $getDentistRow = $getDentist->fetch(PDO::FETCH_ASSOC);
                        $dentistName = $getDentistRow['title'] . " " . $getDentistRow['firstName'] . " " . $getDentistRow['lastName'];



                    ?>
                        <tr>
                            <td><?php echo $appointmentId ?></td>
                            <td><?php echo $serviceName ?></td>
                            <td><?php echo $dentistName ?></td>
                            <td><?php echo $dateFormat ?></td>
                            <td><?php echo $start ?></td>
                            <td><?php echo $status ?></td>
                            <td><i class="fas fa-eye"></i><i class="fas fa-ban"></i></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/fh-3.1.6/r-2.2.3/rg-1.1.1/datatables.min.js"></script>
    <script src="https://kit.fontawesome.com/0c5646b481.js"></script>
    <script src="./js/nav.js"></script>
    <script src="./js/user.js"></script>
</body>

</html>