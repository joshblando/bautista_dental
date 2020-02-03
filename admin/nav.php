<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (empty($_SESSION['adminId'])) {
  echo "<script>window.location.replace('./login.php')</script>";
}
require "../config/control.php"
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Bautisa Dental Center</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style/style5.css">

    <!-- Font Awesome JS -->
    <script src="js/solid.js"></script>
    <script src="js/fontawesome.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <style type="text/css">
        #sidebar ul li a {
            padding: 16px !important;
            font-size: 15px !important;
        }
        body{
            font-size: 14px;
        }
        .navbar{
            padding: 10px !important;
        }
        .fc-event{
            border-radius: 10px !important;
            color: #fff !important;
            padding:5px !important;
        }
        .nav-item{
            padding: 0px 10px !important;
        }
        .message__container a.dropdown-item{
            border-bottom: 1px solid #dce3ea !important;
            max-height: 183px;
            contain: layout;
            overflow-y: auto;
        }
    </style>

</head>

<body>

  <?php
    include './modals/add-admin.php';
    include './modals/add-employee.php';
    include './modals/add-services.php';
    include './modals/event-details.php';
    include './modals/calendar-action.php';
    include './modals/message.php';

   ?>
    <?php

        $adminId = $_SESSION['adminId'];
        $getAdmin = $connect->prepare("SELECT * FROM admin WHERE adminId=:adminId");
        $getAdmin->execute(["adminId" => $adminId]);
        $admin = $getAdmin->fetch(PDO::FETCH_ASSOC);
        $photo = $admin['photo'];
        $name = $admin['firstName'] . " " . $admin['lastName'];
     ?>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
               <h3><?php echo $name ? $name : "John Doe" ?></h3>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Schedules</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="appointment.php">Appointments</a>
                        </li>
                        <li>
                            <a href="calendar.php">Calendar</a>
                        </li>
                         <li>
                            <a href="time-sched.php">Dentists</a>
                        </li>
                    </ul>
                </li>
                  <li>
                    <a href="message.php">Messages</a>
                </li>
                <li>
                    <!-- <a href="#">Accounts</a> -->
                    <a href="#pageAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Accounts</a>
                    <ul class="collapse list-unstyled" id="pageAccount">
                        <li>
                            <a href="./users.php">Users</a>
                        </li>
                        <li>
                            <a href="admin.php">Admins</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <!-- <a href="#">Accounts</a> -->
                    <a href="#pageContent" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Content Management</a>
                    <ul class="collapse list-unstyled" id="pageContent">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <!-- <a href="#">Accounts</a> -->
                    <a href="#pageFile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">File Maintenance</a>
                    <ul class="collapse list-unstyled" id="pageFile">
                        <li>
                            <a href="employees.php">Employees</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">Reports</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                              <li class="nav-item dropdown pl-2 pr-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-bell"></i>
                                </a>
                                <div class="dropdown-menu message__container" style="left:-338px !important;" aria-labelledby="navbarDropdownMenuLink2">
                                    <a class="dropdown-item" href="userAccount.ph">this is a sample message</a>
                                </div>
                            </li>
                            <li class="nav-item notif__conts">
                               <a class="nav-link" href="./controller/logout.php?logout=<?php echo $_SESSION['id'] ?>"><span class="logout-content"><i class="fas fa-sign-out-alt logout"></i></span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
             <script src="../js/jquery.min.js"></script>
            <script src="../js/jquery-ui.min.js"></script>
            <script src="js/notification.js"></script>
