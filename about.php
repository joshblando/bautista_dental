<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once "./config/control.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!-- <link rel="stylesheet" href="./style/nav.css" /> -->
  <!-- <link rel="stylesheet" href="./style/general.css" /> -->
  <link rel="stylesheet" href="./style/main.css" />
  <link rel="stylesheet" href="./style/home.css" />
  <link rel="stylesheet" type="text/css" href="./admin/style/swiper.css">

  <link rel="stylesheet" type="text/css" href="./admin/style/bootstrap.min.css">
  <style>
    .btn-outline{
      background: transparent;
      color: #fff;
      border-color: #fff;
    }
  </style>

  <title>Document</title>
</head>

<body>
  <?php
  include "./component/navigation.php";
  ?>

  <?php
	    require_once "./config/control.php";

        $getHistory = $connect->prepare("SELECT description from cms_content WHERE section='ABOUT' AND title = 'HISTORY'");
        $getHistory->execute();
        $history = $getHistory->fetchAll();

        $getMission = $connect->prepare("SELECT description from cms_content WHERE section='ABOUT' AND title = 'MISSION'");
        $getMission->execute();
        $mission = $getMission->fetchAll();

        $getVision = $connect->prepare("SELECT description from cms_content WHERE section='ABOUT' AND title = 'VISION'");
        $getVision->execute();
        $vision = $getVision->fetchAll();
	 ?>

   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12" style='color:#fff;min-height:50pc;background:linear-gradient(rgb(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://images.pexels.com/photos/908602/pexels-photo-908602.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");background-position: center;background-repeat: no-repeat;background-size: cover;'>
         <br><br><br><br><br><br>
         <h1 class="text-center mt-3">History</h1>
         <br><br><br>
         <p class="text-center mt-3">
           <?php echo base64_decode($history[0]['description'])?>
         </p>
       </div>
     </div>
     <div class="row">
       <div class="col-lg-12" style='color:#fff;min-height:50pc;background:linear-gradient(rgb(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://sa1s3optim.patientpop.com/assets/production/practices/1a1b5cec0dbf9085272a5dd635b8b00a9b5783be/images/1893381.jpg");background-position: center;background-repeat: no-repeat;background-size: cover;'>
         <br><br><br><br><br><br>
         <h1 class="text-center mt-3">Mission</h1>
         <br><br><br>
         <p class="text-center mt-3">
           <?php echo base64_decode($mission[0]['description'])?>
         </p>
       </div>
     </div>

     <div class="row">
       <div class="col-lg-12" style='color:#fff;min-height:50pc;background:linear-gradient(rgb(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://images.pexels.com/photos/52527/dentist-pain-borowac-cure-52527.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");background-position: center;background-repeat: no-repeat;background-size: cover;'>
         <br><br><br><br><br><br>
         <h1 class="text-center mt-3">Vision</h1>
         <br><br><br>
         <p class="text-center mt-3">
           <?php echo base64_decode($vision[0]['description'])?>
         </p>
       </div>
     </div>
   </div>
  <script src='./admin/js/swiper.js'></script>
  <script src='./admin/js/home.js'></script>
  <script src="https://kit.fontawesome.com/0c5646b481.js" crossorigin="anonymous"></script>
  <script src="./js/nav.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>


</body>

</html>
