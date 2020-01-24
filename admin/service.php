<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['adminId'])) {
    echo "<script>window.location.replace('./login.php')</script>";
}
require_once "../config/control.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf-6.4.3/dt-1.10.20/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.css" />
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/service.css">
    <title>Document</title>
    <style>
        .timeSlots {
            font-size: 12px !important;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <?php
        include 'nav.php'
        ?>
        <main class="main">
            <div class="main-content white-bg">
                <div class="service-content">
                    <div class="service-content_details">
                        <?php

                        $categoryId = $_GET['categoryId'];

                        $getCategory = $connect->prepare("SELECT * from category WHERE categoryId = :categoryId");
                        $getCategory->execute(["categoryId" => $categoryId]);
                        $category = $getCategory->fetch(PDO::FETCH_ASSOC);
                        $name = $category["name"];
                        $description = $category['description'];

                        ?>
                        <div class="edit_cont">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="photo-container">
                            <img src="https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="service-info">
                            <h4><?php echo $name ?></h4>
                            <h6><?php echo $description ?></h6>

                        </div>
                    </div>
                    <div class="service-content_header">
                        <h3>Schedules</h3>
                        <div class="add_service button" id="addCategory"><i class="fas fa-plus"></i> Add Service</div>
                    </div>
                    <div class="service-content_schedule">
                        <div class="service-schedule_container">
                            <?php
                            $categoryId = $_GET['categoryId'];
                            $getServices = $connect->prepare("SELECT * FROM service WHERE categoryId = :categoryId");
                            $getServices->execute(["categoryId" => $categoryId]);
                            $services = $getServices->fetchAll();

                            foreach ($services as $service) {
                                $photo = $service['photo'];
                                $name = $service['name'];
                                $duration = $service['duration'];
                                $dur = ($duration * 60) . " minute(s)";
                                $description = $service['description'];

                            ?>
                                <div class="service-item">
                                    <div class="service-img"><?php echo $name ?></div>
                                    <div class="service-duration"><?php echo $dur ?></div>
                                    <div class="service-description"><?php echo $description ?></div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <!-- The Modal -->
    <div id="addCategoryModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content modal-size_md">
            <!-- <input type="hidden" name="employeeId" id="employeeId" value="<?php echo $_GET['employeeId'] ?>"> -->
            <div class="modal-header">
                <span class="close" id="closeModal">&times;</span>
                <h4>Add new service</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-control">

                    <div class="form-avatar">
                        <div class="avatar-container">
                            <img src="https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="form-details">


                        <div class="form-input">
                            <input type="text" name="name" id="name" autocomplete="off">
                            <label for="name" class="label-input">
                                <span class="content-input_name">Name</span>
                            </label>
                        </div>
                        <div class="form-input">
                            <select name="duration" id="">
                                <option disabled selected>Duration</option>
                                <option value="0.5">30 min</option>
                                <option value="1">60 min</option>
                                <option value="1.5">90 min</option>
                                <option value="2">120 min</option>
                                <option value="2.5">150 min</option>
                                <option value="3">180 min</option>
                            </select>
                        </div>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>


                        <button type="submit" class="button" name="addService">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0c5646b481.js"></script>
    <script src="./js/moment.min.js"></script>
    <script src="./js/service.js"></script>




</body>

</html>
<?php


if (isset($_POST["addService"])) {
    $categoryId = $_GET['categoryId'];
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];

    if (empty($name)) {
        echo "<script>alert('Name is empty');window.location.replace('services.php')</script>";
    } else if (empty($duration)) {
        echo "<script>alert('Duration is missing');window.location.replace('services.php')</script>";
    } else if (empty($description)) {
        echo "<script>alert('Description is missing');window.location.replace('services.php')</script>";
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

        echo "<script>alert('Added successfully'); window.location.replace('service.php?categoryId=$categoryId')</script>";
    }
}
