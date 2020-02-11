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

  <div class="container-fluid mt-0">

    <div  class="row mt-4 gallery-container">
       <?php
              require_once "./config/control.php";

              $getBanners = $connect->prepare("SELECT * from media WHERE page=:page AND component=:component");
              $getBanners->execute(['component' => 'IMAGE', 'page' => 'GALLERY']);
              $banners = $getBanners->fetchAll();

              foreach ($banners as $banner) {

                  $img = './images/'.$banner['image'];


              ?>
                  <div class="col-lg-3" style="padding:0;margin:0;min-height:30px;object-fit:contain;"><img height="100%" class="img img-fluid thumbnail" src="<?php echo $img; ?>"></div>

        <?php
        }
        ?>
    </div>

  </div>
  <br>
  <script src='./admin/js/swiper.js'></script>
  <script src='./admin/js/home.js'></script>
  <script src="https://kit.fontawesome.com/0c5646b481.js" crossorigin="anonymous"></script>
  <script src="./js/nav.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>


</body>

</html>
