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
  <!-- <header> -->
  <!-- </header> -->
  <?php
  include "./component/navigation.php";
  ?>
  <div class="row">
    <div  class="col-lg-12 " style="padding:0;margin:0;">
      <div class="swiper-container">

        <div class="swiper-scrollbar"></div>
        <div class="swiper-wrapper">
          <?php
          require_once "./config/control.php";

          $getBanners = $connect->prepare("SELECT * from media WHERE page=:page AND component=:component");
          $getBanners->execute(['component' => 'BANNER', 'page' => 'HOME']);
          $banners = $getBanners->fetchAll();

          foreach ($banners as $banner) {

            $img = './images/'.$banner['image'];


            ?>
            <div class="swiper-slide"><img class="img img-fluid" src="<?php echo $img; ?>"></div>

            <?php
          }
          ?>
        </div>

      </div>
    </div>
  </div>
  <div></div>
  <br><br><br>
  <div class="container-fluid">
    <div class="row">
      <?php

      $getCategories = $connect->prepare("SELECT * from service");
      $getCategories->execute();
      $categories = $getCategories->fetchAll();

      foreach ($categories as $category) {
        $categoryId = $category['serviceId'];
        // $photo = $category['photo'];
        $description = $category['description'];
        // $name = $category['name'];

        ?>

        <div class="col-lg-4">
          <div class="card" style="height:400px;">
            <img class="card-img-top" src="https://images.app.goo.gl/B22BUm6hRyGnjVgh7" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><?php echo $description; ?></p>
            </div>
          </div>
        </div>
        <?php
      }
      ?>

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
