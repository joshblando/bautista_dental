<?php
  include './nav.php';
?>
<link rel="stylesheet" type="text/css" href="../style/dropzone.css">
<link rel="stylesheet" type="text/css" href="../style/swiper.css">
<link rel="stylesheet" type="text/css" href="../style/home.css">

<div class="row">
  <div class="col-lg-12">
    <!-- <section> -->
       <div id="dropzone">
        <form class="dropzone needsclick" id="demo-upload" action="../ajax/file-upload.php">
          <div class="dz-message needsclick">
            Drop files here or click to upload.
          </div>
        </form>
      </div>
    <!-- </section> -->
  </div>
  <br><br>
    <div class="container" width="100%">
      <div  class="col-lg-12">
        <div class="swiper-container">

          <div class="swiper-scrollbar"></div>
          <div class="swiper-wrapper">
            <?php
            require_once "../../config/control.php";

            $getBanners = $connect->prepare("SELECT * from media WHERE page=:page AND component=:component");
            $getBanners->execute(['component' => 'BANNER', 'page' => 'HOME']);
            $banners = $getBanners->fetchAll();

            foreach ($banners as $banner) {

              $img = '../../images/'.$banner['image'];


              ?>
              <div class="swiper-slide"><img class="img img-fluid" src="<?php echo $img; ?>"></div>

              <?php
            }
            ?>
          </div>

        </div>
      </div>
    </div>
</div>

<!-- <script src="../js/dropzone-amd-module.min.js"></script> -->
<script src="../js/dropzone.js"></script>
<script src='../js/swiper.js'></script>
<script src='../js/home.js'></script>



<?php
  include './footer.php';
?>
