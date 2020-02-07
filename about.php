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
   <br>
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
         <h1 class="text-center">History</h1>
         <p class="text-center">
           <?php echo base64_decode($history[0]['description'])?>
         </p>
       </div>
     </div>
     <br>
     <div class="row">
       <div class="col-lg-12">
         <h1 class="text-center">Mission</h1>
         <p class="text-center">
           <?php echo base64_decode($mission[0]['description'])?>
         </p>
       </div>
     </div>
     <br>
     <div class="row">
       <div class="col-lg-12">
         <h1 class="text-center">Vision</h1>
         <p class="text-center">
           <?php echo base64_decode($vision[0]['description'])?>
         </p>
       </div>
     </div>
   </div>
  <br><br><br><br><br><br>
  <script src='./admin/js/swiper.js'></script>
  <script src='./admin/js/home.js'></script>
  <script src="https://kit.fontawesome.com/0c5646b481.js" crossorigin="anonymous"></script>
  <script src="./js/nav.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>


</body>

</html>
