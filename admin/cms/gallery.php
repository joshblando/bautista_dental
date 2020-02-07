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
        <form class="dropzone needsclick" id="demo-upload" action="../ajax/gallery.php">
          <div class="dz-message needsclick">
            Drop files here or click to upload.
          </div>
        </form>
      </div>
    <!-- </section> -->
  </div>
  <div class="container-fluid">
    
    <div  class="row mt-4 gallery-container">
       <?php
              require_once "../../config/control.php";

              $getBanners = $connect->prepare("SELECT * from media WHERE page=:page AND component=:component");
              $getBanners->execute(['component' => 'IMAGE', 'page' => 'GALLERY']);
              $banners = $getBanners->fetchAll();

              foreach ($banners as $banner) {
                 
                  $img = '../../images/'.$banner['image'];
                

              ?>
                  <div class="col-lg-3" style="padding:0;margin:0;min-height:30px;object-fit:contain;"><img height="100%" class="img img-fluid thumbnail" src="<?php echo $img; ?>"></div>
                  
        <?php
        }
        ?>
    </div>

  </div>
</div>

<!-- <script src="../js/dropzone-amd-module.min.js"></script> -->
<script src="../js/dropzone.js"></script>
<script src='../js/swiper.js'></script>
<script src='../js/gallery.js'></script>



<?php
  include './footer.php';
?>   
        